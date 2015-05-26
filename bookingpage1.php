<?php
session_start();
$userName = "";
$nameOfMovie = "";
$quantity = "";
$typeOfSeat = "";

if(isset($_POST['user']) && !empty($_POST['user'])){
	$userName = htmlspecialchars(trim($_POST['user']));
}
if(isset($_POST['nameOfMovie']) && !empty($_POST['nameOfMovie'])){
$nameOfMovie = $_POST['nameOfMovie'];
}
if(isset($_POST['typeOfSeat']) && !empty($_POST['typeOfSeat'])){
$typeOfSeat = $_POST['typeOfSeat'];
}
if(isset($_POST['quantity']) && !empty($_POST['quantity'])){
$quantity = $_POST['quantity'];
}
if(strlen($userName)){
	
	$_SESSION['cart'];

	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array("name" => "",
								  "email" => "",
								  "phone" => "");
		
		$_SESSION['cart'][$nameOfMovie]['ticketType'] = $typeOfSeat;
		$_SESSION['cart'][$nameOfMovie]['ticketType']['numberOfSeats'] = $quantity;
		
		if($_POST['add'])
		{
			$_SESSION['cart'][$nameOfMovie]['ticketType']['numberOfSeats']++;
		}
		else if($_POST['minus'])
		{
			if($_SESSION['cart'][$nameOfMovie]['ticketType']['numberOfSeats']>0)
			$_SESSION['cart'][$nameOfMovie]['ticketType']['numberOfSeats']--;
		
		if($_SESSION['cart'][$nameOfMovie]['ticketType']['numberOfSeats']==0)
		{
			unset($_SESSION['cart'][$nameOfMovie]['ticketType']);
		}
		}
		$_SESSION['cart']['totalcost'] = $typeOfSeatCost * $quantity;
		$_SESSION['cart']['name']= $userName;
	}
} else {
	echo "bad";
}

var_dump($_SESSION);


    function filmname($nameOfMovie) {
        $text = ucfirst($nameOfMovie);
		if ($_GET["film"] == "Home") echo "<input type='hidden' name='{$nameOfMovie}' value='Home' />";
		if ($_GET["film"] == "Cinderella") echo "<input type='hidden' name='{$nameOfMovie}' value='Cinderella' />";
		if ($_GET["film"] == "OldBoys") echo "<input type='hidden' name='{$nameOfMovie}' value='OldBoys' />";
		if ($_GET["film"] == "Fast7") echo "<input type='hidden' name='{$nameOfMovie}' value='Fast7' />";
    }
	function dayname($name) {
        $text = ucfirst($name);
		if ($_GET["day"] == "Monday") echo "<input type='hidden' name='{$name}' value='Monday' />";
		if ($_GET["day"] == "Tuesday") echo "<input type='hidden' name='{$name}' value='Tuesday' />";
		if ($_GET["day"] == "Wednesday") echo "<input type='hidden' name='{$name}' value='Wednesday' />";
		if ($_GET["day"] == "Thursday") echo "<input type='hidden' name='{$name}' value='Thursday' />";
		if ($_GET["day"] == "Friday") echo "<input type='hidden' name='{$name}' value='Friday' />";
		if ($_GET["day"] == "Saturday") echo "<input type='hidden' name='{$name}' value='Saturday' />";
		if ($_GET["day"] == "Sunday") echo "<input type='hidden' name='{$name}' value='Sunday' />";
    }
	function timename($name) {
        $text = ucfirst($name);
		if ($_GET["time"] == "12.00") echo "<input type='hidden' name='{$name}' value='12.00' />";
		if ($_GET["time"] == "13.00") echo "<input type='hidden' name='{$name}' value='13.00' />";
		if ($_GET["time"] == "15.00") echo "<input type='hidden' name='{$name}' value='15.00' />";
		if ($_GET["time"] == "18:00") echo "<input type='hidden' name='{$name}' value='18.00' />";
		if ($_GET["time"] == "21.00") echo "<input type='hidden' name='{$name}' value='21.00' />";
    }


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
	
	<title>Booking Page</title>
	<meta charset="utf-8" />
	 <script src="bjqs-1.3.js"></script>
   <script src="jquery-1.11.2.js"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="jquery-ui.css" />
	 <script src="jquery-ui.js"></script>
	<meta name= "viewport" content="width=device-width, initial-scale=1.0">

		<script>
			$(document).ready(function() {
				var priceList = {
					disc: {
						Adult: 12,
						Con: 10,
						Child: 8,
						FAdult: 25,
						FChild: 20,
						Beanbag: 25,
					}, 
					full: {
						Adult: 18,
						Con: 15,
						Child: 12,
						FAdult: 30,
						FChild: 25,
						Beanbag: 30,
					} 
				};
				
				function smartOnPriceChange(day, time){
					console.log('Day is: ' + day + ', time is: ' + time);
					list = priceList.full;
					if((day === 'Monday' | 'Tuesday') || time == '13.00'){
						list = priceList.disc;
					}
					$.each(list, function(key, value) {
						console.log( "The key is '" + key + "' and the value is '" + value + "'" );
						$('#price' + key + 'Input').val(value);
						$('#price' + key ).html(value.toFixed(2));
					});
				}
			
				function smartUpdateTotalPrice(){
					var total = 0;
					$('input.subtotal').each(function(){
						 total += parseInt($(this).val()) || 0;
					});
					$('#priceInput').val(total);
					$('#price').html('$' + total.toFixed(2));
					console.log('SMART TOTAL:' + total);
				}
				
				
				$('.qty').change(function() {
					console.log('qty changed');
					var qty = $(this).val();
					var tr = $(this).closest('tr');
					var price = tr.find('.price').val();
					console.log('qty: ' + qty + ', ticket price: ' + price);
					var subtotal = (price * qty);
					tr.find('input.subtotal').val(subtotal);
					tr.find('span.subtotal').html(subtotal.toFixed(2));
					smartUpdateTotalPrice();
				});
				smartOnPriceChange('<?php echo $_GET["day"];?>', '<?php echo $_GET["time"];?>');
			});	
			
		</script>
		
	</head>

	<body>
	
	<form method="post" name="cart" action="shopping-cart.php">
		
		<section class="screening1Info">
		
			<article class="screeningInfo">
			
			<h2>Booking Summary</h2>
			<div class="screening1Info">
				<table>
					<tr>
						<td>Film:</td>
						<td>
							<?php echo $_GET["film"]; filmname('film');?>  	</td>
					</tr>			
					<tr>
						<td>
							Day:
						</td>				
						<td>
							<?php echo $_GET["day"]; dayname('day');?>						</td>
					</tr>			
					<tr>
						<td>Time:</td>
						<td>
							<?php echo $_GET["time"]; timename('time');?>						</td>
					</tr>
					
					<tr>
						<td>
							 Price
						</td>
						<td>
							<input type="hidden" id="priceInput" name="price" />
							<span id="price" name="totalcost"></span>
						</td>
					</tr>
					<tr>
				<td>
							</td>
					</tr>
				</table>	
				<button href = "cart.php"></button>
				<input type="submit" class="btn" value="Reserve Tickets"/>
			</div>
		</section>
		
		<section class="ticketselection">
		
			<h2>Ticket Selection</h2>
			<div>
				<table>
					<thead>
						<th>
							Ticket Type
						</th>
						<th>
							Price
						<th>
							Quantity
						</th>
						<th>
							Subtotal Price
						</th>
					</thead>
					<tbody>
						<tr>
							<td>
								Adult
							</td>
							<td>
								<input type="hidden" id="priceAdultInput" class="price" />
								$<span id="priceAdult"></span>
							</td>
							<td>
								<input type="number" id="qtyAdult" class="qty" value="0" min="0" max="8" name="SA" />
							</td>
							<td>
								<input type="hidden" id="subtotalAdultInput" class="subtotal" />
								$<span id="subtotalAdult" class="subtotal">0.00</span>
							</td>
						</tr>
						<tr>
							<td>
								Concession
							</td>
							<td>
								<input type="hidden" id="priceConInput" class="price" />
								$<span id="priceCon"></span>
							</td>
							<td>
								<input type="number" id="qtyCon" class="qty" value="0" min="0" max="8" name="SP" />
							</td>
							<td>
								<input type="hidden" id="subtotalConInput" class="subtotal" />
								$<span id="subtotalCon" class="subtotal">0.00</span>
							</td>
						</tr>
						<tr>
							<td>
								Child
							</td>
							<td>
								<input type="hidden" id="priceChildInput" class="price" />
								$<span id="priceChild"></span>
							</td>
							<td>
								<input type="number" id="qtyChild" class="qty" value="0" min="0" max="8" name="SC" />
							</td>
							<td>
								<input type="hidden" id="subtotalChildInput" class="subtotal" />
								$<span id="subtotalChild" class="subtotal">0.00</span>
							</td>
						</tr>
						<tr>
							<td>
								First Class Adult
							</td>
							<td>
								<input type="hidden" id="priceFAdultInput" class="price" />
								$<span id="priceFAdult"></span>
							</td>
							<td>
								<input type="number" id="qtyFAdult" class="qty" value="0" min="0" max="8" name="FA" />
							</td>
							<td>
								<input type="hidden" id="subtotalFAdultInput" class="subtotal" />
								$<span id="subtotalFAdult" class="subtotal">0.00</span>
							</td>
						</tr>
						<tr>
							<td>
								First Class Child
							</td>
							<td>
								<input type="hidden" id="priceFChildInput" class="price" />
								$<span id="priceFChild"></span>
							</td>
							<td>
								<input type="number" id="qtyFChild" class="qty" value="0" min="0" max="8" name="FC" />
							</td>
							<td>
								<input type="hidden" id="subtotalFChildInput" class="subtotal" />
								$<span id="subtotalFChild" class="subtotal">0.00</span>
							</td>
						</tr>
						<tr>
							<td>
								Beanbag
							</td>
							<td>
								<input type="hidden" id="priceBeanbagInput" class="price" />
								$<span id="priceBeanbag"></span>
							</td>
							<td>
								<input type="number" id="qtyBeanbag" class="qty" value="0" min="0" max="8" name="B1" />
							</td>
							<td>
								<input type="hidden" id="subtotalBeanbagInput" class="subtotal" />
								$<span id="subtotalBeanbag" class="subtotal">0.00</span>
							</td>
						</tr>
					</tbody>
					</article>
				</table>
			</div>
			
			</section>
		
		</form>
	</body>
	
			
	<?php include('include/footer.php');?>

</body>

</html>
