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
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
          <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Testimonial</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url()?>user_c">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Testimonial</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding mb-2 mb-5">
      <?php
       if(isset($_SESSION["UserId"]))
       {
      ?>
      <div class="row">
        <div class="col" style="margin-left: 900px; margin-bottom: 20px;margin-top: 10px;">
          <btn class="btn btn-primary btnadd" data-toggle="modal" data-target="#modalLarge"   title="Add Testimonial" >Add Testimonial</btn>
        </div>
      </div>
      <?php
        }
      ?>
        <div class="row ">
          <div class="col">
                <div class="card">
                <br/>
                <?php
                foreach ($test as $value)
                {
              
               if($value["ImageUrl"]==NULL)
                {
                  $img="download.png";
                }
                else 
                {
                  $img=$value["ImageUrl"];
                }

            ?>
                 <div class="comment">
                  <div class="comment-author-ava"><img src="<?php echo base_url()?>user_image/<?php echo $img;?>" alt="Review author"></div>
                  <div class="comment-body">
                    <div class="comment-header d-flex flex-wrap justify-content-between">
                      <h4 class="comment-title"><?php if(isset($value["UserId"]))
                      {echo $value["FirstName"]." ".$value["LastName"];}else {echo $value["PersonName"];}?></h4> <span>  
                    </div>
                    <p class="comment-text"><?php echo $value["Comment"]?></p>
                    
                  </div>
                </div>
                <?php
          
                }
              ?>
                </div>
          </div>
        </div>
      </div>
      <!-- Page Content-->
 
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
    $(".btnadd").click(function(){

      $.ajax({
        url:"<?php echo base_url() ?>u_c/addtestimonialform",
        method:"post",
        success:function(data){
          $("#form-data-frm").html(data);
        }
      });

    });
  });
</script>
  </body>


</html>