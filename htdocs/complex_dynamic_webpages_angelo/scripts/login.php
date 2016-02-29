<?php

$message = "<p></p>";

$username = $password = $aa = $access = $req_access = "";
if ($_POST) {
	
$aa = $_POST["password"];
$req_password = "admin";
//echo $req_password . $password;
$username = test_input($_POST['username']);
$password = md5($_POST['password']);

include('connect.php');

$query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password';";

$result = mysqli_query($con, $query);

//Below 1st line: confirm if username and password exist, go to next line
//Below 2nd line: confirm if entered password is the same as 
//                the required password to access page
	
if (mysqli_num_rows($result)==1) {
	
	if ($aa == $req_password) {
		session_start();
		echo $req_password . $password . $aa ;
		$_SESSION['username']='true';
		header('location:viewmailinglist.php');
	}
} else {
	$message = "<p>Incorrect Username or Password</p>";
}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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

<body>


   
   <header id="my_head">
	  
		<div class="login_header">
			<img src="../images/logo/logo_mobile.png" alt="Company logo with address"  class="login_logo"/>
		</div>
 	 
<!-- ================================================= -->
   


    
	<div id = "login_container">
    
    
    <h1>Administrator Login <small> Enter your login details</small></h1>
	<br>
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

					<div class="login_title">Username</div>
				  		<input type="text" name="username" class="login_title_input" placeholder="Please Enter Your Username"></input>
                        
					<br><br><br>

					<div class="login_title">Password</div>
				  		<input type="password" name="password" class="login_title_input" placeholder="Please Enter Your Password"></input>
					
                	<br><br><br>

					<input type="submit" name="submit" value="Submit" class="btn_submit"></input>
				</form>	

					<?php
					echo $message
					?>
				


	</div>

</body>
</html>