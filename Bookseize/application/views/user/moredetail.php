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


       <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" ></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Modernizr-->
    <script src="<?php echo base_url();?>User/js/modernizr.min.js"></script>
        <?php
      if($this->session->flashdata("tost")=="true")
      { ?>
        <script type="text/javascript">
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
            <h1><?php echo $book["CategoryName"];?></h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url()?>user_c">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="<?php echo base_url()?>user_c/bookview">Category</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
       <div class="container padding-bottom-3x mb-1">
        <form method="post" action="<?php echo base_url() ?>user_c/addtocart">
        <div class="row">
          <!-- Poduct Gallery-->
          <div class="col-md-4">
            <img src="<?php echo base_url()?>Images/<?php echo $book["ImageName"];?>">
          </div>
          <!-- Product Info-->
          <div class="col-md-8">
            <div class="padding-top-2x mt-2 hidden-md-up"></div>
            <h2 class="padding-top-1x text-normal"><?php echo $book["BookName"]?> (By <?php echo $book["Author"]?>)</h2>
                <?php // echo $value["Rate"]; ?>
                          <div class="rating-stars">
                          <?php 

                           for ($i=1; $i <= $rating["rating"] ; $i++) { 
                            ?>
                               <i class="fa fa-star " style="color: gold;"></i>
                           <?php
                          }

                          $r=5 - $rating["rating"];

                          for ($i=0; $i <$r ; $i++) { 
                          ?>
                          <i class="fa fa-star"></i>

                          <?php
                          }

                          ?>
                          </div><span class="text-muted align-middle">&nbsp;&nbsp;<?php echo $rating["rating"]?></span>
            
                    <?php  
                    if($book["SalePrice"]==$book["OriginalPrice"])
                    {
                      ?>
                <span class="h2 d-block">
           &#8377; <?php echo $book["SalePrice"];?>
            </span>
                
                <?php
                    }
                    else
                    {
                   ?>
                       <span class="h2 d-block">
              <del class="text-muted text-normal">&#8377; <?php echo $book["OriginalPrice"];?></del>
              &nbsp; &#8377; <?php echo $book["SalePrice"];?>
            </span>
                    <?php
                    }


              ?>
              <div class="row">
                <div class="col-sm-3">
                  <h6>Quantity</h6>
              <input type="number" class="form-control mb-2" value="1" name="txtqty" max="<?php echo $book["Qty"];?>" min="1">
                </div>
              </div>
            
            <p><?php echo $book["Description"]?></p>
            <div class="row">
              <div class="col-sm-5">
                <h4>Editional Details</h4>
                <div class="pt-1 mb-2">
                  <span class="text-medium">Language : </span> <?php echo $book["Language"]?>
                </div> 
                <div class="pt-1 mb-2">
                  <span class="text-medium">Edition : </span> <?php echo $book["Edition"]?>
                </div> 
                <div class="pt-1 mb-2">
                  <span class="text-medium">ISBN No. : </span> <?php echo $book["ISBNno"]?>
                </div> 
                <div class="pt-1 mb-2">
                  <span class="text-medium">Publisher Name : </span> <?php echo $book["PublisherName"]?>
                </div>    
                <div class="pt-1 mb-2">
                  <span class="text-medium">Seller Name : </span><?php echo $book["FirstName"]." ".$book["LastName"];?>
                </div>     
                <div class="pt-1 mb-2">
                  <span class="text-medium">Condition</span> <?php if($book["IsNew"]==1) {echo "New";} else {echo "Old";}?>
                </div>
              </div>
            </div>
              <input type="hidden" name="txtid" value="<?php echo $book["BookId"]?>">
              <input type="hidden" name="txtname" value="<?php echo $book["BookName"]?>">
              <input type="hidden" name="txtprice" value="<?php echo $book["SalePrice"]?>">
              <input type="hidden" name="txtimg" value="<?php echo $book["ImageName"]?>">       
            <div class="d-flex flex-wrap justify-content-between">
              <div class="sp-buttons mt-2 mb-2">
                <input type="submit" name="btnmcart" class="btn btn-primary"  value="Add to Cart">
              </div>
            </div>
          </div>
        </div>
      </form>
        <!-- Product Tabs-->
        <div class="row padding-top-3x mb-3">
          <div class="col-lg-10 offset-lg-1">
           <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" href="#reviews" data-toggle="tab" role="tab">Reviews </a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="reviews" role="tabpanel">
          <?php
            if(isset($review))
            {
              foreach ($review as $value) 
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
                  <div class="comment-author-ava"><img src="<?php echo base_url()?>user_image/<?php echo $img?>" alt="Review author"></div>
                  <div class="comment-body">
                    <div class="comment-header d-flex flex-wrap justify-content-between">
                      <h4 class="comment-title"><?php if(isset($value["UserId"]))
                      {echo $value["FirstName"]." ".$value["LastName"];}else {echo $value["PersonName"];}?></h4> <span>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $value["CreatedOn"]?></span>
                      <div class="mb-2">
                        
                          <div class="rating-stars">
                          <?php 

                           for ($i=1; $i <= $value["Rate"] ; $i++) { 
                            ?>
                               <i class="fa fa-star" style="color: gold;"></i>
                           <?php
                          }

                          $r=5 - $value["Rate"];

                          for ($i=0; $i <$r ; $i++) { 
                          ?>
                          <i class="fa fa-star"></i>

                          <?php
                          }

                          ?>
                          </div>
                      </div>
                    </div>
                    <p class="comment-text"><?php echo $value["Feedback"]?></p>
                    
                  </div>
                </div>
                <?php
              }
          
            }
          ?>
           
                <!-- Review Form-->
      
                <h5 class="mb-30 padding-top-1x">Leave Review</h5>
                <form class="row" method="post" action="<?php echo base_url()?>u_c/addreview?id=<?php echo base64_encode($book['BookId'])?>">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="review_text">Review </label>
                      <textarea class="form-control form-control-rounded" id="review_text" rows="8" required name="txtreview"></textarea>
                    </div>
                  </div>
                   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="review_rating">Rating</label>
                      <select class="form-control form-control-rounded" id="review_rating" name="ddrate">
                        <option value="5">5 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="2">2 Stars</option>
                        <option value="1">1 Star</option>
                      </select>
                    </div>
                  </div>
                  <?php 
                    if(!isset($_SESSION["UserId"]))
                    {
                  ?>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="account-email">Name</label>
                    <input class="form-control form-control-rounded" type="text" name="txtname" placeholder="Enter Your Name" >
                     </div>
                  </div>
                  <?php
                    }
                  ?>
                  <div class="col-12 text-right">
                    <input class="btn btn-outline-primary" name="btnreview" type="submit" value="Submit Review">
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
        <!-- Related Products Carousel-->
       
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