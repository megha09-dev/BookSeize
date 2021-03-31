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

      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
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
        <style type="text/css">
      .text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   line-height: 20px;     /* fallback */
   max-height: 32px;      /* fallback */
   -webkit-line-clamp: 1; /* number of lines to show */
   -webkit-box-orient: vertical;
}
    </style>
    <!-- Modernizr-->
       <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url();?>User/js/modernizr.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" ></script>

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

   <div class="modal fade" id="modalLarge" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div id="form-data-frm">
                   
          </div>
        </div>
      </div>
    </div>
    <?php
      if($this->session->flashdata("tost")=="true")
      { ?>
        <script type="text/javascript">
        //alert("already in cart");
        $(document).ready(function(){
         toastr.success('Already in cart!');
          
        });

      </script>
      <?php
      } 
    ?>
     <?php
      if($this->session->flashdata("tost2")=="true")
      { ?>
        <script type="text/javascript">
        //alert("already in cart");
        $(document).ready(function(){
         toastr.success('Added to cart');
          
        });

      </script>
      <?php
      } 
    ?>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Content-->
      <!-- Main Slider-->
    <?php $this->load->view("user/slider");?>
    <section class="container padding-top-3x">
      <!-- Page Content-->
<div class="container padding-bottom-2x mb-2">
        <div class="row">
          <!-- Sidebar          -->
          <div class="col-lg-3">
            <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopCategories"><i class="icon-layout"> </i></button>
            <aside class="sidebar sidebar-offcanvas">
              <section class="widget widget-categories">
                <h3 class="widget-title">All Categories</h3>
                <ul>
                  <?php
                  foreach ($cat as $value) 
                  {
                  ?>
                    <li><a href="<?php echo base_url() ?>user_c/viewsubcategory?id=<?php echo base64_encode($value["CategoryId"]) ?>"><?php echo $value["CategoryName"];?></a></li>
                  <?php
                  }
                  ?>
                </ul>
              </section>
            </aside>
          </div>
          <!-- Categories-->
          <div class="col-lg-9">
            <!-- Promo banner-->
            <h3 align="center"> Top Selling Products </h3>
            <div class="row" id="data" >
              <?php 
              
                foreach ($book as $value)
                {

              ?>
                <div class="col-lg-4 col-md-6 col-sm-6"  >
                  <div class="product-card mb-30"  >
                  
                    <a class="product-thumb" href="#"><center><img src="<?php echo base_url()?>Images/<?php echo $value["ImageName"]?>" alt="Product" style="height:140px ;width:120px ;"></center></a>
                      <h3 class="product-title text"  ><a href="#"><?php echo $value["BookName"]?></a></h3>
                     


          <?php  
                    if($value["SalePrice"]==$value["OriginalPrice"])
                    {
          ?>
               
                 <h4 class="product-price">
                  <?php echo $value["SalePrice"];?> &#8377;
                </h4>

          <?php
                    }
                    else
                    {
          ?>
                     <h4 class="product-price">
                    <del><?php echo $value["OriginalPrice"];?> &#8377;</del><?php echo $value["SalePrice"];?> &#8377;
                    </h4>
  
          <?php
                    }
          ?>
                    <div class="product-buttons">
                      <a style="width:55px" class="btn btn-outline-info btn-sm btnview" data-toggle="modal" data-target="#modalLarge"  bid="<?php echo $value["BookId"]?>" title="Quick View" ><i class='fa fa-eye ' style="font-size:20px" ></i></a>

                      
                               <a href="<?php echo base_url();?>user_c/addtocart?bid=<?php echo base64_encode($value['BookId'])?>&catid=<?php echo base64_encode($value["CategoryId"]);?>" class="btn btn-outline-primary btn-sm"  name="btncart">Add to Cart</a>
                           
                      
                    </div>
                  </div>
                </div>
              <?php
                }
                ?>
                </form>
               
            </div>
            
          </div>
        </div>
      </div>
    </section>
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
    $(".btnview").click(function(){
      var rid= $(this).attr("bid");
      //alert(rid);
      $("#form-data-frm").html('<center><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div><center>');
      $.ajax({
        url:"<?php echo base_url() ?>user_c/bookview",
        method:"post",
        data:{bid:rid},
        success:function(data){
          $("#form-data-frm").html(data);
        }
      });

    });
});
</script>
  </body>


</html>