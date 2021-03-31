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
     <script type="text/javascript" src="<?php echo base_url() ?>js/validation.js"></script>
    <!-- Modernizr-->
    <script src="<?php echo base_url();?>User/js/modernizr.min.js"></script>
    <script type="text/javascript">
  
  function validate()
  {

      if(document.getElementById("lblemail").innerHTML!="")
      {
          return false;
      }
      else if(document.getElementById("lblcno").innerHTML!="")
      {
          return false;
      }
      else if(document.getElementById("lblcpwd").innerHTML!="")
      {
          return false;
      }

  }
</script>
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
            <h1>Login / Register Account</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url()?>user_c">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="">Account</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Login / Register</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <div class="col-md-6">
            <form class="login-box" method="post" action="<?php echo base_url()?>user_c/login">
              <h4 class="margin-bottom-1x">Login</h4>
              <div class="form-group input-group">
                <input class="form-control" type="email" name="txtemail" placeholder="Email" value="<?php if (!is_null($this->input->cookie('EmailId'))) echo $this->input->cookie('EmailId',true); ?>" required><span class="input-group-addon"><i class="icon-mail"></i></span>
              </div>
              <div class="form-group input-group">
                <input class="form-control" type="password" name="txtpwd" placeholder="Password" required><span class="input-group-addon"><i class="icon-lock"></i></span>
              </div>
              <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                <div class="custom-control custom-checkbox">
                 
                </div><a class="navi-link" href="<?php echo base_url()?>u_c/forgotpwd">Forgot password?</a>
              </div>
              <div class="text-center text-sm-right">
                <input class="btn btn-primary margin-bottom-none" name="btnlogin" type="submit" value="Login">
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <div class="padding-top-3x hidden-md-up"></div>
            <h3 class="margin-bottom-1x">No Account? Register</h3>
            <p>Registration takes less than a minute but gives you full control over your orders.</p>
            <form class="row" method="post" action="<?php echo base_url()?>user_c/register" enctype="multipart/form-data">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-fn">First Name</label>
                  <input class="form-control" name="txtfname" type="text" id="reg-fn" required onkeypress ='return CharsOnly(event);'>
                  <label style="color:red" id="lblfname" ></label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ln">Last Name</label>
                  <input class="form-control" name="txtlname" type="text" id="reg-ln" required onkeypress ='return CharsOnly(event);'>
                  <label style="color:red" id="lbllname" ></label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-email">E-mail Address</label>
                  <input class="form-control" type="email" name="txtemail" id="reg-email" required>
                  <label style="color:red" id="lblemail" ></label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-phone">Contatct Number</label>
                  <input class="form-control" type="text" name="txtcno" id="reg-phone" required onkeypress ='return NumbersOnly(event);' maxlength="10">
                  <label style="color:red" id="lblcno" ></label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-pass">Password</label>
                  <input class="form-control" type="password" name="txtpwd" id="reg-pass" required>
                  <label style="color:red" id="lblpwd" ></label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-pass-confirm">Confirm Password</label>
                  <input class="form-control" type="password" name="txtcpwd" id="reg-pass-confirm" required onblur='return ValidatePassword("reg-pass", "reg-pass-confirm", "lblcpwd");'>
                  <label style="color:red" id="lblcpwd" ></label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-pass-confirm">Upload Image</label>
                  <input class="form-control" type="file" name="txtimg" id="reg-img">
                  <label style="color:red" id="lblimg"></label>
                </div>
              </div>
              <div class="col-sm-6 text-center text-sm-right">
                <input class="btn btn-primary margin-bottom-none" name="btnregister" type="submit" value="Register" onclick='return validate("");'>
              </div>
            </form>
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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
               
  if($this->session->flashdata("error")==true)
  { ?>

    <script type="text/javascript">
      swal("Invalid!", "Invalid Password Or Email", "error");
    </script>

  <?php
  } 
  if($this->session->flashdata("success")==true)
  {
    ?>
      <script type="text/javascript">
      swal("Welcome", "You are Registered", "success");
    </script>
  <?php
  }
?>
  <script type="text/javascript">
    $(document).ready(function(){
      //ajax for already exits email
         $("#reg-email").blur(function(){
        email=$(this).val();

        $.ajax({
        url:"<?php echo base_url() ?>validation_c/checkmail",
        method:"post",
        data:{email:email},
        success:function(data){
          $("#lblemail").html(data);
        }
      });
    });

      //ajax for already exits cno
       $("#reg-phone").blur(function(){
        cno=$(this).val();

        $.ajax({
        url:"<?php echo base_url() ?>validation_c/checkcno",
        method:"post",
        data:{cno:cno},
        success:function(data){
          $("#lblcno").html(data);
        }
      });
    });
    });
  </script>
  </body>


</html>