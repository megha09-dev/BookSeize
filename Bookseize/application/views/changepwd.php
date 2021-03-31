<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view("LoadCSS"); ?>
   <script type="text/javascript" src="<?php echo base_url() ?>js/validation.js"></script>
 <link rel="icon" href="<?php echo base_url();?>User/img/logo/bs_favicon.png" type="image/x-icon">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view("header"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view("sidebar"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
      
      </h1><br>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->
  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- Horizontal Form -->
          <div class="box">
          <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>others/pwdupdate">
              <div class="box-body">
                <div class="form-group ">
                  <label  class="col-sm-2 control-label">Current Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="txtcurpwd" name="txtcurpwd">
                    <label id="lblcurpwd" style="color:red"> </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">New Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="txtnewpwd" name="txtnewpwd">
                    <label></label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Confirm Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" onblur='return ValidatePassword("txtnewpwd", "txtconpwd", "lblconpwd");' id="txtconpwd" name="txtconpwd" >
                    <label id="lblconpwd" style="color:red" ></label>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" id="btnchnge" name="btnchnge" class="btn btn-primary">Change</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
       </div>
     </div>
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view("footer"); ?>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php $this->load->view("LoadJs"); ?>
<script type="text/javascript">
  $(document).ready(function(){
    // ajax call for current pwd
     $("#txtcurpwd").blur(function(){
      curpwd=$(this).val();

        $.ajax({
        url:"<?php echo base_url() ?>others/checkpwd",
        method:"post",
        data:{curpwd:curpwd},
        success:function(data){
          $("#lblcurpwd").html(data);

        }
      });
    });

  });
</script>
</body>
</html>
