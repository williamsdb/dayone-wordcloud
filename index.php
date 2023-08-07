<?php

    /**
     * index.php
     *
     * Build the output files from a Day One database ready for displaying in a word cloud
     *
     * @author     Neil Thompson <neil@spokenlikeageek.com>
     * @copyright  2023 Neil Thompson
     * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GNU General Public License v3.0
     * @link       https://github.com/williamsdb/dayone-wordcloud
     * @see        https://www.spokenlikeageek.com/2023/08/09/creating-a-word-cloud-from-your-day-one-entries/ Blog post
     */

    // place a **copy** of your Day One file in the same place as this file
    $db = new SQLite3('./DayOne.sqlite');

    // remove the old output files
    unlink('words.txt');
    unlink('words_count.txt');
    unlink('words_count_out.txt');

    // build an array of stop words to removex
    $stopWords = array('\'s', 'a', 'all', 'also', 'an', 'but', 'by', 'the', 'in', 'on', 'is', 'and', 'to', 'he', 'she', 'they', 
        'my', 'as', 'we', 'of', 'I', 'at', 'had', 'us', 'it', 'so', 'or', 'was', 'that', 'for', 'with', 'up', 'out', 'have', 'went', 
        'be', 'which', 'this', 'back', 'where', 'get', 'me', 'do', 'when', 'got', 'go', 'off', 'then', 'were', 'our', 'not', 'did');
    $pattern = '/\b(?:' . implode('|', $stopWords) . ')\b/i';

    echo 'Retrieving entries from DayOne db'.PHP_EOL;

    $res = $db->query("SELECT Z_PK, lower(ZMARKDOWNTEXT) AS 'ZMARKDOWNTEXT' FROM ZENTRY");
    while ($row = $res->fetchArray()) {
        if (!empty($row['ZMARKDOWNTEXT'])) {
            $return = preg_replace('/!\[\]\(dayone-moment:\/\/[^\)]+\)/', '', $row['ZMARKDOWNTEXT']);
            $return = preg_replace('/[^\p{L}\p{N}\s]/u', '', $return);
            $return = preg_replace($pattern, '', $return);
        }

        $arr = explode(' ', $return);
        $i = 0;
        while($i<count($arr)){
            if (!empty($arr[$i])) file_put_contents('words.txt', $arr[$i].PHP_EOL, FILE_APPEND);
            $i++;
        }

    }

    echo 'Finsihed processing entries, starting sort'.PHP_EOL;
    // sort into alphabetic order
    exec('sort -o words.txt words.txt');
    // for windows the following should work
    //exec('sort words.txt /o words.txt');

    echo 'Finsihed sort, starting count'.PHP_EOL;
    // do a word count and output
    $input = fopen('words.txt', "r") or die("Unable to open file!");
    $str = '';
    $i=0;
    while(!feof($input)) {
        $ln = fgets($input);
        if (empty($ln) || strlen($ln)==1){
            $str = '';
            $i=0;
        }elseif ($ln==$str){
            $i++;
        }else{
            if ($i > 1) file_put_contents('words_count.txt', $i.','.$str, FILE_APPEND);
            $str = $ln;
            $i=1;
        }
    }
    fclose($input);

    echo 'Finsihed count, starting sort'.PHP_EOL;
    // sort into alphabetic order
    exec("sort -t',' -k1 -n -r -o words_count_out.txt words_count.txt");
    // for windows the following should work
    //exec('sort /r words_count.txt /o words_count_out.txt');

    // remember to change the location in the exec statement! 
    echo 'Opening display page'.PHP_EOL;
    exec('open "http://dayone.local:8888/display.php"');
    // for windows the following should work
    //exec('explorer "http://dayone.local:8888/display.php"');

    echo 'Done'.PHP_EOL;

?>