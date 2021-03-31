<!DOCTYPE html>
<html lang="en">
        <style type="text/css">
      .text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   line-height: 20px;     /* fallback */
   max-height: 30px;      /* fallback */
   -webkit-line-clamp: 1; /* number of lines to show */
   -webkit-box-orient: vertical;
}
    </style>

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
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
   <link rel="icon" href="<?php echo base_url();?>User/img/logo/bs_favicon.png" type="image/x-icon">
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
            <h1>Checkout</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url()?>user_c">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Checkout</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
<div class="container padding-bottom-3x mb-2">
        <div class="row">
          <!-- Checkout Adress-->
          <div class="col-xl-9 col-lg-8">
            <div class="checkout-steps"><a style="margin-right: 210px;" href="">3. Order</a><a class="active" href="checkout-payment.html"><span class="angle"></span>2. Payment</a><a class="completed" href=""><span class="step-indicator icon-circle-check"></span><span class="angle"></span>1. Address</a></div>
            <h4>Choose Payment Method</h4>
            <hr class="padding-bottom-1x">
            <form method="post" action="<?php echo base_url()?>u_c/review">
            <div class="accordion" id="accordion" role="tablist">
            <div class="card">
            <?php 
                $sum=0;
                foreach ($cart as $value) 
                {
                  $sum+=$value['Total'];
                }

              ?>
                <div class="card-header" role="tab">
                  <h6><a href="#card" data-toggle="collapse"><i class="fas fa-wallet"></i>Pay with Wallet</a></h6>
                </div>
                <div class="collapse show" id="card" data-parent="#accordion" role="tabpanel">
                  <div class="card-body">
                    <p>You currently have &#8377;<span class="text-medium"> <?php echo $_SESSION["Balance"]?></span> to spend.</p>
                    <div class="custom-control custom-checkbox d-block">
                      <input class="custom-control-input" type="checkbox" id="usewallet" name="usewallet" <?php if($_SESSION["Balance"]<$sum){echo "disabled=''";}?> >
                      <label class="custom-control-label" for="usewallet">Use your wallet to pay for this order.</label>
                      <br/>
                      <br/>
                      <a href="<?php echo base_url()?>u_c/wallet">Add money to your Wallet</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab">
                  <h6><a class="collapsed" href="#paytm" data-toggle="collapse"><i class="socicon-paypal"></i>Pay with Paytm</a></h6>
                </div>
                <div class="collapse " id="paytm" data-parent="#accordion" role="tabpanel">
                  <div class="card-body">
                    <p>Paytm - the safer, easier way to pay</p>
                    <div class="custom-control custom-checkbox d-block">
                      <input class="custom-control-input" type="checkbox" id="usepaytm" name="usepaytm">
                      <label class="custom-control-label" for="usepaytm">Use your paytm to pay for this order.</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <label style="color:red;float: right;font-size: 15px;" id="lbladd" ></label>
            <div class="checkout-footer margin-top-1x">
              <div class="column"><a class="btn btn-outline-secondary" href="<?php echo base_url()?>user_c/checkout"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back</span></a></div>
              <div class="column"><input type="submit" class="btn btn-primary"  value="Pay" id="btnpay"></div>
            </div>
          </div>
          </form>
          <!-- Sidebar          -->
           <div class="col-xl-3 col-lg-4">
            <aside class="sidebar">
              <div class="padding-top-2x hidden-lg-up"></div>
              <!-- Order Summary Widget-->
               <?php 
                $sum=0;
                foreach ($cart as $value) 
                {
                  $sum+=$value['Total'];
                }

              ?>
              <section class="widget widget-order-summary">
                <h3 class="widget-title">Order Summary</h3>
                <table class="table">
                <?php
                  foreach ($cart as $value)
                  {
                ?>
                    <tr>
                      <td style="width:150px" class="text"><?php echo $value["BookName"]?></td>
                      <td class="text-medium">&#8377; <?php echo $value["Total"]?></td>
                    </tr>

                <?php
                  }
                ?>
                  <tr>
                    <td></td>
                    <td class="text-lg text-medium">&#8377; <?php echo $sum;?></td>
                  </tr>
                </table>
              </section>
             
            </aside>
          </div>
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
    <script type="text/javascript">
  $(document).ready(function(e)
  {
    $("#btnpay").click(function(e){
      //e.preventDefault();
      if ($('input[type="checkbox"]:checked').length == 0) 
      {
          e.preventDefault();
          $("#lbladd").html("Select any one payemnt method");
              //alert('Select any one plan');
          }
          else
          {
          $("#lbladd").html("");

          }
    });
  });
</script> 
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.0/template-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 May 2018 09:01:02 GMT -->
</html>