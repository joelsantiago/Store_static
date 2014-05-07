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
    <title>Store - Tools</title>
    <!-- InstanceEndEditable -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
  </head>
   
<body>

<!-- Navigation -->
  <div class="fixed barbuffer">
  <nav class="top-bar">
    <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <h1>
          <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/">Store</a>
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
      <img src="img/headers/tools-header.gif">
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
                    <h1 class="nobottom-centered">Tools</h1>
					<p>You think of yourself a handyman?  Well, take a look at our selection of tools and find new products to help improve your next project.  From the most novice to the most extreme, we carry a wide array of tools to assist you through any project.</p>
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
              <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item033.php"><img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/tools/drill/drill-main.gif"></a>
			  <!-- InstanceEndEditable -->              
              <div class="panel">
              	<!-- InstanceBeginEditable name="product1 info" -->
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item033.php"><h5>Bosch DDB180 Power Drill</h5></a>
                <h6 class="subheader">Price: $179.99</h6>
				<!-- InstanceEndEditable --> 
              </div>
            </div>
 
            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product2" -->
              <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item034.php"><img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/tools/shears/shears-main.gif"></a>
			  <!-- InstanceEndEditable --> 
              <div class="panel">
              	<!-- InstanceBeginEditable name="product2 info" -->              
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item034.php"><h5>DeWalt DW891 Metal Shears</h5></a>
                <h6 class="subheader">Price: $249.99</h6>
				<!-- InstanceEndEditable -->
              </div>
            </div>
            
            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product3" -->
              <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item035.php"><img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/tools/grinder/grinder-main.gif"></a>
			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product3 info" -->              
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item035.php"><h5>DeWalt D2840 Angle Grinder</h5></a>
                <h6 class="subheader">Price: $89.99</h6>
			  <!-- InstanceEndEditable -->
              </div>
            </div>
 
            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product4" -->
              <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item036.php"><img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/tools/multimeter/fluke-main.gif"></a>
			  <!-- InstanceEndEditable --> 
              <div class="panel">
              	<!-- InstanceBeginEditable name="product4 info" -->              
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item036.php"><h5>Fluke 179 True RMS Multimeter</h5></a>
                <h6 class="subheader">Price: $249.99</h6>
			  <!-- InstanceEndEditable -->
              </div>
            </div>
 
            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product5" -->
              <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item037.php"><img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/tools/welder/welder-main.gif"></a>
			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product5 info" -->              
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item037.php"><h5>Hobart Ironman 230 Mig Welder</h5></a>
                <h6 class="subheader">Price: $1,549.99</h6>
			  <!-- InstanceEndEditable -->              
              </div>
            </div>
 
            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product6" -->
              <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item038.php"><img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/tools/cutter/cutter-main.gif"></a>
 			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product6 info" -->              
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item038.php"><h5>Hobart Airforce 700i Plasma Cutter</h5></a>
                <h6 class="subheader">Price: $1,499.99</h6>
                <!-- InstanceEndEditable -->
              </div>
            </div>
 
            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product7" -->
              <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item036.php"><img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/tools/multimeter/fluke-main.gif"></a>
			  <!-- InstanceEndEditable --> 
              <div class="panel">
              	<!-- InstanceBeginEditable name="product7 info" -->              
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item036.php"><h5>Fluke 179 True RMS Multimeter</h5></a>
                <h6 class="subheader">Price: $249.99</h6>
			  <!-- InstanceEndEditable -->
              </div>
            </div>
 
            <div class="large-3 small-6 columns">
			  <!-- InstanceBeginEditable name="product8" -->
              <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item033.php"><img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/tools/drill/drill-main.gif"></a>
			  <!-- InstanceEndEditable -->
              <div class="panel">
              	<!-- InstanceBeginEditable name="product8 info" -->              
                <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item033.php"><h5>Bosch DDB180 Power Drill</h5></a>
                <h6 class="subheader">Price: $179.99</h6>
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