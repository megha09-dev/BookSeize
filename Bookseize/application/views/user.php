<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view("LoadCSS"); ?>
   <link rel="icon" href="<?php echo base_url();?>User/img/logo/bs_favicon.png" type="image/x-icon">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <style type="text/css">
    .tbl-text-format{
      text-align:center;
      font-size:18px;
    }
    .tbl-text-formatleft{
      text-align:left;
      font-size:18px;
    }
  </style>

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
        User
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="">User</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <form  method="post">
       <section class="content">
        <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="tbl-text-formatleft">Name</th>
                  <th class="tbl-text-formatleft">Email Id</th>
                  <th class="tbl-text-formatleft">Contact No</th>
               
                  <th class="tbl-text-formatleft">Created On</th>
                  <th class="tbl-text-format" >Varified</th>
                  <th  class="tbl-text-format" >Balance</th>
                  <th class="tbl-text-format" >Block</th>
                  
                </tr>
                </thead>
                <tbody>
          <?php
            foreach ($data as $value) 
            {
          ?>
              <tr>
                  <td class="tbl-text-formatleft" ><?php echo $value["FirstName"]." ".$value["LastName"]?></td>
                  <td class="tbl-text-formatleft" ><?php echo $value["EmailId"]?></td>
                  <td class="tbl-text-formatleft" ><?php echo $value["ContactNo"]?></td>
                  <td class="tbl-text-formatleft" ><?php echo $value["CreatedOn"]?></td>
                  <td class="tbl-text-formatleft" ><?php
                        if($value["IsVarified"]==1)
                        {
                          ?>
                            <i class="fa fa-check"></i>
                          </a>
                    <?php
                        }
                        else
                        {
                          ?>
                          <i class="fa fa-close"></i>
                        </a>
                          <?php
                        }
                      ?></td>
                  <td class="tbl-text-formatleft" ><?php echo $value["Balance"]?></td>
                  <td class="tbl-text-format" >
                    <?php
                        if($value["IsBlock"]==1)
                        {
                          ?>
                          <a href="<?php echo base_url();?>home/isblock?id=<?php echo $value["UserId"]?>&status=<?php echo $value["IsBlock"]?>">
                            <i class="fa fa-check"></i>
                          </a>
                    <?php
                        }
                        else
                        {
                          ?>
                           <a class="tbl-text-format" href="<?php echo base_url();?>home/isblock?id=<?php echo $value["UserId"]?>&status=<?php echo $value["IsBlock"]?>">
                          <i class="fa fa-close"></i>
                        </a>
                          <?php
                        }
                      ?>
                    </td>
                </tr>
          <?php
            }
          ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </form>
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
<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
