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
            <form method="post" action="<?php echo base_url()?>user_c/addaddress">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <!-- Checkout Adress-->
          <div class="col-xl-9 col-lg-8">
            <div class="checkout-steps"><a style="margin-right: 210px;" href="">3. Order</a><a href=""><span class="angle"></span>2. Payment</a><a class="active" href=""><span class="angle"></span>1. Address</a></div>
            <h4>Billing Address</h4>
            <?php
            foreach ($add as $value)
            {
            ?>
            <div class="row">
            <div class="col-lg-12  margin-bottom-1x">
                <div class="card">
                  <div class="card-body">
                    <p class="card-text"><input class="mr-4" type="radio" id="ex-radio-1" name="radio" value="<?php echo $value["AddressId"] ?>" <?php if(($value['IsDefault'])==1){echo "checked='true'" ;} ?> ><?php echo $value["AddressText"]?></p>
                    <p ><label style="margin-left: 35px;"><?php echo $value["CityName"].",".$value["StateName"]?></label></p>
                    <a class="btn btn-outline-primary btn-sm mr-5" style="margin-left: 35px;"  href="<?php echo base_url();?>user_c/deleteaddress?id=<?php echo base64_encode($value['AddressId'])?>">Delete</a>
                  </div>
                </div>
              </div>
            </div>                         
            <?php
            }
            ?>
            <hr>
            <h4>Add New Address</h4>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="checkout-fn">Address</label>
                  <textarea class="form-control" type="text" id="txtarea" name="txtarea"></textarea>
                </div>
              </div>
              </div>
               <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-ln">State</label>
                  <select class="form-control" id="ddstate" name="ddstate">
                  <option selected="selected" disabled="" >Select State </option>
                        <?php
                          foreach ($state as $value)
                          {
                         ?>
                              <option value="<?php echo $value["StateId"] ?>" ><?php echo $value["StateName"] ?></option>
                          <?php
                          }
                         ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-fn">City</label>
                  <select class="form-control" id="ddcity" name="ddcity">
                  </select>
                </div>
              </div>
            </div>
            <input class="btn btn-primary margin-top-none" name="btnadd" type="submit" value="Add" > 
            <label style="color:red;float: right;font-size: 15px;" id="lbladd" ></label>
            <div class="checkout-footer">
              <div class="column"><a class="btn btn-outline-secondary" href="<?php echo base_url()?>user_c/viewcart"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back To Cart</span></a></div>
              <div class="column"><input name="continue" id="btncontinue" value="continue" type="submit" class="btn btn-primary" ><span class="hidden-xs-down" />&nbsp;</div>
            </div>
          </div>
            </form>

          <!-- Sidebar-->
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
<script type="text/javascript">
    $(document).ready(function(){

     $("#ddstate").change(function(){
        var state = $(this).val();
        //alert(cat);
        $.ajax({
          url:"<?php echo base_url() ?>user_c/getcity",
          method:"post",
          data:{state:state},
          success:function(data){
            //alert(data);
            $("#ddcity").html(data);
          }
        });
      });
    });
</script>
<script type="text/javascript">
  $(document).ready(function(e)
  {
    $("#btncontinue").click(function(e){
      //e.preventDefault();
      if ($('input[name="radio"]:checked').length == 0) 
      {
          e.preventDefault();
          $("#lbladd").html("Select any one address");
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


</html>