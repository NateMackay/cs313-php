<?php 
  $continents = $_POST["continents"];
?>

<html>
<body>

  Welcome <?php echo $_POST["name"]; ?><br>
  Your email address is: <?php echo $_POST["email"]; ?><br>
  Your major is: <?php echo $_POST["major"]; ?><br>
  Your comments: <?php echo $_POST["comment"]; ?> <br>
  Your continents are:


  <?php
    foreach ($continents as $value => $value_value) { 
      echo "$value <br>";
    }
  ?>

<?php 
    if (isset($_POST["continents"])) { 
      echo $_POST["continents";]
    }
  ?>
  
</body>
</html>
