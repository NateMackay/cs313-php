<?php 
  $name = htmlspecialchars($_POST['meal_name']);
  $prep = htmlspecialchars($_POST['prep']);
  $cook = htmlspecialchars($_POST['cook']);

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

  $typeIds = $_POST['type'];
  
  $statement = $db->prepare('INSERT INTO Meal (name, prep, cook) VALUES (:name ,:prep, :cook)');
  $statement->bindValue(':name', $name, PDO::PARAM_STR);
  $statement->bindValue(':prep', $prep, PDO::PARAM_INT);
  $statement->bindValue(':cook', $cook, PDO::PARAM_INT);
  $statement->execute();

  $id = $db->lastInsertId("meal_id_seq");

  foreach ($typeIds as $typeId) {
    $statement = $db->prepare('INSERT INTO MenuItem (meal_type, meal_id) VALUES (:mealtype, :id)');
    $statement->bindValue(':mealtype', $typeId, PDO::PARAM_INT);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
  }

?>

<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <script src="calendar.js"></script>
    <link rel="stylesheet" type="text/css" href="calendar.css">   
  </head>

<body>

<form action="search.php" method="post">
  <h1>Your meal has been added to the database. </h1>

  <input type="submit" value="Return">

</form>

</body>
</html>