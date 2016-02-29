<?php
session_start();
$message = "<p></p>";

$username = $password = $security_lev = $aa = $access = $req_access = "";

$success = "";

if ($_POST) {

  $availability = $manufacturer_id = $category_id = $model = $year = $price = $kilometers = $colour = $registration = $vin = $cylinders = $fuel = $transmission = $specials = "";

  $availability = $_POST['availability'];
  $manufacturer_id = $_POST['manufacturer_id'];
  $category_id = $_POST['category_id'];
  $model = $_POST['model'];
  $year = $_POST['year'];
  $price = $_POST['price'];
  $kilometers = $_POST['kilometers'];
  $colour = $_POST['colour'];
  $registration = $_POST['registration'];
  $vin = $_POST['vin'];
  $cylinders = $_POST['cylinders'];
  $fuel = $_POST['fuel'];
  $transmission = $_POST['transmission'];
  $specials = $_POST['specials'];

echo $availability . " " . $manufacturer_id . " " . $category_id . " " . $model;

include('connect.php');

$query = "INSERT INTO `car` (`stock_no`, `availability`, `manufacturer_id`, `category_id`, `model`, `year`, `price`, `kilometers`, `colour`, `registration`, `vin`, `cylinders`, `fuel`, `transmission`, `specials`) 
VALUES (NULL, '$availability', '$manufacturer_id', '$category_id', '$model', '$year', '$price', '$kilometers', '$colour', '$registration', '$vin', '$cylinders', '$fuel', '$transmission', '$specials');";

$result = mysqli_query($con, $query);

  if ($result) {
    $success = "You have successfully added " . $manufacturer_id . " " . $model . " to the database!";
  }
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


    <a href="php/login.php" class="btn btn-default login-btn hidden-xs" >Employee Login</a>

    <header>
    <div class="row">
      <div class="col-md-4">
          <img src="../images/west_coast_auto_logo.png" alt="logo" class="logo img-responsive">
      </div>  

      <div class="col-md-4 hidden-sm hidden-xs">

      </div>
      <div class="col-md-4 hidden-sm hidden-xs">
          <div class="contact-info">
            <p<span class="glyphicon glyphicon-earphone"></span> Phone: &nbsp;XX-XXXX-XXXX </p> 

            <p<span class="glyphicon glyphicon-envelope"></span> Email: &nbsp;xx@xx.com</p> 

            <p<span class="glyphicon glyphicon-map-marker"></span>  Address: XXX Something St,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Somewhere WA </p> 

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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="../index.html">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="../pages/about.html">About</a></li>
        <li><a href="../pages/specials.html">Specials</a></li>
        <li><a href="../pages/used_vehicles.html">Used Vehicles</a></li>
        <li><a href="../pages/finance.html">Finance</a></li>
        <li><a href="../pages/testimonials.html">Testimonials</a></li>
        <li><a href="../pages/contact.html">Contact</a></li>
        <li class="active"><a href="#" class="hidden-sm hidden-md hidden-lg" >Employee Login</a></li>
      </ul>
      

    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




    <div class="row">
        <div class="col-xs-12">
            <div class="inner-main-content">
              
          <!--
              <div class="row employee-login">
                  <div class="col-xs-4">
                      <a href="view_customer.html" class="btn btn-success">View Customer</a>
                  </div>
                  <div class="col-xs-4">
                      <a href="add_customer.html" class="btn btn-success">Add Customer</a>
                  </div>
                  <div class="col-xs-4">
                      <a href="add_sale.html" class="btn btn-success">Make Sale</a>
                  </div>
              </div>
          -->

              <div class= "col-md-offset-3 col-md-8 ">

              <h1>Add Customer to the Database</h1>
              <br>
              <h2><?php echo $success; ?></h2>
              <br><br>

                            <?php

                              

                                if (isset($_SESSION['security_lev'])) {

                                    if ($_SESSION['security_lev'] == 'admin') {
                                echo "
                                    <div class='adm_opt'>
                                        <a class='btn btn-danger staff_btns' href='delete_customer.php'>Delete Customer</a>
                                        <a class='btn btn-danger staff_btns' href='delete_car.php'>Delete Vehicle</a>
                                        <a class='btn btn-primary staff_btns' href='#'>Add Customer</a>
                                        <a class='btn btn-primary staff_btns' href='add_car.php'>Add Vehicle</a>
                                        <br><br>
                                        <a class='btn btn-info staff_btns' href='used_vehicles.php'>View Vehicle</a>
                                        <a class='btn btn-info staff_btns' href='view_customers.php'>View Customers</a>
                                        <a class='btn btn-info staff_btns' href='view_staff.php'>View Staff</a>
                                        <a class='btn btn-success staff_btns' href='add_sale.php'>Make a Sale</a>
                                        <a class='btn btn-warning logout_btn' href='logout.php'>Log Out</a>
                                    </div>
                                ";
                            }
                                if ($_SESSION['security_lev'] == 'sales') {
                                    echo "
                                      <div class='sales_opt'>
                                        <a class='btn btn-info staff_btns' href='view_customers.php'>View Customer</a>
                                        <a class='btn btn-info staff_btns' href='used_vehicles.php'>View Vehicle</a>
                                        <a class='btn btn-info staff_btns' href='view_staff.php'>View Staff</a>
                                        <a class='btn btn-success staff_btns' href='add_sale.php'>Make a Sale</a>
                                        <br><br>
                                        <a class='btn btn-primary staff_btns' href='#'>Add Customer</a>
                                        <a class='btn btn-primary staff_btns' href='add_car.php'>Add Vehicle</a>
                                        <a class='btn btn-warning logout_btn' href='logout.php'>Log Out</a>
                                      </div>
                                    ";
                                } 
                                     
                                }

                            ?>

                  <br><br>

                  <div class="row">
                      <div class="col-xs-12">

                          <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">

                              <div class="form-group">
                                  <label for="availability">Availability:</label>
                                  <input type="text" class="form-control" id="availability" name="availability">
                              </div>

                              <div class="form-group">
                                  <label for="manufacturer_id">Manufacturer_ID:</label>
                                  <input type="text" class="form-control" id="manufacturer_id" name="manufacturer_id">
                              </div>

                              <div class="form-group">
                                 <label for="category_id">Category_ID:</label>
                                  <input type="text" class="form-control" id="category_id" name="category_id">
                              </div>

                              <div class="form-group">
                                  <label for="model">Model:</label>
                                  <input type="text" class="form-control" id="model" name="model">
                              </div>

                              <div class="form-group">
                                  <label for="year">Year:</label>
                                  <input type="text" class="form-control" id="year" name="year">
                              </div>

                              <div class="form-group">
                                  <label for="price">Price:</label>
                                  <input type="text" class="form-control" id="price" name="price">
                              </div>

                              <div class="form-group">
                                  <label for="kilometers">Kilometers:</label>
                                  <input type="text" class="form-control" id="kilometers" name="kilometers">
                              </div>

                              <div class="form-group">
                                  <label for="colour">Colour:</label>
                                  <input type="text" class="form-control" id="colour" name="colour">
                              </div>

                               <div class="form-group">
                                 <label for="registration">Registration:</label>
                                  <input type="text" class="form-control" id="registration" name="registration">
                              </div>

                              <div class="form-group">
                                  <label for="model">VIN No.:</label>
                                  <input type="text" class="form-control" id="vin" name="vin">
                              </div>

                              <div class="form-group">
                                  <label for="cylinders">Cylinders:</label>
                                  <input type="text" class="form-control" id="cylinders" name="cylinders">
                              </div>

                              <div class="form-group">
                                  <label for="fuel">Fuel:</label>
                                  <input type="text" class="form-control" id="fuel" name="fuel">
                              </div>

                              <div class="form-group">
                                  <label for="transmission">Transmission:</label>
                                  <input type="text" class="form-control" id="transmission" name="transmission">
                              </div>

                              <div class="form-group">
                                  <label for="specials">Specials:</label>
                                  <input type="text" class="form-control" id="specials" name="specials">
                              </div>

                              <button type="submit" class="btn btn-default">Submit</button>

                          </form>
                      </div>
                  </div>

              </div>
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