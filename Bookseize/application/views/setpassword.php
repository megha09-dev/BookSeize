<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BookSieze</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="icon" href="<?php echo base_url();?>User/img/logo/bs_favicon.png" type="image/x-icon">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript" src="<?php echo base_url() ?>js/validation.js"></script>
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href=""><b><u>Book</u></b><u>seize</u></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"></div>

  <!-- START LOCK SCREEN ITEM -->
  <form class="form-horizontal" method="post" action="<?php echo base_url() ?>others/pwdupdate">
              <div class="">
               
                <div class="form-group">
                  <label class="col-sm-5 control-label">New Password</label>

                  <div class="col-sm-7">
                    <input type="password" class="form-control" id="txtnewpwd" name="txtnewpwd">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label">Confirm Password</label>

                  <div class="col-sm-7">
                    <input type="password" class="form-control" id="txtconpwd" name="txtconpwd" onblur='return ValidatePassword("txtnewpwd", "txtconpwd", "lblconpwd");'>
                    <label id="lblconpwd" style="color:red" ></label>
                  </div>
                </div>
              </div>
                 
                <center><button type="submit" class="btn btn-primary">Change</button></center>
              
            </form>
  <!-- /.lockscreen-item -->
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
