<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <title>Signup Page</title>
</head>
<body onload="document.getElementById('username').focus();">
  <nav>
    <ul class="navigation">
      <li class="active"><a href="signIn.php">Sign in page</a></li>
    </ul>
  </nav>
  ​
  <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSubmit']))
    {
      $pwd1 = $_POST['pwd1'];
      $pwd2 = $_POST['pwd2'];
      $validPassword = true;

      //check if passwords match, stretch 1
      if ($pwd1 != $pwd2) 
      { 
        $passError = "Your passwords do not match";
        $star = "*";
        $validPassword = false;
      }

      //check for at least 7 characters, stretch 2
      if (!preg_match("/\w{7,}/",$pwd1)) 
      {
        $passError = "Your password needs 7 characters";
        $validPassword = false;
      }

      //check for at least one number
      if (!preg_match("/[0-9]+/",$pwd1)) 
      {
        $passError = "Your password needs one number";
        $validPassword = false;
      }

      if ($validPassword)
      {

        try
        {

          $passwordHash = password_hash($_POST["pwd1"], PASSWORD_DEFAULT);

          //connecting to database
          $dbUrl = getenv('DATABASE_URL');
          $dbOpts = parse_url($dbUrl);
          $dbHost = $dbOpts["host"];
          $dbPort = $dbOpts["port"];
          $dbUser = $dbOpts["user"];
          $dbPassword = $dbOpts["pass"];
          $dbName = ltrim($dbOpts["path"],'/');

          $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          //inserting new user into database
          $query = "INSERT INTO users (username, userpassword) VALUES (:name, :hashpassword)";
          $stmt = $db->prepare($query);
          $stmt->bindValue(':name', $_POST["username"], PDO::PARAM_STR);
          $stmt->bindValue(':hashpassword', $passwordHash, PDO::PARAM_STR);
          $stmt->execute();

          header("Location: https://morning-bastion-33855.herokuapp.com/week7team/signIn.php");
          die();
        }//end try
        catch (PDOException $ex)
        {
          echo 'Error!: ' . $ex->getMessage();
          die();
        }
        catch (Exception $ex)
        {
          echo 'Error!: ' . $ex->getMessage();
          die();
        }
      }// end if ($validPassword)
    }//end if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSubmit']))
    // else
    // {
  ?>

  <div>
    <form action="" method="post">
      Please enter your username:<input type="text" name="username" id="username"><br><br>
      password (7 letters and a number):<input type="password" id ="pwd1" name="pwd1"><span id="error" style="color:red;"><?php echo $star; ?></span><br><br>
      password:<input type="password"  id="pwd2" name="pwd2" onchange="checkPassword()"><span id="error2" style="color:red;"><?php echo $star; ?></span><br><br>
      <input type="submit" value="addUser" name="btnSubmit"  ><span style="color:red;"><?php echo $passError; ?></span><br>
      
    </form>
  </div>

<script>

function checkPassword() {
	var item1 = document.getElementById("pwd1").value;
	var item2 = document.getElementById("pwd2").value;
	var isSame = true;
	var numCount = 0;
	var charCount = 0;

	if (item1.length != item2.length && item1.length < 7) {
		isSame = false;
	}

	for (var i = 0; i < item1.length; i++) {
		if (item1.charAt(i) != item2.charAt(i)) {
			isSame = false;
		}

		if (isNaN(item1.charAt(i))) { 
			charCount++; 
		} else { 
			numCount++; 
		}
	}

	if (!isSame) {
		document.getElementById('error').innerHTML = "*Passwords not identical.<br/>";
	}	
	else {
		document.getElementById('error').innerHTML = "";
	}

	if (numCount == 0 || item1.length < 7) {
		document.getElementById('error2').innerHTML = "*Password needs to be at least 7 characters long and contain a number.<br/>";
	}
	else {
		document.getElementById('error2').innerHTML = "";
	}

}
</script>
    
	</body>
</html>