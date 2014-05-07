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
    <title>GoPro Hero 3 White Edition</title>
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
      <img src="img/electronics/hero3/white/white-main.gif" width="500" height="500"/><br>
	  <!-- InstanceEndEditable -->
    </div>


    <div class="large-6 columns">
      <div class="panel">
      	<!-- InstanceBeginEditable name="Main Product Name" -->
        <h4 class="hide-for-small">GoPro Hero 3 White Edition<hr/></h4>
        <!-- InstanceEndEditable -->
        
        <!-- InstanceBeginEditable name="Main Product Description" -->
      	<h5 class="subheader">The HERO3: White Edition boasts the same high performance specs as the Original HD HERO camera it replaces, yet it has built-in Wi-Fi, new UI and is 30% smaller and 25% lighter. The HERO3: White Edition is wearable and gear mountable, waterproof to 197' (60m), and is capable of capturing 1080p 30 fps and 720p 60 fps video plus 5MP photos at a rate of 3 photos per second.
		</h5>
        <!-- InstanceEndEditable -->
      </div>

      <div class="row">
        <div class="large-6 small-6 columns">
          <div class="panel">
                      
            <!-- InstanceBeginEditable name="Options" -->
            <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item023.php" class="small button expand">Black</a>
            <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item024.php" class="small button expand">Silver</a>
            <a href="#" class="small button expand">White</a>
            <!-- InstanceEndEditable -->
            
          </div>
        </div>
      
        <div class="large-6 small-6 columns">
          <div class="panel">
          
          <!-- InstanceBeginEditable name="Main Product Price" -->
            <h5>Price: $199.99</h5>
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
            <a href="cart.php?action=add&ItemID=25" class="small button expand">Add to cart</a>
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
      <img src="img/electronics/hero3/white/white-sub1.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      	
        <!-- InstanceBeginEditable name="Additional Title 1" -->
        <h4>Smaller, Lighter...Better</h4>
        <!-- InstanceEndEditable -->
          
          <!-- InstanceBeginEditable name="Additional Description 1" -->
          <p>The HERO3: White Edition's reduced-distortion lens combines with the completely redesigned HERO3 flat-lens waterproof housing to deliver stunning image sharpness both above and below water.</p>
          <!-- InstanceEndEditable -->
          
    </div>
  
    <div class="large-4 columns">
      <!-- InstanceBeginEditable name="Additional Image 2" -->
      <img src="img/electronics/hero3/white/white-sub2.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      
        <!-- InstanceBeginEditable name="Additional Title 2" -->
        <h4>Professional Quality Video</h4>
        <!-- InstanceEndEditable -->

		  <!-- InstanceBeginEditable name="Additional Description 2" -->        
          <p>The HERO3: White Edition captures professional quality video at 1080p-30, 720p-60, 960p-30 and WVGA-60 resolutions and frame rates. Photo resolution is 5MP and the HERO3: White Edition can capture burst photos at 3 frames per second. Time-lapse photo capture mode enables automatic photo capture at 0.5, 2, 5, 10, 30 and 60 second intervals.</p>
          <!-- InstanceEndEditable -->
          
    </div>
  
    <div class="large-4 columns">
      <!-- InstanceBeginEditable name="Additional Image 3" -->
      <img src="img/electronics/hero3/white/white-sub3.gif" width="400" height="300"/>
      <!-- InstanceEndEditable -->
      
        <!-- InstanceBeginEditable name="Additional Title 3" -->
        <h4>Wi-Fi Built-in</h4>
        <!-- InstanceEndEditable -->
        
		  <!-- InstanceBeginEditable name="Additional Description 3" -->        	
          <p>The HERO3: White Edition features built-in Wi-Fi and is compatible with both the Wi-Fi Remote (not included) and the GoPro App. The Wi-Fi Remote (not included) is a waterproof, wearable remote control that can control up to 50 Wi-Fi-enabled GoPros at a time from a range of 600'. The HERO3: White Edition's built in Wi-Fi means it can also be controlled by iOS smartphones and tablets running the GoPro App.</p>
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
    
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item020.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/electronics/mba/mba11-main.gif" width="500" height="500"></a>

      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item020.php">Apple MacBook Air</a></p>

        <p>$999.99</p>
      </div>
    </div>

	<!-- InstanceEndEditable -->
    
	<!-- InstanceBeginEditable name="Related Item 2" -->
    
    <div class="large-3 small-6 columns">
    
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item022.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/electronics/5d/5d-main.gif" width="500" height="500"></a>

      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item022.php">Canon EOS 5D Mark III</a></p>

        <p>$3,874.99</p>
      </div>
    </div>
	
	<!-- InstanceEndEditable -->
	
	<!-- InstanceBeginEditable name="Related Item 3" -->

    <div class="large-3 small-6 columns">
      
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item024.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/electronics/hero3/silver/silver-main.gif" width="500" height="500"></a>
      
      <div class="panel">

        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item024.php">GoPro Hero 3 Silver</a></p>

        <p>$299.99</p>
      </div>
    </div>
    
    <!-- InstanceEndEditable -->
	
	<!-- InstanceBeginEditable name="Related Item 4" -->
    
    <div class="large-3 small-6 columns">
      
      <a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item026.php">
      <img src="http://puzzle.sci.csueastbay.edu/~qy2554/Store/img/electronics/hifi/hifi-main.gif" width="500" height="500"></a>

      <div class="panel">
        
        <p><a href="http://puzzle.sci.csueastbay.edu/~qy2554/Store/item026.php">HIFIman HE-400</a></p>
        
        <p>$399.99</p>        
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
