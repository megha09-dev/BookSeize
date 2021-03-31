<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BookSeize</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
 <link rel="icon" href="<?php echo base_url();?>User/img/logo/bs_favicon.png" type="image/x-icon">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script type="text/javascript" src="<?php echo base_url() ?>js/validation.js"></script>
<script type="text/javascript">
  
  function validate(LabelId)
  {

      if(document.getElementById(LabelId).innerHTML!="")
      {
          return false;
      }

  }
</script>

</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href=""><b><u>Book</u></b><u>Seize</u></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Forgot Password</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" style="margin-left:10px" method="post" action="<?php echo base_url();?>admin_c/otp">
      <div class="input-group">
        <input type="text" class="form-control" name="txtemail" id="txtemail" placeholder="Enter Email Address" >
        <label style="color:red" id="lblemail" ></label>

        <div class="input-group-btn">
          <button type="submit" name="btnfpwd" class="btn btn-primary"><i class="fa fa-arrow-right text-muted" onclick='return validate("lblemail");' onkeypress ='return ValidateEmailID("txtemail","lblemail");'></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // ajax call for email
     $("#txtemail").blur(function(){
      email=$(this).val();

        $.ajax({
        url:"<?php echo base_url() ?>admin_c/checkemail",
        method:"post",
        data:{email:email},
        success:function(data){
          $("#lblemail").html(data);
        }
      });
    });
   });
</script>
</body>
</html>
