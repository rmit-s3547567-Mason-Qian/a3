<!-- Javascript -->
        <!-- http://jsfiddle.net/a6C7F/    [show and hide] -->
        <!--https://jqueryui.com/dialog/    [dialog]-->
		<!--http://jsfiddle.net/UpGWP/        [subtotal and grandtotal]-->
		<!-- Images cited from: http://www.hoyts.com.au/movies/now_on_sale.aspx -->
<!-- Slider sited from : http://www.sitepoint.com/web-foundations/making-simple-image-slider-html-css-jquery/ -->
<!-- Slider also sited from: http://stackoverflow.com/questions/22468064/how-to-make-a-jquery-slider-from-scratch-->
<!DOCTYPE html>
    <html>

    <head>	

    <title> Silverado Cinema </title>
<meta charset="utf-8" />
<script src="jquery-1.11.2.js"></script>
<script src="bjqs-1.3.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="jquery-ui.css" />
<script src="jquery-ui.js"></script>
	<meta name= "viewport" content="width=device-width, initial-scale=1.0">
	
</head>


    <body class="body">

        <header class="mainHeader">
            <img src="css/banner.jpg" alt="banner" />

            <nav><ul>
                <li><a href="index.php">Home</a></li> 
                <li><a href="#">About Us</a></li>			
                <li class="active"><a href="booking.php">Booking</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul></nav>
        </header>

        <div class="mainContent">

                <article class="topcontent">
                    <header>
                        <h2> Price and Schedule Information</h2>
                    </header>

                    <footer>
                        <p class="post-info">This post is written by Younes </p>
                    </footer>

                    <table style="width:100%"></table>
                    <table id="schedule">


                     <tr>
                        <th>Price List</th>
                        <th>Monday - Tuesday(All Day) <br>Monday - Friday (1pm Only)</th> 
                        <th>Wednesday - Friday (Not 1pm) <br>Saturday - Sunday (All Day)</th>
                      </tr>
                      <tr>
                        <td>Standard-Full</td>
                        <td>$12</td> 
                        <td>$18</td>
                      </tr>
                      <tr class="alt">
                        <td>Standard-Concession</td>
                        <td>$10</td> 
                        <td>$15</td>
                      </tr>
                      <tr>
                        <td>Standard-Child</td>
                        <td>$8</td> 
                        <td>$12</td>
                      </tr>

                      <tr class="alt">
                        <td>FirstClass-Adult</td>
                        <td>$25</td> 
                        <td>$30</td>
                      </tr>
                      <tr>
                        <td>FirstClass-Child</td>
                        <td>$20</td> 
                        <td>$25</td>
                      </tr>
                    <tr class="alt">
                        <td>Beanbag*</td>
                        <td>$25</td> 
                        <td>$30</td>
                      </tr>
                     </table>
                     <i> *Beanbag price allows up to 2 adults OR 1 adult + 1 child OR up to 3 children. One price fits all! </i>


                </article>
                <div class="bottomcontent">
            <div class="bottomcontent">
                <article class="">
                    <header>
                        <h2>Weekly Schedule</h2>
                    </header>
                    <table id="schedule1">

                    <tr>
                        <th>Monday-Tuesday</th>
                        <th>Wednesday-Friday</th> 
                        <th>Saturday - Sunday</th>
                      </tr>
                      <tr>
                        <td>1pm - Home <br><img class="Homeimg" src="img/Home.jpg" alt="Home" ><br> <button id="opener">Movie Information</button> </td>
                        <td class="boom">1pm - Cinderella <br><img class="Cinderellaimg" src="img/Cinderella.jpg" alt="Home"><br> <button id="opener2">Movie Information</button></td> 
                        <td>12pm - Home  <br><img class="Homeimg" src="img/Home.jpg" alt="Home"><br> <button id="opener3">Movie Information</button></td>
                      </tr>
                      <tr class="alt">
                        <td>6pm - OLD BOYS: THE WAY OF THE DRAGON <br><img class="Foreignimg" src="img/Foreign.jpg" alt="Home"><br> <button id="opener5">Movie Information</button> </td>
                        <td class="boom">6pm - Home <br><br><img class="Homeimg" src="img/Home.jpg" alt="Home"><br> <button id="opener4">Movie Information</button></td> 
                        <td>3pm - OLD BOYS: THE WAY OF THE DRAGON <br><img class="Foreignimg" src="img/Foreign.jpg" alt="Home"><br><button id="opener6">Movie Information</button> </td>
                      </tr>
                      <tr>
                        <td>9pm - Cinderella <br><img class="Cinderellaimg" src="img/Cinderella.jpg" alt="Home"><br> <button id="opener7">Movie Information</button> </td>
                        <td class="boom">9pm - Fast & Furious 7 <br><img class="Fast7img" src="img/Fast7.jpg" alt="Home"><br> <button id="opener8">Movie Information</button></td> 
                        <td>6pm - Cinderella <br><img class="Cinderellaimg" src="img/Cinderella.jpg" alt="Home"><br><button id="opener9">Movie Information</button> </td>

                      </tr>
                      <tr class="alt">
                        <td></td>
                        <td></td> 
                        <td>9pm - Fast & Furious 7 <br><img class="Fast7img" src="img/Fast7.jpg" alt="Home"><br><button id="opener10">Movie Information</button></td>
                      </tr>
                     </table>
                </article>
          <!-- Javascript -->
          <script>
             $(function() {
                $( "#dialog-1" ).dialog({
                   autoOpen: false, width: "850px" 
                });
                $( "#opener" ).click(function() {
                   $( "#dialog-1" ).dialog( "open" );
                });
             });
          </script>
<script>
$(document).ready(function(){
    $.post("https://<?php echo $_SERVER['SERVER_NAME']; ?>/~s3545402/wp/a1/json/homejson.php",
      {
// Post nothing to get everything ... sounds stupid I know but ...  
      },
      function(data) {     
// Parse data as a JSON object        
        var movieObj=JSON.parse(data);
        
// We are now going to build up a HTML string
        var htmlString="";

// movieObj contains 4 movies. Put each movie into a separate <div> with a movie id
        for (movie in movieObj)
        {
          htmlString+="<div id='"+movie+"'>";
          
        //console.log(movieObj[movie].title);
        console.log(movie);
          
// Put the title in a <h3> and poster url in an <img> for each movie          
          htmlString+="<h3>"+movieObj[movie].title+"</h3>";
          htmlString+="<div><img src='"+movieObj[movie].poster+"' alt='poster' /></div>";
		  htmlString+="<div><img src='"+movieObj[movie].rating+"' alt='rating' /></div>";
		  htmlString+="<div><video src='"+movieObj[movie].trailer+"' alt='video' /></div>";

// each movieObj[movie].description contains a number of paragraphs. Put each paragraph into a separate <p>
          for (i in movieObj[movie].description)
          {
            htmlString+="<p>"+movieObj[movie].description[i]+"</p>";
          }
          htmlString+="</div>";
        }
        
// Put htmlString in the second div
        $("#homeinfo").html(htmlString);
        
// 20150518: testing something out for students        
        console.log(movieObj.CH.title);
        console.log(movieObj['CH'].title);
      });
});
</script>

    <div id="dialog-1" title="Home">
	<div id="homeinfo"></div>
	
								  <h4>Session Times:</h4>

 <div class="session">
			<ul>
                <li><span class="day">Monday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Monday&time=13.00">1pm</a></button></li>
                <li><span class="day">Tuesday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Tuesday&time=13.00">1pm</a></button></li>
				<li><span class="day">Wednesday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Wednesday&time=18.00">6pm</a></button></li>
				<li><span class="day">Thursday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Thursday&time=18.00">6pm</a></button></li>
				<li><span class="day">Friday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Friday&time=18.00">6pm</a></button></li>
				<li><span class="day">Saturday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Saturday&time=12.00">12pm</a></button></li>
				<li><span class="day">Sunday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Sunday&time=12.00">12pm</a></button></li>
			</ul>

            </div>	
    </div>   
      <!-- Javascript -->
          <script>
             $(function() {
                $( "#dialog-2" ).dialog({
                   autoOpen: false, width: "850px" 
                });
                $( "#opener2" ).click(function() {
                   $( "#dialog-2" ).dialog( "open" );
                });
             });
          </script>


<script>
$(document).ready(function(){
    $.post("https://<?php echo $_SERVER['SERVER_NAME']; ?>/~s3545402/wp/a1/json/cinderellajson.php",
      { 
      },
      function(data) {     
// Parse data as a JSON object        
        var movieObj=JSON.parse(data);
        
// We are now going to build up a HTML string
        var htmlString="";

// movieObj contains 4 movies. Put each movie into a separate <div> with a movie id
        for (movie in movieObj)
        {
          htmlString+="<div id='"+movie+"'>";
          
        //console.log(movieObj[movie].title);
        console.log(movie);
          
// Put the title in a <h3> and poster url in an <img> for each movie          
          htmlString+="<h3>"+movieObj[movie].title+"</h3>";
          htmlString+="<div><img src='"+movieObj[movie].poster+"' alt='poster' /></div>";
		  htmlString+="<div><img src='"+movieObj[movie].rating+"' alt='rating' /></div>";
		  htmlString+="<div><video src='"+movieObj[movie].trailer+"' alt='video' /></div>";

// each movieObj[movie].description contains a number of paragraphs. Put each paragraph into a separate <p>
          for (i in movieObj[movie].description)
          {
            htmlString+="<p>"+movieObj[movie].description[i]+"</p>";
          }
          htmlString+="</div>";
        }
        
// Put htmlString in the second div
        $("#cinderellainfo").html(htmlString);
        
// 20150518: testing something out for students        
        console.log(movieObj.CH.title);
        console.log(movieObj['CH'].title);
      });
});
</script>
    <div id="dialog-2" title="Cinderella">
<div id="cinderellainfo"></div>
        
<div class="session">
			<h4>Session Times:</h4>
			<ul>
                <li><span class="day">Monday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Monday&time=13.00">1pm</a></button></li>
                <li><span class="day">Tuesday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Tuesday&time=13.00">1pm</a></button></li>
				<li><span class="day">Wednesday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Wednesday&time=18.00">6pm</a></button></li>
				<li><span class="day">Thursday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Thursday&time=18.00">6pm</a></button></li>
				<li><span class="day">Friday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Friday&time=18.00">6pm</a></button></li>
				<li><span class="day">Saturday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Saturday&time=12.00">12pm</a></button></li>
				<li><span class="day">Sunday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Sunday&time=12.00">12pm</a></button></li>
			</ul>
		</div>
    </div>
                </div>
            </div>


          <!-- Javascript -->
          <script>
             $(function() {
                $( "#dialog-3" ).dialog({
                   autoOpen: false, width: "850px" 
                });
                $( "#opener3" ).click(function() {
                   $( "#dialog-3" ).dialog( "open" );
                });
             });
          </script>
		  <script>
$(document).ready(function(){
    $.post("https://<?php echo $_SERVER['SERVER_NAME']; ?>/~s3545402/wp/a1/json/homejson.php",
      {
// Post nothing to get everything ... sounds stupid I know but ...  
      },
      function(data) {     
// Parse data as a JSON object        
        var movieObj=JSON.parse(data);
        
// We are now going to build up a HTML string
        var htmlString="";

// movieObj contains 4 movies. Put each movie into a separate <div> with a movie id
        for (movie in movieObj)
        {
          htmlString+="<div id='"+movie+"'>";
          
        //console.log(movieObj[movie].title);
        console.log(movie);
          
// Put the title in a <h3> and poster url in an <img> for each movie          
          htmlString+="<h3>"+movieObj[movie].title+"</h3>";
          htmlString+="<div><img src='"+movieObj[movie].poster+"' alt='poster' /></div>";
		  htmlString+="<div><img src='"+movieObj[movie].rating+"' alt='rating' /></div>";
		  htmlString+="<div><video src='"+movieObj[movie].trailer+"' alt='video' /></div>";

// each movieObj[movie].description contains a number of paragraphs. Put each paragraph into a separate <p>
          for (i in movieObj[movie].description)
          {
            htmlString+="<p>"+movieObj[movie].description[i]+"</p>";
          }
          htmlString+="</div>";
        }
        
// Put htmlString in the second div
        $("#homeinfo2").html(htmlString);
        
// 20150518: testing something out for students        
        console.log(movieObj.CH.title);
        console.log(movieObj['CH'].title);
      });
});
</script>
    <div id="dialog-3" title="Home">
<div id="homeinfo2"></div>
<div class="session">
			<h4>Session Times:</h4>
			<ul>
                <li><span class="day">Monday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Monday&time=13.00">1pm</a></button></li>
                <li><span class="day">Tuesday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Tuesday&time=13.00">1pm</a></button></li>
				<li><span class="day">Wednesday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Wednesday&time=18.00">6pm</a></button></li>
				<li><span class="day">Thursday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Thursday&time=18.00">6pm</a></button></li>
				<li><span class="day">Friday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Friday&time=18.00">6pm</a></button></li>
				<li><span class="day">Saturday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Saturday&time=12.00">12pm</a></button></li>
				<li><span class="day">Sunday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Sunday&time=12.00">12pm</a></button></li>
			</ul>
		</div>
            </div>	
    </div>   

          <!-- Javascript -->
          <script>
             $(function() {
                $( "#dialog-4" ).dialog({
                   autoOpen: false, width: "850px" 
                });
                $( "#opener4" ).click(function() {
                   $( "#dialog-4" ).dialog( "open" );
                });
             });
          </script>
<script>
$(document).ready(function(){
    $.post("https://<?php echo $_SERVER['SERVER_NAME']; ?>/~s3545402/wp/a1/json/homejson.php",
      {
// Post nothing to get everything ... sounds stupid I know but ...  
      },
      function(data) {     
// Parse data as a JSON object        
        var movieObj=JSON.parse(data);
        
// We are now going to build up a HTML string
        var htmlString="";

// movieObj contains 4 movies. Put each movie into a separate <div> with a movie id
        for (movie in movieObj)
        {
          htmlString+="<div id='"+movie+"'>";
          
        //console.log(movieObj[movie].title);
        console.log(movie);
          
// Put the title in a <h3> and poster url in an <img> for each movie          
          htmlString+="<h3>"+movieObj[movie].title+"</h3>";
          htmlString+="<div><img src='"+movieObj[movie].poster+"' alt='poster' /></div>";
		  htmlString+="<div><img src='"+movieObj[movie].rating+"' alt='rating' /></div>";
		  htmlString+="<div><video src='"+movieObj[movie].trailer+"' alt='video' /></div>";

// each movieObj[movie].description contains a number of paragraphs. Put each paragraph into a separate <p>
          for (i in movieObj[movie].description)
          {
            htmlString+="<p>"+movieObj[movie].description[i]+"</p>";
          }
          htmlString+="</div>";
        }
        
// Put htmlString in the second div
        $("#homeinfo3").html(htmlString);
        
// 20150518: testing something out for students        
        console.log(movieObj.CH.title);
        console.log(movieObj['CH'].title);
      });
});
</script>
    <div id="dialog-4" title="Home">
<div id="homeinfo3"></div>
<div class="session">
			<h4>Session Times:</h4>
			<ul>
                <li><span class="day">Monday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Monday&time=13.00">1pm</a></button></li>
                <li><span class="day">Tuesday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Tuesday&time=13.00">1pm</a></button></li>
				<li><span class="day">Wednesday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Wednesday&time=18.00">6pm</a></button></li>
				<li><span class="day">Thursday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Thursday&time=18.00">6pm</a></button></li>
				<li><span class="day">Friday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Friday&time=18.00">6pm</a></button></li>
				<li><span class="day">Saturday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Saturday&time=12.00">12pm</a></button></li>
				<li><span class="day">Sunday</span>
				<button class="time"><a href="bookingpage1.php?film=Home&day=Sunday&time=12.00">12pm</a></button></li>
			</ul>
		</div>
            </div>	
    </div>   

                        <script>
             $(function() {
                $( "#dialog-5" ).dialog({
                   autoOpen: false, width: "850px" 
                });
                $( "#opener5" ).click(function() {
                   $( "#dialog-5" ).dialog( "open" );
                });
             });
          </script>

<script>
$(document).ready(function(){
    $.post("https://<?php echo $_SERVER['SERVER_NAME']; ?>/~s3545402/wp/a1/json/oldboyjson.php",
      {
// Post nothing to get everything ... sounds stupid I know but ...  
      },
      function(data) {     
// Parse data as a JSON object        
        var movieObj=JSON.parse(data);
        
// We are now going to build up a HTML string
        var htmlString="";

// movieObj contains 4 movies. Put each movie into a separate <div> with a movie id
        for (movie in movieObj)
        {
          htmlString+="<div id='"+movie+"'>";
          
        //console.log(movieObj[movie].title);
        console.log(movie);
          
// Put the title in a <h3> and poster url in an <img> for each movie          
          htmlString+="<h3>"+movieObj[movie].title+"</h3>";
          htmlString+="<div><img src='"+movieObj[movie].poster+"' alt='poster' /></div>";
		  htmlString+="<div><img src='"+movieObj[movie].rating+"' alt='rating' /></div>";
		  htmlString+="<div><video src='"+movieObj[movie].trailer+"' alt='video' /></div>";

// each movieObj[movie].description contains a number of paragraphs. Put each paragraph into a separate <p>
          for (i in movieObj[movie].description)
          {
            htmlString+="<p>"+movieObj[movie].description[i]+"</p>";
          }
          htmlString+="</div>";
        }
        
// Put htmlString in the second div
        $("#oldboyinfo").html(htmlString);
        
// 20150518: testing something out for students        
        console.log(movieObj.CH.title);
        console.log(movieObj['CH'].title);
      });
});
</script>
    <div id="dialog-5" title="OLD BOYS: THE WAY OF THE DRAGON">
<div id="oldboyinfo"></div>
<div class="session">
			<h4>Session Times:</h4>
			<ul>
                <li><span class="day">Monday</span>
				<button class="time"><a href="bookingpage1.php?film=OldBoys&day=Monday&time=18.00">6pm</a></button></li>
                <li><span class="day">Tuesday</span>
				<button class="time"><a href="bookingpage1.php?film=OldBoys&day=Tuesday&time=18.00">6pm</a></button></li>
				<li><span class="day">Saturday</span>
				<button class="time"><a href="bookingpage1.php?film=OldBoys&day=Saturday&time=15.00">3pm</a></button></li>
				<li><span class="day">Sunday</span>
				<button class="time"><a href="bookingpage1.php?film=OldBoys&day=Sunday&time=15.00">3pm</a></button></li>
			</ul>
		</div>
    </div>
                </div>
            </div>
    </div>
                <script>
             $(function() {
                $( "#dialog-6" ).dialog({
                   autoOpen: false, width: "850px" 
                });
                $( "#opener6" ).click(function() {
                   $( "#dialog-6" ).dialog( "open" );
                });
             });
          </script>
		  <script>
$(document).ready(function(){
    $.post("https://<?php echo $_SERVER['SERVER_NAME']; ?>/~s3545402/wp/a1/json/oldboyjson.php",
      {
// Post nothing to get everything ... sounds stupid I know but ...  
      },
      function(data) {     
// Parse data as a JSON object        
        var movieObj=JSON.parse(data);
        
// We are now going to build up a HTML string
        var htmlString="";

// movieObj contains 4 movies. Put each movie into a separate <div> with a movie id
        for (movie in movieObj)
        {
          htmlString+="<div id='"+movie+"'>";
          
        //console.log(movieObj[movie].title);
        console.log(movie);
          
// Put the title in a <h3> and poster url in an <img> for each movie          
          htmlString+="<h3>"+movieObj[movie].title+"</h3>";
          htmlString+="<div><img src='"+movieObj[movie].poster+"' alt='poster' /></div>";
		  htmlString+="<div><img src='"+movieObj[movie].rating+"' alt='rating' /></div>";
		  htmlString+="<div><video src='"+movieObj[movie].trailer+"' alt='video' /></div>";

// each movieObj[movie].description contains a number of paragraphs. Put each paragraph into a separate <p>
          for (i in movieObj[movie].description)
          {
            htmlString+="<p>"+movieObj[movie].description[i]+"</p>";
          }
          htmlString+="</div>";
        }
        
// Put htmlString in the second div
        $("#oldboyinfo2").html(htmlString);
        
// 20150518: testing something out for students        
        console.log(movieObj.CH.title);
        console.log(movieObj['CH'].title);
      });
});
</script>
    <div id="dialog-6" title="OLD BOYS: THE WAY OF THE DRAGON">
<div id="oldboyinfo2"></div>
<div class="session">
			<h4>Session Times:</h4>
			<ul>
                <li><span class="day">Monday</span>
				<button class="time"><a href="bookingpage1.php?film=OldBoys&day=Monday&time=18.00">6pm</a></button></li>
                <li><span class="day">Tuesday</span>
				<button class="time"><a href="bookingpage1.php?film=OldBoys&day=Tuesday&time=18.00">6pm</a></button></li>
				<li><span class="day">Saturday</span>
				<button class="time"><a href="bookingpage1.php?film=OldBoys&day=Saturday&time=15.00">3pm</a></button></li>
				<li><span class="day">Sunday</span>
				<button class="time"><a href="bookingpage1.php?film=OldBoys&day=Sunday&time=15.00">3pm</a></button></li>
			</ul>
		</div>
    </div>
                </div>
            </div>
    </div>
    <script>
             $(function() {
                $( "#dialog-7" ).dialog({
                   autoOpen: false, width: "850px" 
                });
                $( "#opener7" ).click(function() {
                   $( "#dialog-7" ).dialog( "open" );
                });
             });
          </script>
		  <script>
$(document).ready(function(){
    $.post("https://<?php echo $_SERVER['SERVER_NAME']; ?>/~s3545402/wp/a1/json/cinderellajson.php",
      { 
      },
      function(data) {     
// Parse data as a JSON object        
        var movieObj=JSON.parse(data);
        
// We are now going to build up a HTML string
        var htmlString="";

// movieObj contains 4 movies. Put each movie into a separate <div> with a movie id
        for (movie in movieObj)
        {
          htmlString+="<div id='"+movie+"'>";
          
        //console.log(movieObj[movie].title);
        console.log(movie);
          
// Put the title in a <h3> and poster url in an <img> for each movie          
          htmlString+="<h3>"+movieObj[movie].title+"</h3>";
          htmlString+="<div><img src='"+movieObj[movie].poster+"' alt='poster' /></div>";
		  htmlString+="<div><img src='"+movieObj[movie].rating+"' alt='rating' /></div>";
		  htmlString+="<div><video src='"+movieObj[movie].trailer+"' alt='video' /></div>";

// each movieObj[movie].description contains a number of paragraphs. Put each paragraph into a separate <p>
          for (i in movieObj[movie].description)
          {
            htmlString+="<p>"+movieObj[movie].description[i]+"</p>";
          }
          htmlString+="</div>";
        }
        
// Put htmlString in the second div
        $("#cinderellainfo2").html(htmlString);
        
// 20150518: testing something out for students        
        console.log(movieObj.CH.title);
        console.log(movieObj['CH'].title);
      });
});
</script>
    <div id="dialog-7" title="Cinderella">
<div id="cinderellainfo2"></div>
<div class="session">
			<h4>Session Times:</h4>
			<ul>
                <li><span class="day">Monday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Monday&time=21.00">9pm</a></button></li>
                <li><span class="day">Tuesday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderalla&day=Tuesday&time=21.00">9pm</a></button></li>
				<li><span class="day">Wednesday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Wednesday&time=13.00">1pm</a></button></li>
				<li><span class="day">Thursday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Thursday&time=13.00">1pm</a></button></li>
				<li><span class="day">Friday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Friday&time=13.00">1pm</a></button></li>
				<li><span class="day">Saturday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Saturday&time=18.00">6pm</a></button></li>
				<li><span class="day">Sunday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Sunday&time=18.00">6pm</a></button></li>
			</ul>
		</div>

    </div>
                </div>
            </div>
    <script>
             $(function() {
                $( "#dialog-8" ).dialog({
                   autoOpen: false, width: "850px" 
                });
                $( "#opener8" ).click(function() {
                   $( "#dialog-8" ).dialog( "open" );
                });
             });
          </script>


<script>
$(document).ready(function(){
    $.post("https://<?php echo $_SERVER['SERVER_NAME']; ?>/~s3545402/wp/a1/json/fastjson.php",
      { 
      },
      function(data) {     
// Parse data as a JSON object        
        var movieObj=JSON.parse(data);
        
// We are now going to build up a HTML string
        var htmlString="";

// movieObj contains 4 movies. Put each movie into a separate <div> with a movie id
        for (movie in movieObj)
        {
          htmlString+="<div id='"+movie+"'>";
          
        //console.log(movieObj[movie].title);
        console.log(movie);
          
// Put the title in a <h3> and poster url in an <img> for each movie          
          htmlString+="<h3>"+movieObj[movie].title+"</h3>";
          htmlString+="<div><img src='"+movieObj[movie].poster+"' alt='poster' /></div>";
		  htmlString+="<div><img src='"+movieObj[movie].rating+"' alt='rating' /></div>";
		  htmlString+="<div><video src='"+movieObj[movie].trailer+"' alt='video' /></div>";

// each movieObj[movie].description contains a number of paragraphs. Put each paragraph into a separate <p>
          for (i in movieObj[movie].description)
          {
            htmlString+="<p>"+movieObj[movie].description[i]+"</p>";
          }
          htmlString+="</div>";
        }
        
// Put htmlString in the second div
        $("#fast7info").html(htmlString);
        
// 20150518: testing something out for students        
        console.log(movieObj.CH.title);
        console.log(movieObj['CH'].title);
      });
});
</script>
    <div id="dialog-8" title="Fast and Furious 7">
<div id="fast7info"></div>

<div class="session">
			<h4>Session Times:</h4>
			<ul>
				<li><span class="day">Wednesday</span>
				<button class="time"><a href="bookingpage1.php?film=Fast7&day=Wednesday&time=21.00">9pm</a></button></li>
				<li><span class="day">Thursday</span>
				<button class="time"><a href="bookingpage1.php?film=Fast7&day=Thursday&time=21.00">9pm</a></button></li>
				<li><span class="day">Friday</span>
				<button class="time"><a href="bookingpage1.php?film=Fast7&day=Friday&time=21.00">9pm</a></button></li>
				<li><span class="day">Saturday</span>
				<button class="time"><a href="bookingpage1.php?film=Fast7&day=Saturday&time=21.00">9pm</a></button></li>
				<li><span class="day">Sunday</span>
				<button class="time"><a href="bookingpage1.php?film=Fast7&day=Sunday&time=21.00">9pm</a></button></li>
			</ul>
		</div>
            </div>	
    </div>   
    </div>
    <script>
             $(function() {
                $( "#dialog-9" ).dialog({
                   autoOpen: false, width: "850px" 
                });
                $( "#opener9" ).click(function() {
                   $( "#dialog-9" ).dialog( "open" );
                });
             });
          </script>
    <div id="dialog-9" title="Cinderella">
	<div id="cinderellainfo"></div>
							<div class="session">
			<h4>Session Times:</h4>
			<ul>
                <li><span class="day">Monday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Monday&time=21.00">9pm</a></button></li>
                <li><span class="day">Tuesday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderalla&day=Tuesday&time=21.00">9pm</a></button></li>
				<li><span class="day">Wednesday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Wednesday&time=13.00">1pm</a></button></li>
				<li><span class="day">Thursday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Thursday&time=13.00">1pm</a></button></li>
				<li><span class="day">Friday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Friday&time=13.00">1pm</a></button></li>
				<li><span class="day">Saturday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Saturday&time=18.00">6pm</a></button></li>
				<li><span class="day">Sunday</span>
				<button class="time"><a href="bookingpage1.php?film=Cinderella&day=Sunday&time=18.00">6pm</a></button></li>
			</ul>
		</div>

    </div>
                </div>
            </div>
    <script>
             $(function() {
                $( "#dialog-10" ).dialog({
                   autoOpen: false, width: "850px" 
                });
                $( "#opener10" ).click(function() {
                   $( "#dialog-10" ).dialog( "open" );
                });
             });
          </script>
		  <script>
$(document).ready(function(){
    $.post("https://<?php echo $_SERVER['SERVER_NAME']; ?>/~s3545402/wp/a1/json/fastjson.php",
      { 
      },
      function(data) {     
// Parse data as a JSON object        
        var movieObj=JSON.parse(data);
        
// We are now going to build up a HTML string
        var htmlString="";

// movieObj contains 4 movies. Put each movie into a separate <div> with a movie id
        for (movie in movieObj)
        {
          htmlString+="<div id='"+movie+"'>";
          
        //console.log(movieObj[movie].title);
        console.log(movie);
          
// Put the title in a <h3> and poster url in an <img> for each movie          
          htmlString+="<h3>"+movieObj[movie].title+"</h3>";
          htmlString+="<div><img src='"+movieObj[movie].poster+"' alt='poster' /></div>";
		  htmlString+="<div><img src='"+movieObj[movie].rating+"' alt='rating' /></div>";
		  htmlString+="<div><video src='"+movieObj[movie].trailer+"' alt='video' /></div>";

// each movieObj[movie].description contains a number of paragraphs. Put each paragraph into a separate <p>
          for (i in movieObj[movie].description)
          {
            htmlString+="<p>"+movieObj[movie].description[i]+"</p>";
          }
          htmlString+="</div>";
        }
        
// Put htmlString in the second div
        $("#fast7info2").html(htmlString);
        
// 20150518: testing something out for students        
        console.log(movieObj.CH.title);
        console.log(movieObj['CH'].title);
      });
});
</script>
    <div id="dialog-10" title="Fast and Furious 7">
<div id="fast7info2"></div>
 <div class="session">
			<h4>Session Times:</h4>
			<ul>
				<li><span class="day">Wednesday</span>
				<button class="time"><a href="bookingpage1.php?film=Fast7&day=Wednesday&time=21.00">9pm</a></button></li>
				<li><span class="day">Thursday</span>
				<button class="time"><a href="bookingpage1.php?film=Fast7&day=Thursday&time=21.00">9pm</a></button></li>
				<li><span class="day">Friday</span>
				<button class="time"><a href="bookingpage1.php?film=Fast7&day=Friday&time=21.00">9pm</a></button></li>
				<li><span class="day">Saturday</span>
				<button class="time"><a href="bookingpage1.php?film=Fast7&day=Saturday&time=21.00">9pm</a></button></li>
				<li><span class="day">Sunday</span>
				<button class="time"><a href="bookingpage1.php?film=Fast7&day=Sunday&time=21.00">9pm</a></button></li>
			</ul>
		</div>
            </div>	

            </div>
          
        


    
        <footer class="mainFooter">
            <p>Copyright &copy; 2015 <a href="#" title=" Silverado Cinema">SilveradoCinema.com </a>  Younes Abdulkarim s3545402 | Mason Qian s3547567
            <a href="http://validator.w3.org/" title=" Validator">Validator  </a></p>
        </footer>

    </body>

    </html>
