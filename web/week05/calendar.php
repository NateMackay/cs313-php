<?php  
  session_start();

  try
  {
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
?>

<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <link rel="stylesheet" type="text/css" href=".css">   
  </head>

<body>

<h1>Dinner menu</h1> 

<input type="button" value="Populate calendar" onclick="">


<table>
  <tr>
    <th></th>
    <th>Monday</th>
    <th>Tuesday</th>
    <th>Wednesday</th>
    <th>Thursday</th>
    <th>Friday</th>
  </tr>
  <tr>
    <td>Breakfast</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>chef</td>
    <td>Ava</td>
    <td>Natalie</td>
    <td>Jen</td>
    <td>Ava</td>
    <td>Jen</td>
  </tr>
  <tr>
    <td>Lunch</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Dinner</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>chef</td>
    <td>Janice</td>
    <td>Jen</td>
    <td>Janice</td>
    <td>Jen</td>
    <td>Nate</td>
  </tr>


</table>




<h6>Search for a meal</h6>
<form method="post" action=''>
	<span>Search:</span><input type="text" name="search">
  <input type="submit" value="Search">
</form>

<?php
    $mealName = filter_var($_POST["search"], FILTER_SANITIZE_STRING);
    foreach ($db->query("SELECT * FROM Meal WHERE name='$mealName' ") as $row) {
      $id = $row['id'];
      echo "<a href='detail.php?id=$id'>";      
      echo $row['name'];
      echo '</a>';
      echo ' is a good meal.';
      echo '<br>';
    }
?>

  <script src=".js"></script>

</body> 
</html>