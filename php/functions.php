<?php
function writeUser() {
	if (empty ($_SESSION['LoggedIn']) && empty($_SESSION['First_Name'])) {
		return '<li><a href="login.php">Log In</a></li>';
	} else {
		?>
		<li class="has-dropdown"><a href="#">Hi <?php echo $_SESSION['First_Name']; ?></a>
          <ul class="dropdown">
			<li><a href="logout.php">Log Out</a></li>
          </ul>
        </li>
		<?php
    }
}

function writeShoppingCart() {
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return '<li>0 items</li>';
	} else {
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<li><a href="cart.php">'.count($items).' item'.$s.'</a></li>';
	}
}

if(isset($_POST['continue'])) { 
  loginCheck();
}

function showCart() {
	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM Products WHERE ItemID = '.$id;
			$result = $db->query($sql);
			$row = $result->fetch();
			extract($row);
			$output[] = '<table width="100%">';
			$output[] = '<tr>';
			$output[] = '<td rowspan="3" class="td-pic"><img src="'.$Thumbnail.'"></td>';
			$output[] = '<td colspan="2" align="left"><strong>'.$Manufacturer.' '.$Product.' '.$Choice.' '.'</strong></td>';
			$output[] = '</tr>';
			$output[] = '<tr>'; 			
			$output[] = '<td align="left" class="text-top">List Price:  <strong>&dollar;'.$Price.'</strong></td>';
			$output[] = '<td colspan="2" align="right">Quantity: <input type="text" name="qty'.$id.'" value="'.$qty.'" size="1" maxlength="3"></td>';
			$output[] = '</tr>';
			$output[] = '<tr>';
			$output[] = '<td colspan="2" align="right">Qty. Price: <strong>&dollar;'.($Price * $qty).'</strong></td>';
			$output[] = '</tr>';
			$output[] = '<tr>';
			$output[] = '<td colspan="3" align="right"><a href="cart.php?action=delete&ItemID='.$id.'" class="r"><strong>Remove Item</strong></a></td>';
			$output[] = '</tr>';
			$output[] = '</table>';
			$total += $Price * $qty;
			$output[] = '<hr>';
		}
		$output[] = '<table width="100%">';
		$output[] = '<tr>';
		$output[] = '<td align="right"><button type="submit" class="small button">Update cart</button></td>';
		$output[] = '</tr>';
		$output[] = '<tr><td>&nbsp;</td></tr>';
		$output[] = '<tr>';
		$output[] = '<td align="right" style="padding-bottom: 5px;">Grand total: <b>&dollar;'.$total.'</b></td>';
		$output[] = '</tr>';
		$output[] = '<tr><td colspan="2" align="right">'.loginCheck().'</td></tr>';
		$output[] = '</table>';
		$output[] = '</form>';
	} else {
		$output[] = '<p style="text-align:center">Your shopping cart is empty.</p>';
	}
	return join('',$output);
}

function loginCheck() {
	if (empty ($_SESSION['LoggedIn'])) {
		return '<a href="login.php" class="medium button right">Continue</a>';
	} else {
		return '<a href="payment.php" class="medium button right">Continue</a>';
	}
}

function completeOrder() {
  echo "<h1>Thanks For Your Business</h1>";
  echo "<p>Your order has been processed. We'll redirect you back to our home page now.</p>";
  
  $to      = $_SESSION['EmailAddress'];
  $subject = 'Order Confirmation from Joel Santiago';
  $message = '<table><tr><td><strong>Hi '.$_SESSION['First_Name'].',</strong></td></tr><tr><td>This message was sent to you from my Store Website.  I really appreciate you taking a look at my site and running all the way through it.  Please feel free to reply to me if you have any questions about the site.</td></tr><tr><td align="right">Have a great day,</td></tr><tr><td align="right">Joel Santiago</td></tr></table>';

'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $headers = 'From: joel.santiago1@gmail.com'."\r\n".'MIME-Version: 1.0'."\r\n".'Content-Type: text/html'."\r\n";

  mail($to, $subject, $message, $headers);
   
  echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php\">";
  
  unset($_SESSION['cart']);
}

function addOrder() {
	mysql_query("INSERT INTO Orders (User_Password, EmailAddress) VALUES ('".$_SESSION['User_Password']."','".$_SESSION['EmailAddress']."')");	
}

function showCheckout() {
	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="checkout.php" method="post" id="cart">';
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM Products WHERE ItemID = '.$id;
			$result = $db->query($sql);
			$row = $result->fetch();
			extract($row);
			$output[] = '<table width="100%">';
			$output[] = '<tr>';
			$output[] = '<td rowspan="3" class="td-pic"><img src="'.$Thumbnail.'"></td>';
			$output[] = '<td colspan="2" align="left"><strong>'.$Manufacturer.' '.$Product.' '.$Choice.' '.'</strong></td>';
			$output[] = '</tr>';
			$output[] = '<tr>'; 			
			$output[] = '<td align="left">List Price:  <strong>&dollar;'.$Price.'</strong></td>';
			$output[] = '<td colspan="2" align="right">Quantity: '.$qty.'</td>';
			$output[] = '</tr>';
			$output[] = '<tr>';
			$output[] = '<td colspan="3" class="text-top" align="right">Qty. Price: <strong>&dollar;'.($Price * $qty).'</strong></td>';
			$output[] = '</tr>';
			$output[] = '<tr>';
			$output[] = '</tr>';
			$output[] = '</table>';
			$total += $Price * $qty;
			$_SESSION['total'] = $total;
			$output[] = '<hr>';
		}
		$output[] = '<table width="100%">';
		$output[] = '<tr>';
		$output[] = '<td align="right">Grand total: <b>&dollar;'.$total.'</b></td>';
		$output[] = '</tr>';
		$output[] = '<td align="right"><a href="complete.php" class="medium button right top">Checkout</a></td>';
		$output[] = '</table>';
		$output[] = '</form>';
		$date = date('Y-m-d H:i:s');
		$_SESSION['Date'] = $date;
		mysql_query("INSERT INTO Orders (Date, First_Name, Last_Name, Address_Line1, City, State, Zip, EmailAddress, Card_Type, Card_Number, Card_ExpDate, Card_SecCode, Cardholder_Address, Cardholder_City, Cardholder_State, Cardholder_Zip, Product_Vector, Order_Total, DeliveryMethod) VALUES ('".$_SESSION['Date']."','".$_SESSION['First_Name']."','".$_SESSION['Last_Name']."','".$_SESSION['Address_Line1']."','".$_SESSION['City']."','".$_SESSION['State']."','".$_SESSION['Zip']."','".$_SESSION['EmailAddress']."','".$_SESSION['Card_Type']."','".$_SESSION['Card_Number']."','".$_SESSION['Card_ExpDate']."','".$_SESSION['Card_SecCode']."','".$_SESSION['Cardholder_Address']."','".$_SESSION['Cardholder_City']."','".$_SESSION['Cardholder_State']."','".$_SESSION['Cardholder_Zip']."','".$_SESSION['cart']."','".$_SESSION['total']."','".$_SESSION['Delivery']."')");
	} else {
		$output[] = '<p style="text-align:center">Your shopping cart is empty.</p>';
	}
	return join('',$output);
}

function UserInfo() {
	$sql = mysql_query("SELECT * FROM Users WHERE (EmailAddress = '".$_SESSION['EmailAddress']."') AND (User_Password = '".$_SESSION['User_Password']."')");
	$row = mysql_fetch_array($sql);
	extract(row);
	
	echo "<table width=\"60%\">";
	echo "<tr>";
	echo "<td colspan=\"3\"><u><strong>Shipping Address</strong></u></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan=\"3\">".$row['First_Name']." ".$row['Last_Name']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan=\"3\">".$row['Address_Line1']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>".$row['City']."</td>";
	echo "<td>".$row['State']."</td>";
	echo "<td>".$row['Zip']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan=\"3\">".$row['Home_Phone']."</td>";
	echo "</tr>";
	echo "</table>";
}

function BillingInfo() {
	$sql = mysql_query("SELECT * FROM Users WHERE (EmailAddress = '".$_SESSION['EmailAddress']."') AND (User_Password = '".$_SESSION['User_Password']."')");
	$row = mysql_fetch_array($sql);
	extract(row);
	
	echo "<div class=\"row\">";
	echo "<div class=\"large-6 columns\">";
	echo "<table width=\"100%\">";
	echo "<tr><th colspan=\"5\" align=\"left\"><u>Billing Info</u></th></tr>";
	echo "<tr>";
	echo "<td colspan=\"1\">Cardholder:</td>";
	echo "<td colspan=\"4\">".$row['Cardholder_Name']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan=\"1\">Card Type:";
	echo "<td colspan=\"4\">".$row['Card_Type']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan=\"1\">Card #:";
	echo "<td colspan=\"4\">".$row['Card_Number']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan=\"1\">Sec. Code:</td>";
	echo "<td colspan=\"4\">".$row['Card_SecCode']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan=\"1\">Exp. Date:</td>";
	echo "<td colspan=\"4\">".$row['Card_ExpDate']."</td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
	echo "<div class=\"large-6 columns right\">";
	echo "<table width=\"100%\">";
	echo "<tr><th colspan=\"3\" align=\"left\"><u>Billing Address</u></th></tr>";
	echo "<tr><td colspan=\"3\">".$row['Cardholder_Address']."</td></tr>";
	echo "<tr>";
	echo "<td>".$row['Cardholder_City']."</td>";
	echo "<td>".$row['Cardholder_State']."</td>";
	echo "<td>".$row['Cardholder_Zip']."</td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
	echo "</div>";
}

?>
