
<!DOCTYPE html>
<html>
<body>

  <form action="form.php" method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>

    <!-- Stretch challenge #1 -->
    <?php 
      $major = array("cs" => "Computer Science", "wdd" => "Web Design and Development", "cit" => "Computer Information Technology", "ce" => "Computer Engineering");

    foreach($major as $x => $x_value) {
      echo '<input type="radio" name="major" value="' . $x . '"> ' . $x_value . '<br/>';
      }
    ?>

    <!-- <input type="radio" name="major" value="Computer Science">Computer Science <br>
    <input type="radio" name="major" value="Web Design and Development">Web Design and Development<br>
    <input type="radio" name="major" value="Computer Information Technology">Computer Information Technology<br>
    <input type="radio" name="major" value="Computer Engineering">Computer Engineering<br> -->

    Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>

    <input type="checkbox" name="continents[]" value="na">North America<br>
    <input type="checkbox" name="continents[]" value="sa">South America<br>
    <input type="checkbox" name="continents[]" value="eu">Europe<br>
    <input type="checkbox" name="continents[]" value="as">Asia<br>
    <input type="checkbox" name="continents[]" value="au">Australia<br>
    <input type="checkbox" name="continents[]" value="af">Africa<br>
    <input type="checkbox" name="continents[]" value="an">Antarctica<br>

    <input type="submit">
  </form>

</body>
</html>
