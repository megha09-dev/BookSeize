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
        SubCategory of
        <small> <?php echo $catname["CategoryName"] ?> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="<?php echo base_url() ?>home/category">Category</a></li>
        <li class="active" >Sub category</li>
      </ol>
    </section>

    <!--Edit-->
    <div class="modal fade" id="editsubcategorymodel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Subcategory </h4>
              </div>
              <div class="modal-body" >
                <p><form action="<?php echo base_url();?>home/updatesubcat" method="post">
                  <div id="form-data-frm" > 
                   <!--  <input type="text" class="form-control" name="txtname" placeholder="Enter Subcategory Name">
                  <input type="hidden" name="catid" id="catid" > -->
                  </div>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="btneditsubcat" value="Edit Subcategory">
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>

    <!-- Main content -->
    <form action="<?php echo base_url();?>home/deleteselectedsubcat" method="post">
      <input type="hidden" name="categoryid" value="<?php echo $catname["CategoryId"]; ?>" >
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
                  <th><center><input type="checkbox" class="checkall" name="deleteall"></center></th>
                  <th class="tbl-text-formatleft">SubCategory Name</th>
                  <th class="tbl-text-format">Active</th>
                  <th class="tbl-text-format">Action</th>                  
                </tr>
                </thead>
                <tbody>
          <?php
            foreach ($data as $value) 
            {
          ?>
              <tr>
                <td align="center"><input type="checkbox" name="delete[]" value="<?php echo $value["SubCategoryId"]?>" class="check" multiple=""></td>
                  <td class="tbl-text-formatleft"><?php echo $value["SubCategoryName"]?></td>
                  <td class="tbl-text-format">
                    <?php
                        if($value["IsActive"]==1)
                        {
                          ?>
                          <a href="<?php echo base_url();?>home/isactivesub?id=<?php echo $value["SubCategoryId"]?>&status=<?php echo $value["IsActive"]?>">
                            <i class="fa fa-check"></i>
                          </a>
                    <?php
                        }
                        else
                        {
                          ?>
                           <a href="<?php echo base_url();?>home/isactivesub?id=<?php echo $value["SubCategoryId"]?>&status=<?php echo $value["IsActive"]?>">
                          <i class="fa fa-close"></i>
                        </a>
                          <?php
                        }
                      ?>
                  <td class="tbl-text-format">
                    <a onclick="return confirm('Are you sure you want to Remove?');" title="Delete Category" href="<?php echo base_url();?>home/deletesubcategory?id=<?php echo $value["SubCategoryId"]?>"> <i class="fa fa-trash"></i> </a>&nbsp;&nbsp;&nbsp;

                    <a title="Edit Category" editcatid="<?php echo $value["SubCategoryId"] ?>"  data-toggle="modal" class="editcat" data-target="#editsubcategorymodel">
                          <i class="fa fa-edit"></i> </a>
                  </td>
                
                </tr>
          <?php
            }
          ?>
                </tbody>
                
              </table>
              <input type="submit" class="btn btn-primary" name="btndeletesubcat" value="Delete Selected" onclick="return confirm('Are you sure you want to Remove?');"></a>
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
       immedIsActivetely after the control sidebar -->
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


   // ajax call for edit category data


    $(".editcat").click(function(){
      var catid= $(this).attr("editcatid");
      //alert(catid);
      $.ajax({
        url:"<?php echo base_url() ?>home/editsubcatdata",
        method:"post",
        data:{catid:catid},
        success:function(data){
          $("#form-data-frm").html(data);
        }
      });

    });

    $(".checkall").on('change',function(){
   $(".check").prop('checked',$(this).is(":checked"));
  });

  $(".check").on('change',function(){
   $(".checkall").prop("checked", false);
  });
</script>
</body>
</html>
