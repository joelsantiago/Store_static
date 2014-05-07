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
<html lang="en"><!-- InstanceBegin template="/Templates/item.dwt.php" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="utf-8" />
    
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Thule 916XT T2 1.25-inch Receiver Bike Carrier</title>
    <!-- InstanceEndEditable -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
  </head>
   
<body>

<!-- Navigation -->
<div class="fixed"> 
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
  <!-- End Top Bar -->

  <!-- Header Content -->
 
  <div class="row buffer">

    <div class="large-6 columns">
	  <!-- InstanceBeginEditable name="Main Product Image" -->
      <img src="img/cycling/T2/T2-main.gif" width="500" height="500"/><br>
	  <!-- InstanceEndEditable -->
    </div>


    <div class="large-6 columns">
      <div class="panel">
      	<!-- InstanceBeginEditable name="Main Product Name" -->
        <h4 class="hide-for-small">Thule 916XT T2 1.25-inch Receiver Bike Carrier<hr/></h4>
        <!-- InstanceEndEditable -->
        
        <!-- InstanceBeginEditable name="Main Product Description" -->
      	<h5 class="subheader">This premier platform hitch rack is the fastest to load and remove bikes with minimal lifting for ultimate convenience.
		</h5>
        <!-- InstanceEndEditable -->
      </div>

      <div class="row">
        <div class="large-6 small-6 columns">
          <div class="panel">
                      
            <!-- InstanceBeginEditable name="Options" -->
            <a href="#" class="small button expand">1.25" Receiver</a>
            <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item019.php" class="small button expand">2" Receiver</a>
            <!-- InstanceEndEditable -->
            
          </div>
        </div>
      
        <div class="large-6 small-6 columns">
          <div class="panel">
          
          <!-- InstanceBeginEditable name="Main Product Price" -->
            <h5>Price: $377.99</h5>
            <!-- InstanceEndEditable -->
                      
          <!--
            <h5>Quantity
              <select id="customDropdown" class="small">
                 <option>1</option>
                 <option>2</option>
                 <option>3</option>
                 <option>4</option>
                 <option>5</option>
                 <option>6</option>
                 <option>7</option>
                 <option>8</option>
                 <option>9</option>
                 <option>10</option>
              </select>
            </h5>
            -->
            <hr/>
            <!-- InstanceBeginEditable name="Add to Cart" -->
            <a href="cart.php?action=add&ItemID=18" class="small button expand">Add to cart</a>
            <!-- InstanceEndEditable -->
          </div>
        </div>
      </div>

    </div>
  </div>
 
  <!-- End Header Content -->

  <br>
  
  <!-- Additional Details -->

  <div class="row">

    <div class="large-12 columns">
      <h3>Additional Details</h3><hr>
    </div>

    <div class="large-4 columns">

	  <!-- InstanceBeginEditable name="Additional Image 1" -->
      <img src="img/cycling/T2/T2-sub1.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      	
        <!-- InstanceBeginEditable name="Additional Title 1" -->
        <h4>Fold it on up</h4>
        <!-- InstanceEndEditable -->
          
          <!-- InstanceBeginEditable name="Additional Description 1" -->
          <p>Hitch Switch™ lever folds and stores platform when not in use and tilts carrier away from vehicle for rear of vehicle access.</p>
          <!-- InstanceEndEditable -->
          
    </div>
  
    <div class="large-4 columns">
      <!-- InstanceBeginEditable name="Additional Image 2" -->
      <img src="img/cycling/T2/T2-sub2.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      
        <!-- InstanceBeginEditable name="Additional Title 2" -->
        <h4>Lock it down</h4>
        <!-- InstanceEndEditable -->

		  <!-- InstanceBeginEditable name="Additional Description 2" -->        
          <p>SecureHook™ with integrated cable lock secures the bike without making frame contact</p>
          <!-- InstanceEndEditable -->
          
    </div>
  
    <div class="large-4 columns">
      <!-- InstanceBeginEditable name="Additional Image 3" -->
      <img src="img/cycling/T2/T2-sub3.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      
        <!-- InstanceBeginEditable name="Additional Title 3" -->
        <h4>Give everyone a ride</h4>
        <!-- InstanceEndEditable -->
        
		  <!-- InstanceBeginEditable name="Additional Description 3" -->        	
          <p>Can carry up to 4 bikes with the T2 plus a 918XTR 2 Bike Add-On™ (sold separately, 2" receiver only)</p>
          <!-- InstanceEndEditable -->
          
    </div>
  </div>
  
  <!-- End Additional Details -->

  <br>

  <!-- Related Items -->
 
  <div class="row">
    
    <div class="large-12 columns">
      <h3>Related Products</h3><hr>
    </div>
    
    <!-- InstanceBeginEditable name="Related Item 1" -->

    <div class="large-3 small-6 columns">
    
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item011.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/cycling/mallet/mallet-main.gif" width="500" height="500"></a>

      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item011.php">Crank Bros. Mallet 2</a></p>

        <p>$76.99</p>
      </div>
    </div>

	<!-- InstanceEndEditable -->
    
	<!-- InstanceBeginEditable name="Related Item 2" -->
    
    <div class="large-3 small-6 columns">
    
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item012.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/cycling/impact/impact-main.gif" width="500" height="500"></a>

      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item012.php">FiveTen Impact Low</a></p>

        <p>$120.99</p>
      </div>
    </div>
	
	<!-- InstanceEndEditable -->
	
	<!-- InstanceBeginEditable name="Related Item 3" -->

    <div class="large-3 small-6 columns">
    
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item013.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/cycling/talas/talas-main.gif" width="500" height="500"></a>

      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item013.php">Fox 32 Talas Fork</a></p>

        <p>$347.99</p>
      </div>
    </div>
    
    <!-- InstanceEndEditable -->
	
	<!-- InstanceBeginEditable name="Related Item 4" -->
    
    <div class="large-3 small-6 columns">
      
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item014.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/cycling/highroller/hr-main.gif" width="500" height="500"></a>
      
      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item014.php">Maxxis High Roller</a></p>

        <p>$43.99</p>
      </div>
    </div>
    
    <!-- InstanceEndEditable -->
     
  </div>
  <!-- End Related Items -->

  <div class="bottom-buffer"></div>

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
