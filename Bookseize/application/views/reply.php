<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view("LoadCSS"); ?>
   <style type="text/css">
    .bold{
      font-weight: bold;
    }
  </style>
   <link rel="icon" href="<?php echo base_url();?>User/img/logo/bs_favicon.png" type="image/x-icon">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
        Reply
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reply</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="container">
      <section class="invoice">
      <div class="row">  
        <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-user"></i>  <?php echo $data["FirstName"]." ".$data["LastName"];?>
            </h2>
          </div>
          <div class="row invoice-info">
            <div class="col-sm-6 invoice-col" style="">
              <label class="bold">Book Name :</label> <?php echo $data["BookName"]?>
              <br/><br/>
              <label class="bold">Person Name : </label><?php echo $data["PersonName"]?>
              <br/><br/>
              <label class="bold">Description :</label> <?php echo $data["Description"]?>
              <br/><br/>
            </div>
          <!-- /.col -->
          </div>
          <div class="box ">
            <div class="box-header">
              <h3 class="box-title">
                Subject : <?php echo $data["Subject"];?>
              </h3>
              <!-- tools box -->
              <!--<div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>--.
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form method="post" action="<?php echo base_url()?>others/reply">
                <input type="hidden" name="txtid" value="<?php echo $data["InquiryId"];?>">
                <div class="row" >
                  <div class="col-md-10" >
                     <div class="box-body pad">
                        <textarea id="editor1" name="txtreply" rows="10" cols="80">
                                        
                        </textarea>
                          <button style="margin-top:10px;padding-left:30px;padding-right:30px" type="submit" class="btn btn-primary" name="btnreply"><i class="fa fa-paper-plane"></i></button>
                      </div>
                     
                  </div>
                </div>
               
                   
            
              </form>
          </div>         
          <!-- /.box -->
             
                 
        </div>
      </div>
      </section>
    </div>    
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
<!-- CK Editor -->
<script src="<?php echo base_url();?>bower_components/ckeditor/ckeditor.js"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor

  })
</script>
</body>
</html>
