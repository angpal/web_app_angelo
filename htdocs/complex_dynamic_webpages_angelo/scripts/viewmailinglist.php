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
   


	<div id = "email_container">
    
		<h1> DATABASE OF EMAIL MEMBERS </h1>

	<table class="database_table">				

	<thead>
		<tr>
			<th>Username</th>
			<th>Email</th>
		</tr>
	</thead>

	<tbody>

					<?php

					session_start();

						if (!isset($_SESSION['username'])) {
							header('location:login.php');
						} else {
							
							$query = "SELECT * FROM `emaillist`";

							include('connect.php');

							$result = mysqli_query($con, $query);

							// Associative array
							
							while ($row=mysqli_fetch_assoc($result)) {

								echo "<tr> <td>" . $row['username'] . "</td>";
								echo "<td>" . $row['email'] ."</td> </tr>";
							}
						}

					?>

	</tbody>
	</table>

				<h2>Delete User from Database</h2>
				<form action="removeFromDB.php" method="POST">

					<div class="del_title">Email</div>
				  		<input type="text" name="email" class="del_title_input" placeholder="Enter the email of the user to be deleted">
					</input><br><br>

					<input type="submit" name="delete" value="Delete" class="btn_admin_del"></input>

				</form>	


				<h2>To Leave This Secure Page</h2>	

				<a href="../pages/contact.php" class="btn_admin_BTAR">Back To Add/Remove</a>
                <a href="logout.php" class="btn_admin_logout" style="float: right">Log Out</a>
-
<!--
			</div>
		</div>
        -->
        
        
	</div>

</body>
</html>