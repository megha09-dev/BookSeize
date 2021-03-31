<!DOCTYPE html>
<html lang="en">
  

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
    <!-- Open Ticket Modal-->
    <div class="modal fade" id="orderDetails" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" id="form-data-frm">
         
        </div>
      </div>
    </div>

    <!-- Navbar-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <?php $this->load->view("user/header");?>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
        <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>My Orders</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url()?>user_c">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="">Account</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>My Orders</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <div class="col-lg-4">
            <aside class="user-info-wrapper">
              <div class="user-cover" style="background-image: url(img/account/user-cover-img.jpg);">
                
              </div>
              <div class="user-info">
                <div class="user-avatar"><a class="edit-avatar" href=""></a><img src="<?php echo base_url()?>user_image/<?php echo $_SESSION["ImageUrl"]?>" alt="User"></div>
                <div class="user-data">
                  <h4><?php echo $_SESSION["FirstName"]." ".$_SESSION["LastName"]?></h4><span>Joined on <?php echo $_SESSION["CreatedOn"]?></span>
                </div>
              </div>
            </aside>
            <nav class="list-group"><a class="list-group-item with-badge " href="<?php echo base_url();?>u_c/myorders"><i class="icon-bag"></i>Orders<span class="badge badge-primary badge-pill"></span></a><a class="list-group-item " href="<?php echo base_url()?>user_c/profile"><i class="icon-head"></i>Profile</a><a class="list-group-item" href="<?php echo base_url()?>u_c/proaddress"><i class="icon-map"></i>Addresses</a><a class="list-group-item" href="<?php echo base_url()?>u_c/wallet"><i class="fas fa-wallet"></i>Wallet</a><a class="list-group-item" href="<?php echo base_url()?>u_c/mybooks"><i class="fas fa-book"></i>My Books</a>
            <a class="list-group-item active" href="<?php echo base_url()?>u_c/myorderlist"><i class="fas fa-cart-arrow-down"></i>Order List</a></nav>
          </div>
          <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th>Order</th>
                    <th>Address</th>
                    <th>Buyer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                
                  foreach ($data as $value)
                  {
                ?>
                    <tr>
                      <!--<td><a class="text-medium navi-link btnorderdetail" href="#" data-toggle="modal" data-target="#orderDetails" oid="<?php echo $value["OrderId"]?>"><?php echo $value["OrderId"]?></a></td>-->

                      <td><?php echo $value["oid"]?></td>
                      <td><?php echo $value["AddressText"]?></td>
                      <td><?php echo $value["FirstName"]." ".$value["LastName"]?></td>
                      <td> &#8377; <?php echo $value["Price"]?></td> 
                      <td  ><a title="Change Status" val="<?php echo $value["st1"]?>" id="<?php echo $value["OrderId"] ?>" class="changeStatus" style="cursor:pointer;text-decoration:none;"><?php echo $value["st1"]?></a></td>


                      <td><a class="text-medium navi-link btnorderdetail" href="#" data-toggle="modal" data-target="#orderDetails" oid="<?php echo $value["OrderId"]?>"><i class="fa fa-info-circle"></i></a></td>
                    </tr>
                <?php
                  }
                ?>
   
                </tbody>
              </table>
            </div>
            <hr>
            
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
     $(document).ready(function(){
    $(".btnorderdetail").click(function(){
      var oid= $(this).attr("oid");

      $.ajax({
        url:"<?php echo base_url() ?>u_c/orderdetail",
        method:"post",
        data:{oid:oid},
        success:function(data){
          $("#form-data-frm").html(data);
        }
      });

    });
  });
    </script>
    <script type="text/javascript">
      $(".changeStatus").click(function(){
        var value = $(this).attr("val");
        if(value!="Delivered")
        {
              var oid =$(this).attr('id');
              $.ajax({
              url:"<?php echo base_url() ?>u_c/changestatus",
              method:"post",
              data:{oid:oid},
              success:function(data){
                $("#"+oid).html(data);
                window.location.href = 'http://localhost/Bookseize/u_c/myorderlist';
              }
            });
        }
      
      }); 
    </script>
  
  </body>


</html>