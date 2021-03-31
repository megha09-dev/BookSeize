<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view("LoadCSS"); ?>
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
        Book
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Books</li>
      </ol>
    </section>

  <!-- Main content -->
    <form action="<?php echo base_url();?>book_c/deleteselectedbook" method="post">
       <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
             <!-- <a style="float:right;"  href="<?php #echo base_url();?>book_c/addbook"><input type="button" class="btn btn-primary" name="btnaddpub" value="Add Book"></a> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <!--  <th><center><input type="checkbox" class="checkall" name="deleteall"></center></th>-->
                  <th class="tbl-text-format" > Image</th>
                  <th class="tbl-text-formatleft" > Book Name</th>
                  <th class="tbl-text-formatleft" > Author</th>
                  <th class="tbl-text-formatleft" > Sale Price (&#8377;)</th>
                  <th class="tbl-text-formatleft" > ISBN No</th>
                  <th class="tbl-text-format" >Action</th>                  
                </tr>
                </thead>
                <tbody>
          <?php
            foreach ($data as $value) 
            {
          ?>
              <tr>
                  <!--<td align="center"><input type="checkbox" name="delete[]" value="<?php #echo $value["BookId"]?>" class="check" multiple=""></td>-->
                  <td class="tbl-text-format" ><img src="<?php echo base_url();?>/Images/<?php echo $value["ImageName"]?>" height="80px" width="70px"></td>
                  <td class="tbl-text-formatleft" ><?php echo $value["BookName"]?></td>
                  <td class="tbl-text-formatleft" ><?php echo $value["Author"]?></td>
                  <td class="tbl-text-formatleft" ><?php echo $value["SalePrice"]?> &#8377;</td>
                  <td class="tbl-text-formatleft" ><?php echo $value["ISBNno"]?></td>          
                  <td class="tbl-text-format" >

                  <a title="View All Details" href="<?php echo base_url();?>book_c/viewallbookdetails?id=<?php echo $value["BookId"]?>"> <i class="fa fa-info-circle"></i> </a>&nbsp;&nbsp;&nbsp;

                  <!-- <a onclick="return confirm('Are you sure you want to Remove?');" title="Delete Book" href="<?php #echo base_url();?>book_c/deletebook?id=<?php #echo $value["BookId"]?>"> <i class="fa fa-trash"></i> </a>&nbsp;&nbsp;&nbsp;

                    <a title="Edit Book" href="<?php #echo base_url();?>book_c/dataforedit?id=<?php #echo $value["BookId"] ?>" ><i class="fa fa-edit"></i> </a>-->
                        </td>
                </tr>
          <?php
            }
          ?>
                </tbody>
                
              </table>
              <!--<input type="submit" class="btn btn-primary" name="btndeletecat" value="Delete Selected" onclick="return confirm('Are you sure you want to Remove?');"></a>-->
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
<script type="text/javascript">
  $(document).ready(function(){
    $(".editpub").click(function(){
      var pubid= $(this).attr("editpubid");
      //alert(catid);
      $.ajax({
        url:"<?php echo base_url() ?>book_c/editpubdata",
        method:"post",
        data:{pubid:pubid},
        success:function(data){
          $("#form-data-frm").html(data);
        }
      });

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
