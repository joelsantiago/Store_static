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
    <title>Store - User Info</title>
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
  
  <!-- Begin User Info Form -->
  <?php
  if(!empty($_POST['email']) && !empty($_POST['password']))
  {
	  $firstname = mysql_real_escape_string($_POST['firstname']);
	  $lastname = mysql_real_escape_string($_POST['lastname']);
	  $password = md5(mysql_real_escape_string($_POST['password']));
	  $email = mysql_real_escape_string($_POST['email']);
	  $address1 = mysql_real_escape_string($_POST['address1']);
	  $address2 = mysql_real_escape_string($_POST['address2']);
	  $city = mysql_real_escape_string($_POST['city']);
	  $state = mysql_real_escape_string($_POST['state']);
	  $zip = mysql_real_escape_string($_POST['zip']);
	  $home_phone = mysql_real_escape_string($_POST['home_phone']);
	  $mobile_phone = mysql_real_escape_string($_POST['mobile_phone']);	

	  $checkemail = mysql_query("SELECT * FROM Users WHERE EmailAddress = '".$email."'");
	  
	  if(mysql_num_rows($checkemail) == 1)
	  {
		echo "<div class=\"cartbuffer\">";
		echo "<div class=\"box\">";  
		echo "<h1>Error</h1>";
		echo "<p>Sorry, that email is taken. Please go back and try again.</p>";
		echo "</div>";
		echo "</div>";
	  }
	  else
	  {
		$registerquery = mysql_query("INSERT INTO Users (First_Name, Last_Name, User_Password, EmailAddress, Address_Line1, Address_Line2, City, State, Zip, Home_Phone, Mobile_Phone) VALUES ('".$firstname."','".$lastname."','".$password."', '".$email."','".$address1."','".$address2."','".$city."','".$state."','".$zip."','".$home_phone."','".$mobile_phone."')");
		if($registerquery)
		{
		  echo "<div class=\"cartbuffer\">";
		  echo "<div class=\"box\">";
		  echo "<h1>Success</h1>";
		  echo "<p>Your account was successfully created. Please <a href=\"login.php\">click here to login</a>.</p>";
		  echo "</div>";
		  echo "</div>";
		}
		else
		{
		  echo "<div class=\"cartbuffer\">";
		  echo "<div class=\"box\">";
		  echo "<h1>Error</h1>";
		  echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
		  echo "</div>";
		  echo "</div>";
		}    	
	  }
  }
  else
  {
	  ?>
  <div class="cartbuffer">
    <div class="box">
    
      <div class="columns">
        <h3>User Registration</h3>
        <sub>* Required Fields</sub>
      </div>
    <form class="custom" method="post" action="account-create.php" name="registerform">
      <fieldset>
        <legend>User Info</legend>
          <div class="row">
            <div class="large-6 columns">
              <label for="firstname">First Name *</label>
              <input type="text" class="full" placeholder="First Name" name="firstname">
            </div>
          
            <div class="large-6 columns">
              <label for="lastname">Last Name *</label>
              <input type="text" class="full radius" placeholder="Last Name" name="lastname">
            </div>
          </div>
          
          <div class="row">
            <div class="large-8 columns">
              <label for="email">Email Address *</label>
              <input type="text" class="full" placeholder="Email Address" name="email">
            </div>      
          </div>
          
          <div class="row">
            <div class="large-6 columns">
              <label for="password">Password *</label>
              <input type="password" class="full" placeholder="Password" name="password">
            </div>
          
            <div class="large-6 columns">
              <label>Confirm Password *</label>
              <input type="password" class="full radius" placeholder="Confirm Password" name="password2">
            </div>
          </div>      
  
          <div class="row">
            <div class="large-12 columns">
              <label>Address Line 1 *</label>
              <input type="text" class="full" placeholder="Address Line 1" name="address1">
            </div>      
          </div>
          
          <div class="row">
            <div class="large-12 columns">  
              <label>Address Line 2</label>
              <input type="text" class="full" placeholder="Address Line 2" name="address2">
            </div>
          </div>
          
          <div class="row">
            <div class="large-4 columns">
              <label>City *</label>
              <input type="text" class="full" placeholder="City" name="city">
            </div>
            
            <div class="large-4 columns">
              <label>State *</label>
              <input type="text" class="full" placeholder="State" name="state">           
            </div>
            
            <div class="large-4 columns">
              <label>Zip Code *</label>
              <input type="text" class="full" placeholder="Zip Code" name="zip">
            </div>
          </div>
          
          <div class="row">
            <div class="large-6 columns">
              <label>Home Phone</label>
              <input type="text" class="full" placeholder="Home Phone" name="home_phone">
            </div>
          
            <div class="large-6 columns">
              <label>Mobile Phone</label>
              <input type="text" class="full" placeholder="Mobile Phone" name="mobile_phone">
            </div>
          </div>
          
          <div class="row">
            <div class="large-6 columns">
              <label for="addtoBilling"><input type="checkbox" id="addtoBilling" style="display: none;"><span class="custom checkbox"></span> Use this address for my Billing Information</label>     
            </div>
          </div>     
      </fieldset>
      <div class="row">
        <button type="submit" name="register" class="medium button right">Register</button>
        <!--<a href="#" class="medium button right">Create Account</a>-->
      </div>
    </form>
    </div>
  </div>
   <?php
  }
  ?>
  
  <div class="bottom-buffer"></div>
  
  <!-- End User Info Form -->
  
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
  
  
