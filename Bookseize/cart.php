<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.0/template-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 May 2018 08:57:34 GMT -->
<head>
    <meta charset="utf-8">
    <title>BookSeize
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Unishop - Universal E-Commerce Template">
    <meta name="keywords" content="shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Rokaux">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>User/css/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="<?php echo base_url();?>User/css/styles.min.css">
    <!-- Google Tag Manager-->
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-T4DJFPZ');
      
    </script>
    <!-- Modernizr-->
    <script src="<?php echo base_url();?>User/js/modernizr.min.js"></script>
  </head>
  <!-- Body-->
  <body>
    <!-- Google Tag Manager (noscript)-->
    <noscript>
      <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-T4DJFPZ" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>
    <!-- Template Customizer-->
    <div class="customizer-backdrop"></div>
   

    <!-- Navbar-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <?php $this->load->view("user/header");?>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Cart</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.html">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Cart</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <!-- Shopping Cart-->
        <div class="table-responsive shopping-cart">
          <table class="table">
            <thead>
              <tr>
                <th>Product Name</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Subtotal</th>
                <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="#">Clear Cart</a></th>
              </tr>
            </thead>
            <tbody>
            <?php
              foreach ($this->cart->contents() as $value)
              {
            ?>
                <tr>
                <td>
                  <div class="product-item"><a class="product-thumb" href="shop-single.html"><img src="<?php echo base_url();?>Images/<?php echo $value['img']?>" alt="Product"></a>
                    <div class="product-info">
                      <h4 class="product-title"><a href="shop-single.html"><?php echo $value['name']?></a></h4>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                  <div class="count-input">
                    <input type="number" class="form-control mb-2" value="<?php echo $value['qty']?>" name="txtqty" max="" min="1">
                  </div>
                </td>
                <td class="text-center text-lg text-medium"><?php echo $value['price']?></td>
                <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="Remove item"><i class="icon-cross"></i></a></td>
              </tr>
            <?php
              }
            ?>
            </tbody>
          </table>
        </div>
        <div class="shopping-cart-footer">
          <div class="column">
           
          </div>
          <div class="column text-lg">Subtotal: <span class="text-medium">$289.68</span></div>
        </div>
        <div class="shopping-cart-footer">
          <div class="column"><a class="btn btn-outline-secondary" href="shop-grid-ls.html"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a></div>
          <div class="column"><a class="btn btn-primary" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Update Cart</a><a class="btn btn-success" href="checkout-address.html">Checkout</a></div>
        </div>
      </div>


      <!-- Site Footer-->
      <?php $this->load->view("user/footer");?>
    </div>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="<?php echo base_url();?>User/js/vendor.min.js"></script>
    <script src="<?php echo base_url();?>User/js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.0/template-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 May 2018 09:01:02 GMT -->
</html>