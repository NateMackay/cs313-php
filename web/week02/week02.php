
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nate Mackay's homepage</title>
    <link rel="stylesheet" type="text/css" href="week02.css">
  </head>

<body>
    <header>
      <?php
        echo "<h1>Nate Mackay</h1>";
      ?>
    </header>

  <h3>Homepage</h3>
  <p>About me: I am a student at Brigham Young University - Idaho. My major is Software Engineering.</p>
  <a href="../index.php">Here is a list of my assignments for CS 313</a>
  <div id="assignments">
    <div id="interests"><h6>Below are some of my interests:</h6>
  
      <a href="https://www.churchofjesuschrist.org/?lang=eng" title ="The Church of Jesus Christ of Latter-Day Saints" target="_blank"><img src="https://www.churchofjesuschrist.org/bc/content/ldsorg/home-strata-live/2019/944-CFM-lesson-9-23-lvl1_1-1103410-jesus-speaking-crowd.jpg"></a>

      <a href="https://www.rmhc.org" title="Ronald McDonald House Charities" target="_blank"><img src="https://www.rmhc.org/rmhc_global_logo_white-box.jpg?v=3" alt="Ronald McDonald House Charities"></a>

      <a href="https://www.byui.edu" title="Brigham Young University - Idaho" target="_blank"><img src="http://www.byui.edu/images/Branding/Logos/BYU-Idaho.png" alt="Brigham Young University - Idaho"></a>

      <a href="https://ohiostatebuckeyes.com/sports/m-footbl/" title="Ohio State football" target="_blank"><img src="http://www.izzness.com/postpic/2014/02/ohio-state-block-o-template_479407.png" alt="Ohio State football"></a>
   
    </div>
  </div>

  <footer>
    <?php
      date_default_timezone_set("America/Denver");
      echo "Today is " . date("l") . ". ";
      echo "The date is " . date("m-d-Y") . ". ";
      echo "The time is " . date("h:i:sa") . ". ";
    ?>
  </footer>
  
</body>
</html>
