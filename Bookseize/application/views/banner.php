<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view("LoadCSS"); ?>
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
  <script type="text/javascript" src="<?php echo base_url() ?>js/validation.js"></script>
   <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/all.css">
  <!-- iCheck 1.0.1 -->
   <link rel="icon" href="<?php echo base_url();?>User/img/logo/bs_favicon.png" type="image/x-icon">
<script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
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
        Banner
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Banner</li>
      </ol>
    </section>

    <!-- Model for Add Category -->

    <div class="modal fade" id="modal-default1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Banner</h4>
              </div>
              <div class="modal-body">
                <p><form action="<?php echo base_url();?>others/addbanner" enctype="multipart/form-data" method="post">
                  <input type="file" accept="image/*" class="form-control" name="filename" id="filename" >
                  <label id="lblfile" style="color: red"></label>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="btnaddbanner" value="Add Banner" onclick='return ValidateFileUpload("filename","lblfile");'>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
    <!--End Modal-->
    <form action="<?php echo base_url();?>others/deleteselectedbanner" method="post">
       <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
              <a style="float:right;" data-toggle="modal" data-target="#modal-default1" href="<?php echo base_url();?>"><input type="submit" class="btn btn-primary" name="btnaddbanner" value="Add Banner"></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" class="checkall" name="deleteall"></th>
                  <th class="tbl-text-formatleft" >Banner Image</th>
                  <th class="tbl-text-format" >Active</th>
                  <th  class="tbl-text-format" >Created On</th>
                  <th  class="tbl-text-format" >Action</th>
                </tr>
                </thead>
                <tbody>
          <?php
            foreach ($data as $value) 
            {
          ?>
              <tr>
                  <td><input type="checkbox" name="delete[]" value="<?php echo $value["BannerId"]?>" class="check" multiple=""></td>
                  <td class="tbl-text-formatleft" ><img src="<?php echo base_url()?>banner_images/<?php echo $value["ImageName"]?>" height="80px" width="70px"></td>
                  <td class="tbl-text-format" >
                    <?php
                        if($value["IsActive"]==1)
                        {
                          ?>
                          <a href="<?php echo base_url();?>others/isactive?id=<?php echo $value["BannerId"]?>&status=<?php echo $value["IsActive"]?>">
                            <i class="fa fa-check"></i>
                          </a>
                    <?php
                        }
                        else
                        {
                          ?>
                           <a class="tbl-text-format" href="<?php echo base_url();?>others/isactive?id=<?php echo $value["BannerId"]?>&status=<?php echo $value["IsActive"]?>">
                          <i class="fa fa-close"></i>
                        </a>
                          <?php
                        }
                      ?>
                    </td>
                    <td class="tbl-text-formatleft" ><?php echo $value["CreatedOn"]?></td>

                  <td class="tbl-text-format" >     
                    <a onclick="return confirm('Are you sure you want to Remove?');" title="Delete Banner" href="<?php echo base_url();?>others/deletebanner?id=<?php echo $value["BannerId"]?>"> <i class="fa fa-trash"></i> </a>&nbsp;&nbsp;&nbsp;
                  </td>
                </tr>
          <?php
            }
          ?>
                </tbody>
                
              </table>
              <input type="submit" class="btn btn-primary" name="btndeletebanner" value="Delete Selected"></a>
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
<!-- DataTables -->
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
