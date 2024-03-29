<?php

?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Search options</title>
    <link rel="stylesheet" type="text/css" href="calendar.css">   
  </head>

<body>

  <h1>Menu database search options:</h1>

  <div id="options">
    <h3>Please choose how you would like to view your meals</h3>
    <!--drop down menu -->
    <form action="chefs.php" method="post">
      <button value="week" name="options"  type="button" onclick="show('week')">View the whole week</button><br>
      <button value="day" name="options" type="button" onclick="show('day')">View one day this week</button><br>
      <button value="meals" name="options" type="button" onclick="show('meals')">View one meal for this week</button><br>
      <button type="submit" value="chef" name="options" onclick="chef.php">List of Chefs</button>
    </form>

    <!--view the entire week options-->
    <form class="hidden" id="week" method="get" action="week.php">
      <h4>Select a week</h4>
      <input type="text" placeholder="1-52" name="week"><br>
      <input type="submit" class="submit">
    </form>

    <!--by day options-->
    <form class="hidden" id="day" method="get" action="day.php">
      <h4>Select a day</h4>
      <input type="radio" name="day" value="monday">Monday<br>
      <input type="radio" name="day" value="tuesday">Tuesday<br>
      <input type="radio" name="day" value="wednesday">Wednesday<br>
      <input type="radio" name="day" value="thursday">Thursday<br>
      <input type="radio" name="day" value="friday">Friday<br>
      <input type="submit" class="submit">
    </form>

    <!--view by meal-->
    <form class="hidden" id="meals" method="get" action="meal.php">
      <h4>Select a meal</h4>
      <input type="radio" name="meal" value="1">breakfast<br>
      <input type="radio" name="meal" value="2">lunch<br>
      <input type="radio" name="meal" value="4">dinner<br>
      <input type="submit" class="submit">
    </form>

  </div>

  <div id="manipulate">
    <h3>Manipulating the list of meals:</h3>
    <!--3 buttons to choose from-->
    <button type="button" id="add" value="Add a meal" onclick="show('form2')">Add a meal</button><br>
    <form method="post" action="add.php" class="hidden" id="form2">
      <table id="add">
        <tr><th colspan="2"><h3>Adding a meal</h3></th></tr>
        <tr><td>Meal name</td> 
          <td><input type="text" name="meal_name"></td></tr>
        <tr><td>What is the cook time?</td>
          <td><input type="text" name="cook" placeholder="in minutes"></td></tr>
        <tr><td>How long does it take to prepare?</td>
          <td><input type="text" name="prep" placeholder="in minutes"></td></tr>
        <tr><td colspan="2">
          <?php 

          ?>
          <input type="checkbox" name="type[]" id="breakfast" value="1"><label for='breakfast'>Breakfast</label>
          <input type="checkbox" name="type[]" id="lunch" value="2">Lunch
          <input type="checkbox" name="type[]" id="dinner" value="4">Dinner</td></tr>
        <tr><td></td><td><input type="submit" value="Add to database"></td></tr>
      </table>
    </form>
    
    <form action="edit.php" method="post">
      <button type="submit" id="edit" value="Edit a meal">Edit a meal</button><br>
    <?php
    
    ?>
    </form>

    <form action="delete.php" method="post">
      <button type="submit" id="delete" value="Delete a meal">Delete a meal</button><br>
    <?php

    ?>
    </form>

    </div>
    
  <script src="calendar.js"></script>
</body>
</html>