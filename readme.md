<a name="readme-top"></a>


<!-- PROJECT LOGO -->
<br />
<div align="center">

<h3 align="center">Day One Word Cloud</h3>

  <p align="center">
    This script takes your Day One entries and turns them into a formatted word cloud.
    <br />
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[Day One](https://dayoneapp.com/) is a popular journaling app for Mac and iOS, now owned by WordPress owner Automattic.

I have 14 years worth of entries in my Day One app and I want to know what words I used most frequently so I decided to [crack open the database](https://www.spokenlikeageek.com/2023/06/14/querying-the-day-one-database/) and see if I could find this information.

Once I had the data I wanted a nice way to display it and I decided a word cloud would be ideal.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

* [PHP](https://php.net)
* [Wordcloud2.js] (https://github.com/timdream/wordcloud2.js)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

Running the script is very straight forward:

1. download the code
2. copy your Day One SQLite file to the same folder as the code
3. run php index.php

You can read more about how this all works in [this blog post](https://www.spokenlikeageek.com/2023/08/06/creating-a-word-cloud-from-your-day-one-entries/).

### Prerequisites

Requirements are very simple - just requires PHP and I tested on v7.4.33.

### Installation

1. Clone the repo:
   ```sh
   git clone https://github.com/williamsdb/dayone-wordcloud.git
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

1. make a copy of your Day One database (DayOne.sqlite) and place it in the same folder as the code. Read about [how to find your database in this article](https://dayoneapp.com/guides/day-one-sync/where-is-my-data-stored/).
2. Run the code:
```php index.php``` 

You will see output similar to the following:

![](https://www.spokenlikeageek.com/wp-content/uploads/2023/08/cli-%E2%80%94-zsh-%E2%80%94-127%C3%9729-2023-08-06-11-40-27.png)

When the process of extracting the word counts completes a web page will open showing your word cloud.

_For more information, please refer to the [this blog post](https://www.spokenlikeageek.com/2023/08/06/creating-a-word-cloud-from-your-day-one-entries/)_

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- ROADMAP -->
## Known Issues

- currently the conversion from frequencies to font sizes only works for < 10,000 max frequency
- the word with the largest frequest is shown in red but this frequency is currently hard-coded.

See the [open issues](https://github.com/github_username/dayone-wordcloud/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the GNU General Public License v3.0. See `LICENSE` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Your Name - [@spokenlikeageek](https://twitter.com/spokenlikeageek) - [Contact](https://www.spokenlikeageek.com/contact/)

Project Link: [https://github.com/williamsdb/dayone-wordcloud](https://github.com/williamsdb/dayone-wordcloud)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

* [Timothy Guan-tin Chien ](https://github.com/timdream) for Wordcloud2.js
* [Day One](https://dayoneapp.com/) for the excellent app

<p align="right">(<a href="#readme-top">back to top</a>)</p>


