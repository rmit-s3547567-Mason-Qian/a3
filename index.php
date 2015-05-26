<?php session_start();
?>
<!DOCTYPE html>
<html>
<?php include('include/head.php');?>
<body class="body">

	<header class="mainHeader">
		<img src="css/banner.jpg" alt="banner" />
		
		<nav><ul>
			<li class="active"><a href="index.php">Home</a></li> 
			<li><a href="#">About Us</a></li>			
			<li><a href="booking.php">Booking</a></li>
			<li><a href="contactus.php">Contact Us</a></li>
		</ul></nav>
	</header>
	
	<div class="mainContent">
		<div class="content">
			<article class="topcontent">
				<header>
					<h2> A New Beginning</h2>
				</header>
				
				<footer>
					<p class="post-info">This post is written by Younes </p>
				</footer>
				
				<div>
					<p>
					Dear fellow movie patrons,<br>
					
					We, at <b>Silverado Cinema</b>, are glad to announce the unveiling of our remodelled movie theatres! 
					Now with brand new leather seats and new 3D projection screenings, no longer will you be forced to travel 
					into the city to enjoy the highest quality movie experience. 
					Along with our new <i>"Dolby Sound system"</i> We here at <b>Silverado Cinema</b> have done our best to bring you the best, 
					in experience and comfort. 
					</p>
					
				</div>
				
  
     
			</article>
			
			<article class="bottomcontent">
				<header>
					<h2>What's New!</h2>
					
      <!--  Outer wrapper for presentation only, this can be anything you like -->
      <div id="banner-fade">

        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
				
          <li><img src="img/Cinderella.jpg" alt="Cinderella"/></li>
          <li><img src="img/Home.jpg" alt="Home"/></li>
          <li><img src="img/Fast7.jpg" alt="Fast And Furious 7"/></li>
		  <li><img src="img/Foreign.jpg" alt="Old Boys: The way of the dragon"/></li>
        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      <!-- End outer wrapper -->

      <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 320,
            width       : 250,
            responsive  : true
          });

        });

      </script>
	  
	  
				</header>
				
				<footer>
					<p class="post-info">This post is written by Younes </p>
				</footer>
				
					
			</article>
		</div>
	</div>
	
			
	<?php include('include/footer.php');?>
	<!-- <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>-->

 
</body>

</html>
