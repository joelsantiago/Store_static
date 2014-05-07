<?php
require_once('php/mysql.php');
require_once('php/functions.php');
require_once('php/global.php');
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
<html lang="en"><!-- InstanceBegin template="/Templates/index.dwt.php" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="utf-8" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Store - Main</title>
    <!-- InstanceEndEditable -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
	<meta name="viewport" content="width=device-width">
  </head>

<body>

<!-- Navigation -->
  <div class="fixed barbuffer">
  <nav class="top-bar">
    <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <h1>
          <a href="http://joelsantiago.co/store/">Store</a>
        </h1>
      </li>
    </ul>

    <section class="top-bar-section">

      <!-- Right Nav Section -->
      <ul class="right">
        <li class="divider"></li>
        <li class="has-dropdown">
          <a href="#">Products</a>
          <ul class="dropdown">
            <li class="has-dropdown">
              <a href="http://joelsantiago.co/store/automotive.php">Automotive</a>
              <ul class="dropdown">
              	<li><a href="http://joelsantiago.co/store/item001.php">ARB Air Compressor</a></li>
                <li><a href="http://joelsantiago.co/store/item003.php">ARB Recovery Strap</a></li>
                <li><a href="http://joelsantiago.co/store/item006.php">BF Goodrich KM2</a></li>
                <li><a href="http://joelsantiago.co/store/item009.php">Kenwood In-Dash Navigation</a></li>
                <li><a href="http://joelsantiago.co/store/item010.php">Yaesu Ham Radio</a></li>
              </ul>
            </li>
            <li class="has-dropdown">
              <a href="http://joelsantiago.co/store/cycling.php">Cycling</a>
              <ul class="dropdown">
                <li><a href="http://joelsantiago.co/store/item011.php">Crank Bros. Mallet</a></li>
                <li><a href="http://joelsantiago.co/store/item012.php">Five Ten Impact</a></li>
                <li><a href="http://joelsantiago.co/store/item013.php">Fox 32 Talas Fork</a></li>
                <li><a href="http://joelsantiago.co/store/item014.php">Maxxis High Roller</a></li>
                <li><a href="http://joelsantiago.co/store/item017.php">SRAM X0 Derailleur</a></li>
                <li><a href="http://joelsantiago.co/store/item018.php">Thule T2</a></li>
              </ul>
            </li>
            <li class="has-dropdown">
              <a href="http://joelsantiago.co/store/electronics.php">Electronics</a>
              <ul class="dropdown">
                <li><a href="http://joelsantiago.co/store/item020.php">Apple MacBook Air</a></li>
                <li><a href="http://joelsantiago.co/store/item022.php">Canon EOS 5D MKIII</a></li>
                <li><a href="http://joelsantiago.co/store/item023.php">GoPro Hero 3 Black</a></li>
                <li><a href="http://joelsantiago.co/store/item024.php">GoPro Hero 3 Silver</a></li>
                <li><a href="http://joelsantiago.co/store/item025.php">GoPro Hero 3 White</a></li>
                <li><a href="http://joelsantiago.co/store/item026.php">HiFi Man HE-400</a></li>
              </ul>
            </li>
            <li class="has-dropdown">
              <a href="http://joelsantiago.co/store/movies.php">Movies</a>
              <ul class="dropdown">
                <li><a href="http://joelsantiago.co/store/item027.php">Apocalypse Now</a></li>
                <li><a href="http://joelsantiago.co/store/item028.php">Blade Runner</a></li>
                <li><a href="http://joelsantiago.co/store/item029.php">Serenity</a></li>
                <li><a href="http://joelsantiago.co/store/item030.php">Shaun of the Dead</a></li>
                <li><a href="http://joelsantiago.co/store/item031.php">Tarantino XX</a></li>
                <li><a href="http://joelsantiago.co/store/item032.php">The Big Lebowski</a></li>
              </ul>
            </li>
            <li class="has-dropdown">
              <a href="http://joelsantiago.co/store/tools.php">Tools</a>
              <ul class="dropdown">
                <li><a href="http://joelsantiago.co/store/item033.php">Bosch Power Drill</a></li>
                <li><a href="http://joelsantiago.co/store/item034.php">DeWalt Metal Shears</a></li>
                <li><a href="http://joelsantiago.co/store/item035.php">DeWalt Angle Grinder</a></li>
                <li><a href="http://joelsantiago.co/store/item036.php">Fluke Multimeter</a></li>
                <li><a href="http://joelsantiago.co/store/item037.php">Hobart Mig Welder</a></li>
                <li><a href="http://joelsantiago.co/store/item038.php">Hobart Plasma Cutter</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="divider"></li>
        <?php echo writeUser(); ?>
        <li class="divider"></li>
        <li><a href="cart.php">
        <?php
          echo writeShoppingCart();
        ?>
        </a></li>
      </ul>
    </section>
  </nav>
  </div>

  <!-- First Band (Image) -->

  <div class="row buffer">
    <div class="large-12 columns">
	  <!-- InstanceBeginEditable name="header" -->
      <img src="http://joelsantiago.co/store/img/headers/main-header.gif">
	  <!-- InstanceEndEditable -->
      <hr>
    </div>
  </div>

  <!-- Header Bar -->
          <div class="row">
            <div class="large-12 columns">
              <div class="panel">
                <div class="row">

                  <div class="columns">
                  	<!-- InstanceBeginEditable name="header title" -->
                    <h1 class="nobottom-centered">Welcome!</h1>
 					<p>Our store carries a wide range of products that are sure to interest you.  You'll find products that cater the active, outdoors type, as well as movies for a night in.  We also carry electronics that let you increase your daily productivity as well as tools that allow you to attack even the most difficult of projects with ease.  Have a look!</p>
                    <!-- InstanceEndEditable -->
                  </div>

                </div>
              </div>
              <hr>
            </div>
         </div>
    <!-- End Header Bar -->

  <div class="row">

    <!-- Thumbnails -->

        <div class="large-12 columns">
          <div class="row">

            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product1" -->
              <a href="http://joelsantiago.co/store/item020.php"><img src="http://joelsantiago.co/store/img/electronics/mba/mba11-main.gif"></a>
			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product1 info" -->
                <a href="http://joelsantiago.co/store/item020.php"><h5>Apple Macbook Air 11" Inch</h5></a>
                <h6 class="subheader">Price: $999.99</h6>
				<!-- InstanceEndEditable -->
              </div>
            </div>

            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product2" -->
              <a href="http://joelsantiago.co/store/item001.php"><img src="http://joelsantiago.co/store/img/automotive/arb-compressor-12/ARB-CKMTA12-1.gif"></a>
			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product2 info" -->
                <a href="http://joelsantiago.co/store/item001.php"><h5>ARB 12 Volt Twin Air Compressor</h5></a>
                <h6 class="subheader">Price: $544.50</h6>
				<!-- InstanceEndEditable -->
              </div>
            </div>

            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product3" -->
              <a href="http://joelsantiago.co/store/item029.php"><img src="http://joelsantiago.co/store/img/movies/serenity.gif"></a>
			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product3 info" -->
                <a href="http://joelsantiago.co/store/item029.php"><h5>Serenity Blu-ray Limited Edition</h5></a>
                <h6 class="subheader">Price: $14.99</h6>
			  <!-- InstanceEndEditable -->
              </div>
            </div>

            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product4" -->
              <a href="http://joelsantiago.co/store/item012.php"><img src="http://joelsantiago.co/store/img/cycling/impact/impact-main.gif"></a>
			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product4 info" -->
                <a href="http://joelsantiago.co/store/item012.php"><h5>FiveTen Impact Low Mountain Bike Shoe</h5></a>
                <h6 class="subheader">Price: $120.99</h6>
			  <!-- InstanceEndEditable -->
              </div>
            </div>

            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product5" -->
              <a href="http://joelsantiago.co/store/item036.php"><img src="http://joelsantiago.co/store/img/tools/multimeter/fluke-main.gif"></a>
			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product5 info" -->
                <a href="http://joelsantiago.co/store/item036.php"><h5>Fluke 179 True RMS Multimeter</h5></a>
                <h6 class="subheader">Price: $249.99</h6>
			  <!-- InstanceEndEditable -->
              </div>
            </div>

            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product6" -->
              <a href="http://joelsantiago.co/store/item023.php"><img src="http://joelsantiago.co/store/img/electronics/hero3/black/black-main.gif"></a>
 			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product6 info" -->
                <a href="http://joelsantiago.co/store/item023.php"><h5>GoPro Hero 3 Black Edition</h5></a>
                <h6 class="subheader">Price: $399.99</h6>
                <!-- InstanceEndEditable -->
              </div>
            </div>

            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product7" -->
              <a href="http://joelsantiago.co/store/item038.php"><img src="http://joelsantiago.co/store/img/tools/cutter/cutter-main.gif"></a>
			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product7 info" -->
                <a href="http://joelsantiago.co/store/item038.php"><h5>Hobart Airforce 700i Plasma Cutter</h5></a>
                <h6 class="subheader">Price: $1,499.99</h6>
			  <!-- InstanceEndEditable -->
              </div>
            </div>

            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product8" -->
              <a href="http://joelsantiago.co/store/item018.php"><img src="http://joelsantiago.co/store/img/cycling/T2/T2-main.gif"></a>
			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product8 info" -->
                <a href="http://joelsantiago.co/store/item018.php"><h5>Thule 916XT T2 1.25-inch Bike Carrier</h5></a>
                <h6 class="subheader">Price: $377.99</h6>
			  <!-- InstanceEndEditable -->
              </div>
            </div>
          </div>

    <!-- End Thumbnails -->


    <!-- Managed By -->
          <div class="row bottom-buffer">
            <div class="large-12 columns">
              <div class="panel">
                <div class="row">
                  <div class="columns">
                    <strong>About our company<hr/></strong>
                    <p>We strive to deliver the most complete service to each and every one of our customers, by carrying a wide variety of products as well as offering fast shipping to all over the world.  If you haven't received such service, please make sure to send us an email and let us know how we can help.</p>
                  </div>
                </div>
              </div>
            </div>
         </div>
    <!-- End Managed By -->
        </div>
      </div>

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
                  <li><a href="http://joelsantiago.co/store/">Home</a></li>
                  <li><a href="http://joelsantiago.co/store/automotive.php">Automotive</a></li>
                  <li><a href="http://joelsantiago.co/store/cycling.php">Cycling</a></li>
                  <li><a href="http://joelsantiago.co/store/electronics.php">Electronics</a></li>
                  <li><a href="http://joelsantiago.co/store/movies.php">Movies</a></li>
                  <li><a href="http://joelsantiago.co/store/tools.php">Tools</a></li>
                </ul>
              </div>

            </div>
          </div>
        </footer>
      </div>
    <!-- End Footer -->
</body>
<!-- InstanceEnd --></html>