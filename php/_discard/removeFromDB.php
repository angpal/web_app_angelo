<?php

$email = $_POST['email'];



include('connect.php');



$querydelete = "DELETE FROM `emaillist` WHERE `email` = '$email'";

$updatedb = mysqli_query($con,$querydelete);

mysqli_close($con);

if ($updatedb) {
	header('location:viewmailinglist.php');
} else {
	echo "info not added";
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

<a href="../index.php" class="btn btn-warning">Go Back to Add/Remove</a>
</html>