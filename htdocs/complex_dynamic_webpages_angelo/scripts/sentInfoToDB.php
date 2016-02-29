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




?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AllStyles Homes - Contact Us</title>

  <!-- Latest compiled and minified CSS 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="../css/style.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <!-- The following, links to JS, to enable the functionality
    <script src="../js/ddmenu.js"></script> -->



	<link href="../css/allstylehomes.css" rel="stylesheet" type="text/css">
    <link href="../css/media_queries.css" rel="stylesheet" type="text/css">
    
    
    
</head>

<body class="body_DB">


   
   <header id="my_head">
	  
		<div class="login_header">
			<img src="../images/logo/logo_mobile.png" alt="Company logo with address"  class="login_logo"/>
		</div>
 	 
     </header>
     
<!-- ================================================= -->
   


	<div id = "sent_container">
    
		<h1> This Screen Indicated if "Submit" Was Successful </h1>
        
        <?php
		
		echo $nameErr . "<br>" . $emailErr;
if (!$error) {
	include('connect.php');

	$queryadd = "INSERT INTO `emaillist` (`userID`, `username`, `email`) VALUES (NULL, '$username', '$email');";



	$updatedb = mysqli_query($con,$queryadd);

	mysqli_close($con);

	if ($updatedb) {
		echo "<br><br>You successfully added Username: " . $username . " with the Email: " . $email . " to the database.";
		
		echo "<br><br>Welcome to AllStyle Homes!<br><br>";

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
        
<br><br>

<a href="../pages/contact.php" class="btn_admin_BTAR">Go Back to Add/Remove</a>
</html>

</div>