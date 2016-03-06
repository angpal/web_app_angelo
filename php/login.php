
<?php
session_start();
$message = "<p></p>";

$username = $password = $security_lev = $aa = $access = $req_access = "";
if ($_POST) {
  
//$aa = $_POST["password"];
//$req_password = "admin";

//$aa = $_POST["security_lev"];
  
//echo $req_password . $password;
$username = test_input($_POST['username']);
$password = md5($_POST['password']);

include('connect.php');

$query = "SELECT * FROM `staff` WHERE `username` = '$username' AND `password` = 
'$password' AND (`security_lev` = 'admin' OR `security_lev` = 'sales')";

$result = mysqli_query($con, $query);

//Below 1st line: confirm if username and password exist, go to next line
//Below 2nd line: confirm if entered password is the same as 
//                the required password to access page
  
    if (mysqli_num_rows($result)==1) {
    
        while ($row = mysqli_fetch_assoc($result)) {

        $_SESSION['security_lev'] = $row['security_lev'];

        }
    } else {
      $message = "<p> You have entered an incorrect Username or Password. Please try again.</p>";
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>West Coast Auto</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="../css/custom.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>


     <?php  
          if (!isset($_SESSION['security_lev'])){
              echo " <a href='php/login.php' class='btn btn-default login-btn hidden-xs' >Employee Login</a>";
          }
    ?>


    <header>
    <div class="row">
      <div class="col-md-4">
          <img src="../images/west_coast_auto_logo.png" alt="logo" class="logo img-responsive">
      </div>  

      <div class="col-md-4 hidden-sm hidden-xs">

      </div>
      <div class="col-md-4 hidden-sm hidden-xs">
          <div class="contact-info">
            <p><span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;&nbsp;Phone: &nbsp;&nbsp;&nbsp;&nbsp;08 9415 1234 </p> 

            <p><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;&nbsp;Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;denisc@bigpond.com</p> 

            <p><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;&nbsp;Address: &nbsp;375 Albany Hwy,<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Victoria Park, Perth WA 6100</p> 
          </div>
      </div>
    </div>
    </header>

      <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse nav_font" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="../index.html">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="../pages/about.html">About</a></li>
        <li><a href="specials.php">Specials</a></li>
        <li><a href="used_vehicles.php">Used Vehicles</a></li>
        <li><a href="../pages/finance.html">Finance</a></li>
        <li><a href="../pages/testimonials.html">Testimonials</a></li>
        <li><a href="../pages/contact.html">Contact</a></li>
        <?php  
          if (!isset($_SESSION['security_lev'])){
              echo "<li><a href='#' class='btn hidden-sm hidden-md hidden-lg'>Employee Login</a></li>";
          }
        ?>
      </ul>
      

    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>






  <div class = "container opt_container" >
    <div class="row">
      <div class= "col-md-offset-1 col-md-10 ">

          <?php 

              if (!isset($_SESSION['security_lev'])){

                  echo "<h1>Universal Staff Login: <small>Enter your login details</small></h1>
                  <form method='POST' action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . ">

                          <div class='input-group input-group-lg'>
                                <span class='input-group-addon' id='sizing-addon1'>Username</span>
                                <input type='text' name='username' class='form-control' placeholder='Username' aria-describedby='sizing-addon1'>
                          </div><br>

                          <div class='input-group input-group-lg'>
                                <span class='input-group-addon' id='sizing-addon1'>Password</span>
                                <input type='password' name='password' class='form-control' placeholder='Password' aria-describedby='sizing-addon1'>
                          </div><br>

                          <input type='submit' name='submit' class='btn btn-success'></input>
                  </form> ";

              } 
                     
                      if (isset($_SESSION['security_lev'])) {

                       

                          if ($_SESSION['security_lev'] == 'Admin') {
                              echo "
                                  <div class='adm_opt'>
                                      
                                      <a class='btn btn-primary login_opt_btn' href='add_staff.php'>Add<br>Staff</a>
                                      <a class='btn btn-primary login_opt_btn' href='add_car.php'>Add<br>Vehicle</a>
                                      <a class='btn btn-primary login_opt_btn' href='add_customer.php'>Add<br>Customer</a>
                                      <a class='btn btn-success login_opt_btn' href='add_sale.php'>Make a Sale</a>
                                      <br><br>
                                      <a class='btn btn-info login_opt_btn' href='view_staff.php'>View<br>Staff</a>
                                      <a class='btn btn-info login_opt_btn' href='used_vehicles.php'>View<br>Vehicle</a>
                                      <a class='btn btn-info login_opt_btn' href='view_customers.php'>View<br>Customer</a>
                                      <br><br>
                                      
                                      <a class='btn btn-danger login_opt_btn' href='delete_staff.php'>Delete<br>Staff</a>
                                      <a class='btn btn-danger login_opt_btn' href='delete_car.php'>Delete<br>Vehicle</a>
                                      <a class='btn btn-danger login_opt_btn' href='delete_customers.php'>Delete<br>Customer</a>
                                      <a class='btn btn-warning login_pg_logout_btn' href='logout.php'>Log Out</a>
                                  </div>
                              ";
                          }
                              if ($_SESSION['security_lev'] == 'Sales') {
                                  echo "
                                    <div class='sales_opt'>
                                      <a class='btn btn-info login_opt_btn' href='view_staff.php'>View<br>Staff</a>
                                      <a class='btn btn-info login_opt_btn' href='used_vehicles.php'>View<br>Vehicle</a>
                                      <a class='btn btn-info login_opt_btn' href='view_customers.php'>View<br>Customer</a>
                                      <a class='btn btn-success login_opt_logout_btn' href='add_sale.php'>Make a Sale</a>
                                      <br><br>
                                      <a class='btn btn-primary login_opt_btn' href='add_car.php'>Add<br>Vehicle</a>
                                      <a class='btn btn-primary login_opt_btn' href='add_customer.php'>Add<br>Customer</a>
                                      <a class='btn btn-warning login_opt_logout_btn' href='logout.php'>Log Out</a>
                                      </div>
                                  ";
                              }  
                        
                      }

                          echo "<h3 style='color:red;'>" . $message . "</h3>";    

          ?>
        
      </div>
    </div>
  </div>







<footer class="navbar navbar-default ">
  <div class="col-md-6">
      <p>Copyright Info</p>
  </div> 

  <div class="col-md-6">
    <ul class="nav navbar-nav navbar-right">
      <li ><a href="../index.html">Home</a></li>
      <li><a href="privacy_policy.html">Privacy Policy</a></li>
     </ul>
  </div>
  

        
     
</footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>







<!--
<h2>Make: <small>Toyota</small>
  -->




                            