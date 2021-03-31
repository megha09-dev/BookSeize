<html>
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
    <script type="text/javascript" src="<?php echo base_url() ?>js/validation.js"></script>
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
<body>

<header class="navbar navbar-sticky">
  <div class="account" >
    
  </div>
<div class="site-branding">
        <div class="inner">
          <!-- Site Logo-->
          <a href="<?php echo base_url()?>user_c">
    <i class="fas fa-arrow-left"  style="margin-top:30px;margin-left:10px;font-size:20px"></i></a><a class="site-logo" href="<?php echo base_url();?>user_c"><img src="<?php echo base_url();?>User/img/logo/logo.png" style="width: 230px;height: 55px;" alt="Unishop"></a>
        </div>
 </div>
</header>
<div class="offcanvas-wrapper" style="margin-top: 25px;">
<h3 style="color: grey;"><center> Add Book Details</center></h3>
  <br>
  <form method="post" action="<?php echo base_url()?>u_c/sellbookdata" enctype="multipart/form-data">
    <div class="row offset-1 mr-1">
    
      <div class="col-md-5"> 
        <div class="form-group">
          <label for="txtbname" >Book Name</label>
          <input type="text" name="txtbname" id="txtbname" class="form-control" placeholder="Enter Book Name" required>

        </div>
      </div>
          <div class="col-md-5"> 
        <div class="form-group">
          <label for="txtauthor" >Author Name</label>
          <input type="text" id="txtauthor" name="txtauthor" class="form-control" placeholder="Enter Author Name" required="" onkeypress ='return CharsOnly(event);'>
          
        </div>
      </div>
          <div class="col-md-5"> 
        <div class="form-group">
          <label for="Category" >Category</label>
           <select class="form-control" id="Category" name="ddcat" >
            <option selected="selected" disabled="">Select Category
            <?php 
                  foreach ($cat as $value)
                  {
                  ?>
                     <option value="<?php echo $value["CategoryId"] ?>" ><?php echo $value["CategoryName"] ?></option>
                  <?php
                 }
                  ?>
            </option>
           </select>
          
        </div>
      </div>
          <div class="col-md-5"> 
        <div class="form-group">
          <label for="sub-category" >Subcategory</label>
           <select class="form-control" id="sub-category" name="ddsubcat">
            <option selected="selected" disabled="">Select SubCategory
              
            </option>
           </select>
        </div>
      </div>
          <div class="col-md-5"> 
        <div class="form-group">
          <label for="publisher" >Publisher</label>
          <select class="form-control" id="publisher" name="ddpub">
            <option selected="selected" disabled="">Select Publisher
            <?php 
                  foreach ($pub as $value)
                  {
                  ?>
                    <option value="<?php echo $value["PublisherId"] ?>" ><?php echo $value["PublisherName"] ?></option>
                  <?php
                  }
                  ?>  
            </option>
           </select>
          
        </div>
      </div>

      

        <div class="col-md-5"> 
          <div class="form-group">
          <label for="txtlang" >Language</label>
        <select  name="ddlang" id="txtlang" class="form-control">
              <option selected="selected" disabled="" >Select Language </option>
              <option value="English" >English</option>
              <option value="Hindi" >Hindi</option>
              <option value="Gujarati" >Gujarati</option>
            </select>
          
          </div>
        </div>
        
        <div class="col-md-5"> 
          <div class="form-group">
          <label for="txtedition" >Edition</label>
          <input type="text" id="txtedition" name="txtedition" class="form-control" placeholder="Enter Edition">
          </div>
        </div>

    <div class="col-md-5"> 
        <div class="form-group">
          <label for="txtqty" >Quantity</label>
          <input type="number"  id="txtqty" name="txtqty" class="form-control" placeholder="Enter Quantity">
          </div>
      </div>
        
      <div class="col-md-5"> 
          <div class="form-group">
          <label for="txtoprice" >Original Price</label>
          <input type="text" name="txtoprice" id="txtoprice" class="form-control" placeholder="Enter Original Price" onkeypress ='return NumbersOnly(event);'> 
          </div>
      </div>
      
      <div class="col-md-5"> 
        <div class="form-group">
          <label for="txtsprice" >Sale Price</label>
          <input type="text" id="txtsprice" name="txtsprice" class="form-control" placeholder="Enter Sale Price" required onkeypress ='return NumbersOnly(event);'>   
        </div>
      </div>

      <div class="col-md-5"> 
        <div class="form-group">
        <label for="txtisbn" >ISBN No</label>
        <input type="text" name="txtisbn" id="txtisbn" class="form-control" placeholder="Enter ISBN No">  
        </div>
      </div>

      <div class="col-md-5"> 
          <div class="form-group">
          <label >New</label>
          <input type="checkbox" name="chknew" id="chknew" style="margin-top: 5px;" >   
        </div>
      </div>
  
    
      
      <div class="col-md-5"> 
        <div class="form-group">
        <label for="txtdesc" >Description</label>
        <textarea name="txtdesc" id="txtdesc" class="form-control" placeholder="Enter..."></textarea>     
        </div>
      </div>

      <div class="col-md-5"> 
        <div class="form-group">
          <label for="filebook" >Upload Book Image</label><br> &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="file" name="filebook" id="filebook">       
        </div>
      </div>

    </div>
    <div class="row>">
      <div class="col-md-12 offset-10">
      <input type="submit" name="btnaddbook" value="Add Book" class="btn btn-primary">
      </div>
    </div>
  </form>
  <?php $this->load->view("user/footer");?>
  </div>
   <script src="<?php echo base_url();?>User/js/vendor.min.js"></script>
    <script src="<?php echo base_url();?>User/js/scripts.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){

      $("#Category").change(function(){


        var cat = $(this).val();
        //alert(cat);
        $.ajax({
          url:"<?php echo base_url() ?>u_c/getsubcategory",
          method:"post",
          data:{catid:cat},
          success:function(data){
            //alert(data);
            $("#sub-category").html(data);
          }
        });
      });
    });
</script>
</body>
</html>
