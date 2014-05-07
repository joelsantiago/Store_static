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
    <title>Store - Log in</title>
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
  if(!empty($_POST['email']) && !empty($_POST['password']))
  {
	$email = mysql_real_escape_string($_POST['email']);
	$password = md5(mysql_real_escape_string($_POST['password']));
	
	$checklogin = mysql_query("SELECT * FROM Users WHERE EmailAddress = '".$email."' AND User_Password = '".$password."'");
	
	if(mysql_num_rows($checklogin) == 1)
	{
	  $row = mysql_fetch_array($checklogin);
	  
	  $_SESSION['First_Name'] = $row['First_Name'];
	  $_SESSION['Last_Name'] = $row['Last_Name'];
	  $_SESSION['User_Password'] = $row['User_Password'];
	  $_SESSION['EmailAddress'] = $row['EmailAddress'];
	  $_SESSION['Address_Line1'] = $row['Address_Line1'];
	  $_SESSION['Address_Line2'] = $row['Aaddress_Line2'];
	  $_SESSION['City'] = $row['City'];
	  $_SESSION['State'] = $row['City'];
	  $_SESSION['Zip'] = $row['Zip'];
	  $_SESSION['Home_Phone'] = $row['Home_Phone'];
	  $_SESSION['Mobile_Phone'] = $row['Mobile_Phone'];
	  $_SESSION['LoggedIn'] = 1;
	  
	  ?>
	  <div class="cartbuffer">
	  <div class="box">
	  <h1>Success</h1>
	  <p>We will now redirect you to our home page.</p>
	  <meta http-equiv="refresh" content="3; url=index.php">
	  </div>
	  </div>
      <?php
	}
	else
	{
	  ?>
	  <div class="cartbuffer">
	  <div class="box">
	  <h1>Error</h1>
	  <p>Sorry, your account could not be found.  Please <a href="login.php">click here to try again</a>.</p>
	  </div>
	  </div>
      <?php
	}
  }
  
  else {
	?>
	<div class="cartbuffer">
	  <div class="box-noborder">  
		<div class="centered-box"> 
		  <h2>Log In</h2>
			<form method="post" action="login.php" name="loginform" id="loginform">        
			  <div class="row">          	
				<input type="text" class="full" placeholder="Email" name="email">
			  </div>
			
			  <div class="row">
				  <input type="password" class="full" placeholder="Password" name="password">   
			  </div>
              <button type="submit" name="login" class="medium button right expand">Log In</button>
			</form>  
			<a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/account-create.php">New User?</a>
			<a href="#" class="right">Forgot Password?</a>	
		</div>
	  </div>
	</div>
  <?php
  }
  ?>
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
  
  
