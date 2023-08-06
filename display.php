<?php

    /**
     * display.php
     *
     * Display the Day One counted words as a word cloud
     *
     * @author     Neil Thompson <neil@spokenlikeageek.com>
     * @copyright  2023 Neil Thompson
     * @license    https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License v3.0
     * @link       https://github.com/williamsdb/dayone-wordcloud
     * @see        https://www.spokenlikeageek.com/2023/08/06/creating-a-word-cloud-from-your-day-one-entries/ Blog post
     * @see        https://github.com/timdream/wordcloud2.js Word cloud JS code
     */

    $input = fopen('words_count_out.txt', "r") or die("Unable to open file!");
    $wordCloudData = [];
    $i=0;
    while(!feof($input)) {
        $ln = fgets($input);
        if (!empty($ln) && $i<50){
            $ret = explode(",",$ln);
            if ($ret[0] > 1000){
                $size = (int)$ret[0]/100;
            }elseif ($ret[0] > 100){
                $size = (int)$ret[0]/10;
            }else{
                $size = (int)$ret[0]/1;
            }
            $wordCloudData[] = ['word' => trim($ret[1], "\n"), 'freq' => $size];    
        }
        $i++;
    }
    fclose($input);
    // Convert the data to a JSON string
    $wordCloudJson = json_encode($wordCloudData);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Day One Wordcloud</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wordcloud2.js/1.0.0/wordcloud2.min.js"></script>
</head>
<body>
    <!-- Display the word cloud inside a div -->
    <canvas id="wordcloud" class="wordcloud" width="1200" height="600"></canvas>

    <script>
        // Get the word cloud data from PHP
        var db = <?php echo $wordCloudJson; ?>;

        list = [];
        for (var i in db) {
            list.push([db[i]["word"], db[i]["freq"]])
        }

        WordCloud(document.getElementById('wordcloud'), { 
            list: list,
            minFontSize: "20px", 
            backgroundColor: "#F0F0F0",
            gridSize: 12,
            weightFactor: 6,
            origin: [90, 0],
            shuffle: true,
            fontFamily: 'Times, serif',
            color: function (word, freq) {
              return (freq >30) ? '#f02222' : '#c09292';
            },
            rotateRatio: 0.5,
            rotationSteps: 2
        } );

    </script>
</body>
</html>
