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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" ></script>
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
    <style type="text/css">
.lds-ellipsis {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;
}
.lds-ellipsis div {
  position: absolute;
  top: 27px;
  width: 11px;
  height: 11px;
  border-radius: 50%;
  background: #7FB3D5;
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 6px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 6px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 26px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 45px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(19px, 0);
  }
}
    </style>
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
    <div class="offcanvas-wrapper">
<!--modal for view-->

            <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>
            <?php echo $catname["CategoryName"]; ?>
            </h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url();?>user_c">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="<?php echo base_url();?>user_c/shopcategories">Category</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-2x mb-2 mt-5">
      <form method="post" action="<?php echo base_url();?>user_c/addtocart">
        <div class="row">
          <div class="col-lg-9 col-md-8 order-md-2">
            <div class="row" >
              <div class="col-md-4" >
                <h6 class="text-muted text-normal text-uppercase"><?php
             if(isset($subcat)) 
            {
              ?>
              <h4 style="color:Grey"> <?php echo $subcat["SubCategoryName"];?></h4>

              <?php
            }
            else{
              ?>
              <h4 style="color:Grey"> ALL CATEGORIES </h4>
               <?php
            }
            ?>
          </h6>


              </div>
              <div class="col-md-6"  style="float: right;margin-left: 145px">
                <a class="btn btn-primary"  href="?id=<?php echo $_GET['id'] ?>"><label style="cursor:pointer;" id="all" >All</label></a>
                <a  class="btn btn-primary"  href="?id=<?php echo $_GET['id'] ?>&fl=old"><label style="cursor:pointer;" id="old" >Old</label></a>
                <a  class="btn btn-primary"  href="?id=<?php echo $_GET['id'] ?>&fl=new"><label style="cursor:pointer;" id="new" >New</label></a>
              </div>
            </div>
            
            
            <hr class="margin-bottom-1x">
            <div class="row" id="data" >
              <?php 
              if(count($book)==0)
              {
                ?>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-3 "   >
                  <div>
                  
                      <br/><br/>
                   <center><img  src="<?php echo base_url()?>User/img/ndf.png" height="200px" width="200px">
                   </center>
                  </div>
                </div>
                    <?php
              }
              else
              {
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
                <?php
              }
              ?>
            </div>
              <?php
                if($showmore==1) 
                { ?>
                  <center><a href="?id=<?php echo $_GET["id"] ?>&showmore=<?php echo  count($book)+3 ?>" class="btn btn-secondary " id="showmore" style="padding-top:5px" ><h4>Show More</h4></a></center>
                <?php
                }
              ?>
          </div>
          <div class="col-lg-3 col-md-4 order-md-1">
            <!-- Side Menu-->
            <div class="padding-top-3x hidden-md-up"></div>
            <div class="card rounded-bottom-0" data-filter-list="#components-list">
              <div class="card-body pb-3">
                <div class="widget mb-4">
                  <div class="input-group form-group"><span class="input-group-btn">
                      <button class="btn" type="submit" disabled><i class="icon-search"></i></button></span>
                    <input class="form-control" type="text" placeholder="Search components">
                  </div>

                </div>
                <h4 style="font-family: Palatino Linotype;color:CornflowerBlue;"><b><?php echo $catname["CategoryName"]?></b></h4>

              </div>
            </div>
              <nav class="list-group" id="components-list">
                <?php
                  foreach ($data as  $value)
                  {
                    if( isset($subcat) && $value["SubCategoryName"]==$subcat["SubCategoryName"])
                    { ?>
                       <a style="background-color:Lavender" class="list-group-item list-group-item-action" href="<?php echo base_url()?>user_c/booksofsubcat?id=<?php echo base64_encode($value["SubCategoryId"]) ?>&cid=<?php echo base64_encode($catname["CategoryId"]) ?>" data-filter-item="pt"><?php echo $value["SubCategoryName"]?></a>
                   <?php
                    }
                    else
                    { ?>
                       <a class="list-group-item list-group-item-action" href="<?php echo base_url()?>user_c/booksofsubcat?id=<?php echo base64_encode($value["SubCategoryId"]) ?>&cid=<?php echo base64_encode($catname["CategoryId"]) ?>" data-filter-item="pt"><?php echo $value["SubCategoryName"]?></a>
                    <?php
                    }
                ?>
                   
                <?php
                  }
                ?>
              </nav>
            <div class="padding-bottom-1x hidden-md-up"></div>
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


    $("#showmore").click(function(){
      //alert("ok");
      var e=$("#limit").val();

      var limit= parseInt(e)+3;
      var catid=$(this).attr("catid");
      
     // alert(catid);
       $.ajax({
        url:"<?php echo base_url() ?>user_c/showmore",
        method:"post",
        data:{limit:limit,e:e,catid:catid},
        success:function(data){
          $("#data").html(data);
          if(data==" ")
          {
            $("#showmore").hide();
          }
        }
      });


       $.ajax({
        url:"<?php echo base_url() ?>user_c/showmore",
        method:"post",
        data:{l:e,limit:limit,e:e,catid:catid},
        success:function(data){
          $("#data").html(data);
          if(data=="true")
          {
            $("#showmore").hide();
          }
        }
      });


    });


    


  });
    </script>
 
    <!-- Customizer scripts-->
    
  </body>


</html>