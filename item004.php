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
    <title>ARB Snatch Strap 24,000LB (ARB710)</title>
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
      <img src="img/automotive/arb-snatchstrap/main.gif" width="500" height="500"/><br>
	  <!-- InstanceEndEditable -->
    </div>


    <div class="large-6 columns">
      <div class="panel">
      	<!-- InstanceBeginEditable name="Main Product Name" -->
        <h4 class="hide-for-small">ARB Snatch Strap 24,000LB (ARB710)<hr/></h4>
        <!-- InstanceEndEditable -->
        
        <!-- InstanceBeginEditable name="Main Product Description" -->
      	<h5 class="subheader">Specifically designed to stretch under load for maximum performance, an ARB snatch strap is a very effective method of extracting a bogged or immobilized 4wd when a second vehicle is present. How it works: the elasticity in a snatch strap is what makes it such an essential piece of recovery gear. The kinetic energy generated by the elasticity aids with the recovery itself, while at the same time reducing the likelihood of vehicle damage.
		</h5>
        <!-- InstanceEndEditable -->
      </div>

      <div class="row">
        <div class="large-6 small-6 columns">
          <div class="panel">
                      
            <!-- InstanceBeginEditable name="Options" -->
            <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item003.php" class="small button expand">17,500LB</a>
            <a href="#" class="small button expand">24,000LB</a>
            <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item005.php" class="small button expand">33,000LB</a>
            <!-- InstanceEndEditable -->
            
          </div>
        </div>
      
        <div class="large-6 small-6 columns">
          <div class="panel">
          
          <!-- InstanceBeginEditable name="Main Product Price" -->
            <h5>Price: $86.99</h5>
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
            <a href="cart.php?action=add&ItemID=4" class="small button expand">Add to cart</a>
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
      <img src="img/automotive/arb-snatchstrap/recovery2.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      	
        <!-- InstanceBeginEditable name="Additional Title 1" -->
        <h4>Strength for all sizes</h4>
        <!-- InstanceEndEditable -->
          
          <!-- InstanceBeginEditable name="Additional Description 1" -->
          <p>All ARB snatch straps are woven and fabricated to ARB specifications, and tested by a NATA approved laboratory. The 17,500 lb model is recommended for most 4WD vehicles, with the 24,000 lb & 33,000 lb straps better suited to heavier applications.</p>
          <!-- InstanceEndEditable -->
          
    </div>
  
    <div class="large-4 columns">
      <!-- InstanceBeginEditable name="Additional Image 2" -->
      <img src="img/automotive/arb-snatchstrap/recovery.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      
        <!-- InstanceBeginEditable name="Additional Title 2" -->
        <h4>Universal build</h4>
        <!-- InstanceEndEditable -->

		  <!-- InstanceBeginEditable name="Additional Description 2" -->        
          <p>This strap will fit most vehicles. Some universal fit products require that you select a specific size or style, based on the actual features on your vehicle.</p>
          <!-- InstanceEndEditable -->
          
    </div>
  
    <div class="large-4 columns">
      <!-- InstanceBeginEditable name="Additional Image 3" -->
      <img src="img/automotive/arb-snatchstrap/recoverykit.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      
        <!-- InstanceBeginEditable name="Additional Title 3" -->
        <h4>The entire package</h4>
        <!-- InstanceEndEditable -->
        
		  <!-- InstanceBeginEditable name="Additional Description 3" -->        	
          <p>ARB USA now offers a complete pre-assembled boxed kit, the ARB premium Recovery Kit includes everything the off-roader needs to get started. Whether it be a simple snatch recovery or a more serious winch recovery, the ARB premium recovery kit has it all. The premium recovery kit represents exceptional value and a savings over purchasing each component individually.</p>
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
    
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item001.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/automotive/arb-compressor-12/ARB-CKMTA12-1.gif" width="500" height="500"></a>

      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item001.php">ARB Compressor</a></p>

        <p>$544.50</p>
      </div>
    </div>

	<!-- InstanceEndEditable -->
    
	<!-- InstanceBeginEditable name="Related Item 2" -->
    
    <div class="large-3 small-6 columns">
    
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item006.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/automotive/bfg-km2/km2-main.gif" width="500" height="500"></a>

      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item006.php">BFG Mud-terrain KM2</a></p>

        <p>$321.99</p>
      </div>
    </div>
	
	<!-- InstanceEndEditable -->
	
	<!-- InstanceBeginEditable name="Related Item 3" -->

    <div class="large-3 small-6 columns">
      
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item009.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/automotive/kenwood-8990/kenwood-main.gif" width="500" height="500"></a>
      
      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item009.php">Kenwood Navigation</a></p>

        <p>$1,199.99</p>
      </div>
    </div>
    
    <!-- InstanceEndEditable -->
	
	<!-- InstanceBeginEditable name="Related Item 4" -->
    
    <div class="large-3 small-6 columns">
      
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item010.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/automotive/yaesu-857/857-main.gif" width="500" height="500"></a>

      <div class="panel">
        
        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item010.php">Yaesu Ham Radio</a></p>
        
        <p>$969.99</p>        
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
