<?php
require_once('php/mysql.php');
require_once('php/global.php');
require_once('php/functions.php');
session_start();

$cart = $_SESSION['cart'];
$action = $_GET['action'];
switch ($action) {
  case 'add':
    if ($cart) {
      $cart .= ','.$_GET['ItemID'];
    } else {
      $cart = $_GET['ItemID'];
    }
    break;
  case 'delete':
    if ($cart) {
      $items = explode(',',$cart);
      $newcart = '';
      foreach ($items as $item) {
        if ($_GET['ItemID'] != $item) {
          if ($newcart != '') {
            $newcart .= ','.$item;
          } else {
            $newcart = $item;
          }
        }
      }
      $cart = $newcart;
    }
    break;
  case 'update':
  if ($cart) {
    $newcart = '';
    foreach ($_POST as $key=>$value) {
      if (stristr($key,'qty')) {
        $id = str_replace('qty','',$key);
        $items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
        $newcart = '';
        foreach ($items as $item) {
          if ($id != $item) {
            if ($newcart != '') {
              $newcart .= ','.$item;
            } else {
              $newcart = $item;
            }
          }
        }
        for ($i=1;$i<=$value;$i++) {
          if ($newcart != '') {
            $newcart .= ','.$id;
          } else {
            $newcart = $id;
          }
        }
      }
    }
  }
  $cart = $newcart;
  break;
}
$_SESSION['cart'] = $cart;
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/checkout.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8" />
    <!-- InstanceBeginEditable name="Page Title" -->
    <title>Store - Shipping & Billing</title>
    <!-- InstanceEndEditable -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
    
<body>
  <div class="fixed">
    <nav class="top-bar">
      
      
      <ul class="title-area">
        <li class="name">
          <h1>
            <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/">Store</a>
          </h1>
        </li>
      </ul>
      
   
      <section class="top-bar-section">
  
        <ul class="right">
          <li class="divider"></li>
          <li class="has-dropdown">
            <a href="#">Products</a>
            <ul class="dropdown">
              <li class="has-dropdown">
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/automotive.php">Automotive</a>
                <ul class="dropdown">
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item001.php">ARB Air Compressor</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item003.php">ARB Recovery Strap</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item006.php">BF Goodrich KM2</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item009.php">Kenwood In-Dash Navigation</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item010.php">Yaesu Ham Radio</a></li>
                </ul>
              </li>
              <li class="has-dropdown">
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/cycling.php">Cycling</a>
                <ul class="dropdown">
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item011.php">Crank Bros. Mallet</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item012.php">Five Ten Impact</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item013.php">Fox 32 Talas Fork</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item014.php">Maxxis High Roller</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item017.php">SRAM X0 Derailleur</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item018.php">Thule T2</a></li>
                </ul>
              </li>
              <li class="has-dropdown">
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/electronics.php">Electronics</a>
                <ul class="dropdown">
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item020.php">Apple MacBook Air</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item022.php">Canon EOS 5D MKIII</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item023.php">GoPro Hero 3 Black</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item024.php">GoPro Hero 3 Silver</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item025.php">GoPro Hero 3 White</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item026.php">HiFi Man HE-400</a></li>
                </ul>
              </li>
              <li class="has-dropdown">
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/movies.php">Movies</a>
                <ul class="dropdown">
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item027.php">Apocalypse Now</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item028.php">Blade Runner</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item029.php">Serenity</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item030.php">Shaun of the Dead</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item031.php">Tarantino XX</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item032.php">The Big Lebowski</a></li>
                </ul>
              </li>
              <li class="has-dropdown">
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/tools.php">Tools</a>
                <ul class="dropdown">
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item033.php">Bosch Power Drill</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item034.php">DeWalt Metal Shears</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item035.php">DeWalt Angle Grinder</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item036.php">Fluke Multimeter</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item037.php">Hobart Mig Welder</a></li>
                  <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item038.php">Hobart Plasma Cutter</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="divider"></li>
          <?php echo writeUser(); ?>
          <li class="divider"></li>
          <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/cart.php">
          <?php
            echo writeShoppingCart();
          ?>
          </a></li>
        </ul>
      </section>
    </nav>
  </div>  
  <!-- End Top Bar -->

  <!-- InstanceBeginEditable name="Body" -->
   <?php
  if(!empty($_POST['cardname']) && !empty($_POST['cardnumber']) && !empty($_POST['sec_code']) && !empty($_POST['exp_date']))
  {
	$cardname = mysql_real_escape_string($_POST['cardname']);
	$cardnumber = mysql_real_escape_string($_POST['cardnumber']);
	$sec_code = mysql_real_escape_string($_POST['sec_code']);
	$exp_date = mysql_real_escape_string($_POST['exp_date']);
	$cardtype = mysql_real_escape_string($_POST['cardtype']);
	$cardaddress = mysql_real_escape_string($_POST['cardaddress']);
	$cardcity = mysql_real_escape_string($_POST['cardcity']);
	$cardstate = mysql_real_escape_string($_POST['cardstate']);
	$cardzip = mysql_real_escape_string($_POST['cardzip']);
	$delivery = mysql_real_escape_string($_POST['delivery']);
	
	$_SESSION['Card_Type'] = $cardtype;
	$_SESSION['Card_Number'] = $cardnumber;
	$_SESSION['Card_ExpDate'] = $exp_date;
	$_SESSION['Card_SecCode'] = $sec_code;
	$_SESSION['Cardholder_Address'] = $cardaddress;
	$_SESSION['Cardholder_City'] = $cardcity;
	$_SESSION['Cardholder_State'] = $cardstate;
	$_SESSION['Cardholder_Zip'] = $cardzip;
	$_SESSION['Delivery'] = $delivery;
	

	$email = $_SESSION['EmailAddress'];	
	$password = $_SESSION['User_Password'];
	
	$billingquery=mysql_query("UPDATE Users SET Cardholder_Name = '".$cardname."' , Card_Number = '".$cardnumber."' , Card_SecCode = '".$sec_code."' , Card_ExpDate = '".$exp_date."' , Card_Type = '".$cardtype."' , Cardholder_Address = '".$cardaddress."' , Cardholder_City = '".$cardcity."' , Cardholder_State = '".$cardstate."' , Cardholder_Zip = '".$cardzip."' WHERE (EmailAddress = '".$email."') AND (User_Password = '".$password."') ");
	
	if($billingquery) {
	  ?>
        <meta http-equiv="refresh" content="0; url=checkout.php">
	  <?php
	}
	else {
      echo "<div class=\"cartbuffer\">";
	  echo "<div class=\"box\">";
	  echo "<h1>Error</h1>";
	  echo "<p>Sorry, your billing registration failed. Please go back and try again.</p>";    
	  echo "</div>";
	  echo "</div>";
	}
  }
  else
  {
  ?>
  <div class="cartbuffer">
    <div class="box">
    
    <form class="custom" method="post" action="payment.php" name="billingform">
      <div class="columns">
        <h3>Payment Info</h3>
      </div>
      
      <fieldset>
        <legend>Shipping Info</legend>
          <div class="row">
            <div class="large-6 columns">
              <?php 
			  	echo UserInfo();
			  ?>
			</div>
			
          <div class="large-6 columns right">
            <strong><u>Shipping Options</u></strong>         
              <label for="radio1"><input name="delivery" type="radio" id="delivery" value="Next Day Shipping - $14.99"> Next Day Shipping - $14.99</label>
              <label for="radio1"><input name="delivery" type="radio" id="delivery" value="2 Day Shipping - $9.99"> 2 Day Shipping - $9.99</label>
              <label for="radio1"><input name="delivery" type="radio" id="delivery" value="3 Day Shipping - $4.99"> 3 Day Shipping - $4.99</label>
              <label for="radio1"><input name="delivery" type="radio" id="delivery" value="Standard Shipping - $2.99"> Standard Shipping - $2.99</label>
            </div>
          </div>
          
          <div class="row top-padded">
            <div class="large-6 columns">
              <label for="addtoBilling"><input type="checkbox" name="addtoBilling" id="addtoBilling"> Use this address for my Billing Information</label>     
            </div>
          </div> 
      </fieldset>
      
      <fieldset>
        <legend>Billing Info</legend>
          <div class="row">
            <div class="large-6 columns">
              <label>Cardholder Name</label>
              <input type="text" class="full" name="cardname" placeholder="Cardholder Name">
            </div>
          </div>   
  
          <div class="row">
            <div class="large-6 columns">
              <label>Card Number</label>
              <input type="text" class="full" name="cardnumber" placeholder="Card Number">   
            </div>
            
            <div class="large-2 columns">
              <label>Security Code</label>
              <input type="text" class="full" name="sec_code" placeholder="Security Code">   
            </div>
          </div>
           
          <div class="row">
            <div class="large-4 columns">
              <label>Expiration Date</label>
              <input type="text" class="full" name="exp_date" placeholder="mm / dd / yy">   
            </div>
          </div>
            
          <div class="row">
            <div class="large-12 columns">
              <ul class="inline-list">
                <li>
                  <label for="radio1" class="inline">
                    <input name="cardtype" type="radio" id="cardtype" value="Visa"> <img src="img/cards/visa.gif">
                  </label>
                </li>                    
                <li>
                  <label for="radio2" class="inline">
                    <input name="cardtype" type="radio" id="cardtype" value="American Express"> <img src="img/cards/amex.gif">
                  </label>
                </li>
                <li>
                  <label for="radio3" class="inline">
                    <input name="cardtype" type="radio" id="cardtype" value="MasterCard"> <img src="img/cards/mastercard.gif">
                  </label>
                </li>
                <li>
                  <label for="radio2" class="inline">
                    <input name="cardtype" type="radio" id="cardtype" value="Discover"> <img src="img/cards/discover.gif">
                  </label>
                </li>
              </ul>
            </div>        
          </div>
          
          <div class="row">
            <div class="large-12 columns">  
              <label>Cardholder Address</label>
              <input type="text" class="full" name="cardaddress" placeholder="Cardholder Address">
            </div>
          </div>
          
          <div class="row">
            <div class="large-4 columns">
              <label>City</label>
              <input type="text" class="full" name="cardcity" placeholder="City">
            </div>
            
            <div class="large-4 columns">
              <label>State</label>
              <input type="text" class="full" name="cardstate" placeholder="State">           
            </div>
            
            <div class="large-4 columns">
              <label>Zip Code</label>
              <input type="text" class="full" name="cardzip" placeholder="Zip Code">
            </div>
          </div>
      </fieldset>
      <div class="row">
      	<button type="submit" name="billing" class="medium button right">Continue</button>
      </div>
    </form>
    </div>
  </div>
  <?php
  }
  ?>
  
  <div class="bottom-buffer"></div>
  <!-- InstanceEndEditable -->  
  
  <!-- Footer -->
  <div class="fixed-footer">
  <footer class="row">
    <div class="large-12 columns"><hr style="margin-top: 1px;"/>
      <div class="row">

        <div class="large-4 columns">
          <p>This site is managed by <a href="mailto:joel.santiago1@gmail.com?Subject=RE:%20Subject%20goes%20here">Joel Santiago</a></p>
        </div>

        <div class="large-8 columns">
          <ul class="inline-list right">
            <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/">Home</a></li>
            <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/automotive.php">Automotive</a></li>
            <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/cycling.php">Cycling</a></li>
            <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/electronics.php">Electronics</a></li>
            <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/movies.php">Movies</a></li>
            <li><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/tools.php">Tools</a></li>
          </ul>
        </div>

      </div>
    </div>
    </footer>
    </div>
    <!-- End Footer -->
  
</body>
<!-- InstanceEnd --></html>      
  
  
