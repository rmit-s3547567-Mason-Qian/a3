<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include('include/head.php');?>
<body class="body">

	<header class="mainHeader">
		<img src="css/banner.jpg" alt="banner" />  <!-- the banner on the top -->
		
		<nav><ul>  <!-- The Navigation Bar -->
			<li><a href="index.php">Home</a></li>
			<li ><a href="#">About Us</a></li>			
			<li><a href="booking.php">Booking</a></li>
			<li class="active"><a href="contactus.php">Contact Us</a></li>
		</ul></nav>
	</header>
	
	<div class="mainContent">
		<div class="content">
			<article class="topcontent">
				<header>
					<h2>Contact us!</h2>
				</header>
				
				<footer>
					<p class="post-info">This post is written by Younes </p>
				</footer>
				
				
					<p>
						<form id="contact_form" action ="http://titan.csit.rmit.edu.au/~e54061/wp/form-tester.php" method="post" enctype="multipart/form-data">

						 Email:<br>
						<input required type="email" class="input" name="email">
						<br>
						<br>
						Message Type:<br>
						<input type="radio" name="subject" value="General Enquiry" checked>General Enquiry<br>
						<input type="radio" name="subject" value="Group and Corporate Bookings" checked >Group and Corporate Bookings<br>
						<input type="radio" name="subject" value="Suggestions & Complaints" checked >Suggestions & Complaints <br>
						<br>
						 Message:<br>
	
						<textarea rows="8" cols="100">
						
						</textarea>
						<input type="submit" value="Submit">
						
						</form> 	
													
				</article>
		</div>
	</div>
			
	<?php include('include/footer.php');?>
	
 
</body>

</html>
