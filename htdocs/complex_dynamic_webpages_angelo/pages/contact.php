<?php


session_start();

//if (!isset($_SESSION['username'] )) {
 // header('location:scripts/login.php');
//}

if (!isset($_SESSION['wrongusername']) || !isset($_SESSION['wrongemail'])) {
  $_SESSION['wrongusername'] = "";
  $_SESSION['wrongemail'] = "";
  # code...
}

?>



<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AllStyles Homes - Contact Us</title>

  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
	<link href="../css/allstylehomes.css" rel="stylesheet" type="text/css">
    <link href="../css/media_queries.css" rel="stylesheet" type="text/css">
   
    
    <!-- JavaScript for GoogleMaps --> 
    <!-- The following accesses the javascript from the Google websit to enable GoogleMaps -->
	<script type="text/javascript" 
		src="http://maps.google.com/maps/api/js?sensor=false">
    </script>
 
<!-- NOTE: Below script for GoogleMap sourced from:  http://www.map-embed.com/  -->

  	<script type="text/javascript"> 
		function init_map(){
			var myOptions = {zoom:16,center:new google.maps.LatLng(-24.8520522,152.39065619999997),mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			;map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({
				map: map,position: new google.maps.LatLng(-24.8520522, 152.39065619999997)
				}
			);infowindow = new google.maps.InfoWindow({
				content:"<b>AllStyle Homes</b><br/>255 Serenity Drive<br/> Bundaberg" 
			}
			);google.maps.event.addListener(marker, "click", 
			function(){
				infowindow.open(map,marker);});infowindow.open(map,marker);
			}
			google.maps.event.addDomListener(window, 'load', init_map);
  	</script>
 
 <!-- =============  End of Google Map Section ============ -->

</head>



<body>
<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- ================================================= -->
   
   
   <header id="my_head">
	  
		<div class="headerSpinnerMon">
			<img src="../images/logo/logo_390x140.png" alt="Company logo which will rotate for 3 times and then stay still"  class="spinner img_logo"/>
		</div>
 	 
     
		<div class="head_address">
			<span class="t_black">AllStyle <span class="t_tan">Homes</span></span><br>
			<p class="righthead">255 Serenity Drive<br>
			Bundaberg QLD 4670 <br>
			Ph: 07 4153 9876<br>
            email: admin@ash.com.au</p>
		</div>
  
 
  <!-- ================================================= -->
 	  
  				 
    
		<div id="leftHeaderSpinnerMobile">
			<img src="../images/logo/logo_mobile.png" alt="Company logo which will rotate for 3 times and then stay still"  class="spinner img_logo_mobile"/>
		</div>
        
        
  <!-- ================================================= -->


		<nav>
            <!--<div id="logo">Demo Page</div>-->
            <label for="drop" class="toggle">Menu</label>
            
            <input type="checkbox" id="drop" />
            
            <ul class="menu">
            
              	<li><a href="../index.html" class="top-heading" >Home</a></li>
              
              	<li><a href="about.html" class="top-heading">About</a></li>
              
              	<li> 
                    <!-- First Tier Drop Down -->
                    <label for="drop-1" class="toggle">Designs +</label>
                    <a href="designs.html" class="top-heading" >Designs</a>
                    <input type="checkbox" id="drop-1"/>
                    <ul>
                        <li><a href="barclay.html">The Barclay</a></li>
                        <li><a href="jannsen.html">The Jannsen</a></li>
                        <li><a href="novelli.html">The Novelli</a></li>
                        <li><a href="preston.html">The Preston</a></li>
                        <li><a href="ridgely.html">The Ridgely</a></li>
                        <li><a href="sienna.html">The Sienna</a></li>
                    </ul>
              	</li>
          
                
                <li><a href="process.html" class="top-heading">Process</a></li>
                <li><a href="faq.html" class="top-heading">FAQ</a></li>
                <li><a href="testimonials.html" class="top-heading">Testimonials</a></li>
                <li><a href="contact.php" class="top-heading">Contacts</a></li>
            </ul>
       	</nav>


</header> 
    
    
      
		<article id="main">
    
    <!-- The DIV below sets a return point for the "Back To Top" button at the bottom of the page.  -->
      	<div id="page_top"></div>
    
    
		<!-- ========== Contact Form Section =========== -->

<section id="contact-page" >
<br>
<section id="cFHead">

    <img src="../images/contact/ash_contact_us.png" alt="Contact Us banner." class="lrg">
    <br>

<section class="fr-social-icons">
  <h4 class="_12">Follow us on:</h4>
  <ul class="social-icons">
    <li>
      <a href="" title="Facebook" class="social-icon"><img src="../images/sm-facebook.png" alt="The Facebook logo"/></a>
    </li>
    <li>
      <a href="" title="Twitter" class="social-icon"><img src="../images/sm-twitter.png" alt="The Twitter logo"/></a>
      </li>

    <li>
      <a href="" title="Flickr" class="social-icon"><img src="../images/sm-flickr.png" alt="The Flickr logo"/></a>
    </li>
    <li>
      <a href="" title="Youtube" class="social-icon"><img src="../images/sm-youtube.png" alt="The Youtube logo"/></a>
    </li>
    <li>
      <a href="" title="Dropbox" class="social-icon"><img src="../images/sm-dropbox.png" alt="The Dropbox logo"/></a>
    </li>
    <li>
      <a href="" title="Google +" class="social-icon"><img src="../images/sm-google+.png" alt="The Google+ logo"/></a>
    </li>
  </ul>

  
</section>  <!-- Closes "fr-social-icons" section  ======= -->

</section>  <!-- Closes "cFHead" section  ======= -->

        <section id = "email_container">

              <h2 class="mobileH2">Complete the form to join our email mailing list</h2>

              <form action="../scripts/sentInfoToDB.php" method="POST">

                <div class="e_title">Username:</div>
                
                    <input type="text" name="username" class="e_title_input" 
                        placeholder="Choose & Enter a Username" 
                        value="<?php echo $_SESSION['wrongusername'];?>" >
                   
               <br><br><br>

                <div class="e_title">Email:</div>
                
                    <input type="text" name="email" class="e_title_input" placeholder="Enter an Email" aria-describedby="sizing-addon1" value="<?php echo $_SESSION['wrongemail'];?>">
                  
                <br><br>

                <input type="submit" name="submit" value="Submit" class="btn_submit"></input><a href="../scripts/login.php" class="btn_adminLogin">Admin. Login</a>
              </form> 

        </section>  <!-- Closes the "email_container" section-->


     <section id="contacting"> 
    
    <h4 class="_12">Is there something we can help you with?
    </h4>
    <p class="bo">Contact Us Via:</p>
    	<div class="cont_icons">
        	<ul>
        		<li><i class="fa fa-car"></i><br/><br/><br/></li>
        		<li><i class="fa fa-pencil-square-o"></i><br/><br/><br/></li>
            	<li><i class="fa fa-phone"></i></li>
            	<li><i class="fa fa-fax"></i></li>
                <li><i class="fa fa-mobile"></i></li>
                <li><i class="fa fa-envelope-o"></i></li>
			</ul>
        </div>
    	<div class="cont_details">
    	  <p class="details">255 Serenity Drive<br>
    	    Bundaberg QLD 4670 <br>
  <br>
    	    P.O.Box 3543<br>
    	    Bunaberg QLD 4670<br>
  <br>
    	    Ph: 07 4153 9876<br>
    	    07 4153 9877<br>
    	    04050 539 876<br>
    	    info@allstylehomes.com.audisplay:</p>
    	</div>
        
        <div class="hours">
    	<p class="bo">Opening Hours</p>
        <p class="details">Monday to Friday  <br>
							&nbsp;&nbsp;&nbsp;7.30am – 5.30pm <br>
							Saturday <br>
							&nbsp;&nbsp;&nbsp;9.00am – 4.00pm <br>
							Sunday <br>
							&nbsp;&nbsp;&nbsp;Closed </p>
    	</div>
        
      
     
 
    </section>  <!-- Closes "contacting" section  ====== -->
    
    
	</section>  <!-- Closes "contact-form" section  ====== -->
    

	

 
    
    <!--
    <ul id="errors" class="">
        <li id="info">There were some problems with your form submission:</li>
    </ul>
    <p id="success">Thanks for your message! We will get back to you ASAP!</p>
    
    
    <form method="post" action="process.php">
        <label for="name">Name: <span class="required">*</span></label>
<label for="email">Email Address: <span class="required">*</span></label>
        <input type="email" id="email" name="email" value="" placeholder="johndoe@example.com" required="required" />
         
        <label for="telephone">Telephone: </label>
        <input type="tel" id="telephone" name="telephone" value="" />
         
        <label for="enquiry">Enquiry: </label>
        <select id="enquiry" name="enquiry">
            <option value="general">General Inquiry</option>
            <option value="sales">Arrrange An Appointment</option>
            <option value="support">Existing Client Support</option>
        </select>
         
        <label for="message">Message: <span class="required">*</span></label>
        <textarea id="message" name="message" placeholder="Your message must be greater than 20 charcters" required data-minlength="20"></textarea>
         
        <span id="loading"></span>
        <input type="submit" value="SUBMIT" id="submit-button" />
        <p id="req-field-desc"><span class="required">*</span> indicates a required field</p>
    </form>
    <br><br><br>
</div>
-->
<!-- End of Contact Form Section ============== -->

 
 
 <!-- Google Map Section ==================== -->
 
 		<section class="gMSpacer">
        	<h4 class="_12">Our location</h4><br>
        </section>

		<section id="gmap_container">
        
  		<section id="gmap_canvas" >
    	
		<!-- Style sheet for GoogleMaps -->

  		<style scoped>
			#gmap_canvas img{max-width:none!important;background:none!important}
    	</style>
    
    
  		<a href="http://www.themecircle.net" id="get-map-data"> wordpress themes class="google-map-code" </a>
        
       </section>   <!-- Closes "gmap_canvas" section  -->
       
       </section>   <!-- Closes "gmap_container" section  -->
 	
    <a href="#page_top" >Back to Top <img src="../images/up_arrow.png" alt="Up arrow symbol" width="20" height="25" /></a>
    
  
  </article>	<!-- Closes the "main" article -->

  	<!-- =========================================== -->



     
<footer>
<h5>   We value the support of the following companies: </h5>

<a href="http://www.bluescopesteel.com.au/" target="_blank"><img src="../images/logo/bluescope_logo_2.png" alt="Blue Scope Steel logo" class="in_line"/>
</a>
    
    <a href="http://www.parksidegroup.com.au/" target="_blank"><img src="../images/logo/parksidegroupe_logo.png" alt="Parkside Group logo" class="in_line"/>
    </a>
  	
    <a href="http://hewittelectrical.com.au/" target="_blank"><img src="../images/logo/neil_hewitt_elec&air_logo.png" alt="Neil Hewitt Elec & Air logo" class="in_line"/>
    </a>
  	
    <a href="http://www.ridgewayroof.com.au/" target="_blank"><img src="../images/logo/ridgeway_logo.png" alt="Ridgeway Roofing Supplies logo." class="in_line"/>
    </a>
    
    <a href="http://www.beaumont-tiles.com.au/" target="_blank"><img src="../images/logo/beaumonttiles_logo.jpg" alt="Beaumont tiles logo." class="in_line"/>
    </a>
    
    <a href="http://www.cwp.com.au/" target="_blank"><img src="../images/logo/wholesalepaintgroup_logo.png" alt="wholesale paint group logo" class="in_line"/>
  	</a>
    
    <a href="../www.bunnings.com.au" target="_blank"><img src="../images/logo/bunnings.png" alt="Bunnings Warehouse logo." class="in_line"/>
    </a>
   
        
    <a href="http://www.timstewartarchitects.com.au/" target="_blank"><img src="../images/logo/tim_stewart_architect_logo.png" alt="Tim Stewart Architects logo" class="in_line"/>
    </a>
    
    <a href="http://www.rams.com.au/" target="_blank"><img src="../images/logo/rams_logo2.png" alt="RAMS Home Loans logo" class="in_line"/>
    </a>
    
    <a href="https://www.aussie.com.au/" target="_blank"><img src="../images/logo/aussie.png" alt="Aussie Home Loans logo" class="in_line"/>
    </a>    
    
    
    <a href="https://www.qbcc.qld.gov.au/" target="_blank"><img src="../images/logo/qbcc_logo.png" alt="Qld Building and Construction Commission logo" class="in_line"/>
    </a>
    <a href="http://www.masterbuilders.asn.au/" target="_blank"><img src="../images/logo/master_builders_qld_logo.png" alt="Master Builders Queensland" class="in_line"/>
    </a>
    <a href="https://www.cbussuper.com.au" target="_blank"><img src="../images/logo/cbus_ais_logo.png" alt="cbus – an industry superfund logo" class="in_line"/>
    </a>
    
    <br><br><br>
    
  	<!-- =========================================== -->
    <div class="abobe_link">
    <a href="http://get.adobe.com/reader/"><img src="../images/getadobereader_button_158x39.png" alt="Get Adobe Reader." style="float:right;">Adobe Reader (free)</a> or other software must be installed on this computer to view documents marked &quot;(PDF).&quot;
    </div><br><br><br><br> 
    
    <a href="documents/terms_and_conditions.pdf" target="_blank" class="class2">Terms and Conditions</a> |
        <a href="documents/privacy_statement.pdf" target="_blank" class="class2">Privacy Statement</a> |
		<a href="sitemap.html" class="class2">Sitemap</a> |
        <span class="statement">&copy; 2015 AllStyle Homes</span>

</footer> <!-- Closes the "footer" -->

  	<!-- =========================================== -->
</body>
</html>
