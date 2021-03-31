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
        Publisher
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Publisher</li>
      </ol>
    </section>

    <!--Edit Publisher-->
    <div class="modal fade" id="editpublishermodel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Publisher </h4>
              </div>
              <div class="modal-body" >
                <p><form action="<?php echo base_url();?>book_c/updatepub" method="post">
                  <div id="form-data-frm" > 
                   <!--  <input type="text" class="form-control" name="txtname" placeholder="Enter Subcategory Name">
                  <input type="hidden" name="catid" id="catid" > -->
                  </div>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="btneditpub" value="Edit Publisher">
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>

   <!-- Model for Add Publisher -->

    <div class="modal fade" id="modal-default1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Publisher</h4>
              </div>
              <div class="modal-body">
                <p><form action="<?php echo base_url();?>book_c/addpublisher" method="post">
                  <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Enter Publisher Name" onkeypress ='return CharsOnly(event);'>
                  <label id="lblname" style="color:red"></label>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" onclick='return validate("lblname");' name="btnaddpub" value="Add Publisher">
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
    <!-- End Modal -->
    <!-- Main content -->
    <form action="<?php echo base_url();?>book_c/deleteselectedpub" method="post">
       <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
              <a style="float:right;" data-toggle="modal" data-target="#modal-default1" href="<?php echo base_url();?>"><input type="button" class="btn btn-primary" name="btnaddpub" value="Add Publisher"></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="col-xs-12 ">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center><input type="checkbox" class="checkall" name="deleteall"></center></th>
                  <th class="tbl-text-formatleft" >Publisher Name</th>
                  <th class="tbl-text-format" >Created On</th>
                  <th class="tbl-text-format" >Action</th>                  
                </tr>
                </thead>
                <tbody>
          <?php
            foreach ($data as $value) 
            {
          ?>
              <tr>
                  <td align="center"><input type="checkbox" name="delete[]" value="<?php echo $value["PublisherId"]?>" class="check" multiple=""></td>
                  <td class="tbl-text-formatleft" ><?php echo $value["PublisherName"]?></td>
                  <td class="tbl-text-format" ><?php echo $value["CreatedOn"]?></td>

                  <td class="tbl-text-format" >

                   <a onclick="return confirm('Are you sure you want to Remove?');" title="Delete Publisher" href="<?php echo base_url();?>book_c/deletepublisher?id=<?php echo $value["PublisherId"]?>"> <i class="fa fa-trash"></i> </a>&nbsp;&nbsp;&nbsp;

                    <a title="Edit Publisher" editpubid="<?php echo $value["PublisherId"] ?>" data-toggle="modal" class="editpub" data-target="#editpublishermodel"  
                      ><i class="fa fa-edit"></i> </a>
                        </td>
                </tr>
          <?php
            }
          ?>
                </tbody>
                
              </table>
            </div>
              <input type="submit" class="btn btn-primary" name="btndeletecat" value="Delete Selected" onclick="return confirm('Are you sure you want to Remove?');"></a>
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
    //ajax call for publisher
     $("#txtname").blur(function(){
      pub=$(this).val();

        $.ajax({
        url:"<?php echo base_url() ?>book_c/checkpub",
        method:"post",
        data:{pub:pub},
        success:function(data){
          $("#lblname").html(data);

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
