<?php

session_start();

$nameErr = $emailErr = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
  	$username = "";
    $nameErr = "Name is required";
    $error = true;
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$username)) {
      $nameErr = "Only letters and white space allowed";
      $error = true;
  }
 }

if (empty($_POST["email"])) {
	$email = "";
    $emailErr = "Email is required";
    $error = true;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $error = true;
    }
  }
 
$_SESSION['wrongusername'] = $username;
$_SESSION['wrongemail'] = $email;


}

echo $nameErr . "<br>" . $emailErr;
if (!$error) {
	include('connect.php');

	$queryadd = "INSERT INTO `emaillist` (`userID`, `username`, `email`) VALUES (NULL, '$username', '$email');";



	$updatedb = mysqli_query($con,$queryadd);

	mysqli_close($con);

	if ($updatedb) {
		echo "<br/>you added Username: " . $username . " and the Email: " . $email . " to the database";

	$_SESSION['wrongusername'] = "";
	$_SESSION['wrongemail'] = "";

	} else {
		echo "info not added";
	}


}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>


<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<a href="../index.php" class="btn btn-success">Go Back to Add/Remove</a>
</html>