<?php
session_start();
require 'dbconfig/config.php';
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) {
	switch ($_GET["action"]) {
		case "add":
			if (!empty($_POST["quantity"])) {
				$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
				$itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"], 'image' => $productByCode[0]["image"]));

				if (!empty($_SESSION["cart_item"])) {
					if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($productByCode[0]["code"] == $k) {
								if (empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;
		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			unset($_SESSION["cart_item"]);
			break;
	}
}
?>

<HTML>

<HEAD>
	<TITLE>Cafe Chimney</TITLE>
	<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

</HEAD>

<BODY>
<nav class="navbar top navbar-expand-lg navbar-dark" style="background-color: black;"  >
  <a class="navbar-brand" href="index.php"><img src="product-images/logo1.png" alt="" style="width: 200px;height:100px;margin-left:30px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="color:white; margin-left:350px;">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" style="margin: 10px;">
        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active" style="margin: 10px;">
        <a class="nav-link" href="about.php">About Us <span class="sr-only"></span></a>
      </li>
      
      <li class="nav-item active" style="margin: 10px;">
        <a class="nav-link" href="order.php?action=empty">Order <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active" style="margin: 10px;">
        <a class="nav-link" href="contact.php">Contact <span class="sr-only"></span></a>
      </li>
    </ul>
    <?php
        if($_SESSION['login'] = true)
        {      

            echo ' <h5 style="font: normal 30px Cookie, cursive;margin-right:20px;">Welcome <span style="color:  #e0ac1c;">' . $_SESSION['username'] . '</span></h5>';
        }
        else
        {
            echo '<form class="form-inline my-2 my-lg-0">
            <a href="login.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit" style="margin: 10px;">Login / Register </button></a>
          </form>';
        }
    ?>
  </div>
</nav>

	<div id="product-grid">
		<div class="txt-heading">Menu</div>
		<?php
		$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
		if (!empty($product_array)) {
			foreach ($product_array as $key => $value) {
		?>
				<div class="product-item">
					<form method="post" action="order.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
						<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
						<div class="product-tile-footer">
							<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
							<div class="product-price"><?php echo "&#x20B9;" . $product_array[$key]["price"]; ?></div>
							<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><button type="submit" class="btnAddAction" name="add_btn">Add to Cart</button></div>
						</div>
					</form>
				</div>
				
		<?php
			}
		}
		?>
	<div id="shopping-cart" style="margin-top: 45%;">
		<div class="txt-heading">Order Cart</div>

		<a id="btnEmpty" href="order.php?action=empty">Empty Cart</a>
		<?php
		if (isset($_SESSION["cart_item"])) {
			$total_quantity = 0;
			$total_price = 0;
		?>
			<table class="tbl-cart" cellpadding="10" cellspacing="1">
				<tbody>
					<tr>
						<th style="text-align:left;">Name</th>
						<th style="text-align:left;">Code</th>
						<th style="text-align:right;" width="5%">Quantity</th>
						<th style="text-align:right;" width="10%">Unit Price</th>
						<th style="text-align:right;" width="10%">Price</th>
						<th style="text-align:center;" width="5%">Remove</th>
					</tr>
					<?php
					foreach ($_SESSION["cart_item"] as $item) {
						$item_price = $item["quantity"] * $item["price"];
					?>
						<tr>
							<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
							<td><?php echo $item["code"]; ?></td>
							<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
							<td style="text-align:right;"><?php echo "&#x20B9; " . $item["price"]; ?></td>
							<td style="text-align:right;"><?php echo "&#x20B9; " . number_format($item_price, 2); ?></td>
							<td style="text-align:center;"><a href="order.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="product-images/icon-delete.png" alt="Remove Item" /></a></td>
						</tr>
					<?php
						$total_quantity += $item["quantity"];
						$total_price += ($item["price"] * $item["quantity"]);
					}
					?>

					<tr>
						<td colspan="2" align="right">Total:</td>
						<td align="right"><?php echo $total_quantity; ?></td>
						<td align="right" colspan="2"><strong><?php echo "&#x20B9 " . number_format($total_price, 2); ?></strong></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		<?php
		} else {
		?>
			<div class="no-records">Your Cart is Empty</div>
		<?php
		}
		?>
	</div>
	<div style="margin:50px;margin-left:35%">
		<form style="width: 50%;"action="order.php" method="post">
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label for="validationDefault01">User name</label>
					<!-- <input type="text" class="form-control" id="validationDefault02" name="uname" value="<?php echo $_SESSION['username'] ?>" required> -->
					<h5 class="form-control"><?php echo $_SESSION['username'] ?></h5>
				</div>
				<div class="col-md-6 mb-3">
					<label for="validationDefault02">Full name</label>
					<input type="text" class="form-control" id="validationDefault02" name="fname" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label for="validationDefault04">City</label>
					<select class="custom-select" id="validationDefault04" name="city" required>
						<option selected disabled value="">Choose...</option>
						<option>Mumbai</option>
					</select>
				</div>
				<div class="col-md-6 mb-3">
					<label for="validationDefault05">Contact No.</label>
					<input type="text" class="form-control" id="validationDefault05" name="number" required>
				</div>
			</div>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
					<label class="form-check-label" for="invalidCheck2">
						Agree to terms and conditions
					</label>
				</div>
			</div>
			<button style="background-color: #e0ac1c;border-color:#e0ac1c;border-radius:3px;width:30%;height:40px;" type="submit" name="submit_btn"><p style="font: bold 30px 'Cookie', cursive;">Place Order</p></button>
			<!-- <button class="btn btn-primary" type="submit" name="submit_btn" style="background-color: #e0ac1c;">Place Order</button> -->
		</form>
		<?php
            if(isset($_POST['submit_btn']))
            {
				$_POST['uname'] = $_SESSION['username'];
				$_POST['price'] = $total_price;
				$_POST['quantity'] = $total_quantity;
				$_POST['list'] = $item["name"];
                $uname = $_POST['uname'];
                $fname = $_POST['fname'];
                $city = $_POST['city'];
				$number = $_POST['number'];
				$price = $_POST['price'];
				$quantity = $_POST['quantity'];
				$list = $_POST['list'];
				$db_handle->insert("insert into order_table values ('','$uname','$fname','$city',$number,'$price','$quantity','$list')");
				if($db_handle){
					echo '<script type="text/javascript">
					window.location = "success.php";
					</script>';
				}
                // $query = "insert into order_table values ('','$uname','$fname','$city',$number)";
                // $query_run = mysqli_query($con,$query);
                // if($query_run){
                //     echo'<script type="text/javascript">alert(Order Placed!")</script>';
                // }
                // else{
                //     echo'<script type="text/javascript">alert(Error!")</script>';
                // }
            }
        ?>
	</div>
	<!-- FOOTER -->
	<footer class="footer-distributed">

<div class="footer-left">
	<h3>Cafe<span>Chimney</span></h3>
	<p class="footer-company-about">
		
		 				
		<p class="footer-links">
		
		<a href="#">| Home |</a>
		<br>					
		<a href="#">| About |</a>
		<br>
		<a href="#">| Menu |</a>
		<br>
		<a href="#">| Order |</a>
	</p>

		<!-- <p class="footer-company-name">© 2019 Eduonix Learning Solutions Pvt. Ltd.</p> -->
</div>

<div class="footer-center">
	<div>
		<i class="fa fa-map-marker"></i>
		  <p>Shop 505, Linking Road, Bandra</p>
	</div>

	<div>
		<i class="fa fa-phone"></i>
		<p>+91 1234567890</p>
	</div>
	<div>
		<i class="fa fa-envelope"></i>
		<p><a href="mailto:support@eduonix.com">contact@cafechimney.com</a></p>
	</div>
</div>
<div class="footer-right">
	<p class="footer-company-about">
		 		 
	<div class="footer-icons">
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-instagram"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href="#"><i class="fa fa-youtube"></i></a>
	</div>
</div>
</footer>

</BODY>

</HTML>