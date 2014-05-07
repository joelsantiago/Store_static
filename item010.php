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
    <title>Yaesu FT-857D</title>
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
      <img src="img/automotive/yaesu-857/857-main.gif" width="500" height="500"/><br>
	  <!-- InstanceEndEditable -->
    </div>


    <div class="large-6 columns">
      <div class="panel">
      	<!-- InstanceBeginEditable name="Main Product Name" -->
        <h4 class="hide-for-small">Yaesu FT-857D<hr/></h4>
        <!-- InstanceEndEditable -->
        
        <!-- InstanceBeginEditable name="Main Product Description" -->
      	<h5 class="subheader">The FT-857D, the world's smallest HF/VHF/UHF mobile transceiver, provides base station-type performance from an ultra-compact package that's ideal for mobile or external battery portable work. Wide frequency coverage, outstandig receiver performance, and the convenience of optional remote-head operation make the FT-857D the expert's choice for high-performance mobile operation!
		</h5>
        <!-- InstanceEndEditable -->
      </div>

      <div class="row">
        <div class="large-6 small-6 columns">
          <div class="panel">
                      
            <!-- InstanceBeginEditable name="Options" -->
            <a href="#" class="small button expand" disabled>None</a>
            <a href="#" class="small button expand" disabled>None</a>
            <!-- InstanceEndEditable -->
            
          </div>
        </div>
      
        <div class="large-6 small-6 columns">
          <div class="panel">
          
          <!-- InstanceBeginEditable name="Main Product Price" -->
            <h5>Price: $969.99</h5>
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
            <a href="cart.php?action=add&ItemID=10" class="small button expand">Add to cart</a>
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
      <img src="img/automotive/yaesu-857/857-body.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      	
        <!-- InstanceBeginEditable name="Additional Title 1" -->
        <h4>Ultra-compact design</h4>
        <!-- InstanceEndEditable -->
          
          <!-- InstanceBeginEditable name="Additional Description 1" -->
          <p>Measuring just 6.1” x 2” x 9.2” (155 x 52 x 233 mm), the FT-857 is the world’s smallest full-power HF/VHF/UHF multimode transceiver! Its rugged case design is a masterpiece of ergonomic design, with often-used switches and knobs conveniently positioned for easy access.</p>
          <!-- InstanceEndEditable -->
          
    </div>
  
    <div class="large-4 columns">
      <!-- InstanceBeginEditable name="Additional Image 2" -->
      <img src="img/automotive/yaesu-857/857-knob.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      
        <!-- InstanceBeginEditable name="Additional Title 2" -->
        <h4>Big Radio Tuning Dial</h4>
        <!-- InstanceEndEditable -->

		  <!-- InstanceBeginEditable name="Additional Description 2" -->        
          <p>Ease of operation of the FT-857 is enhanced by the large-diameter (1.7”) Main Tuning Dial, similar in size to the tuning knob of many base station rigs. Selectable tuning steps of 2 kHz/4 kHz per revolution allow easy navigation around your favorite bands, while important keys and switches are strategically placed around the front panel for quick access.</p>
          <!-- InstanceEndEditable -->
          
    </div>
  
    <div class="large-4 columns">
      <!-- InstanceBeginEditable name="Additional Image 3" -->
      <img src="img/automotive/yaesu-857/microphone.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      
        <!-- InstanceBeginEditable name="Additional Title 3" -->
        <h4>Ergonomic microphone</h4>
        <!-- InstanceEndEditable -->
        
		  <!-- InstanceBeginEditable name="Additional Description 3" -->        	
          <p>Features RJ11 6 pin plug, it enables you to talk and listen without having to remove the radio from your belt.</p>
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
    
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item003.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/automotive/arb-snatchstrap/main.gif" width="500" height="500"></a>

      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item003.php">ARB Snatch Strap</a></p>

        <p>$64.99</p>
      </div>
    </div>
	
	<!-- InstanceEndEditable -->
	
	<!-- InstanceBeginEditable name="Related Item 3" -->

    <div class="large-3 small-6 columns">
    
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item006.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/automotive/bfg-km2/km2-main.gif" width="500" height="500"></a>

      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item006.php">BFG Mud-terrain KM2</a></p>

        <p>$321.99</p>
      </div>
    </div>
    
    <!-- InstanceEndEditable -->
	
	<!-- InstanceBeginEditable name="Related Item 4" -->
    
    <div class="large-3 small-6 columns">
      
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item009.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/automotive/kenwood-8990/kenwood-main.gif" width="500" height="500"></a>
      
      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item009.php">Kenwood Navigation</a></p>

        <p>$1,199.99</p>
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
