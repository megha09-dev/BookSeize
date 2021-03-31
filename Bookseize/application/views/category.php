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
   <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/all.css">
  <!-- iCheck 1.0.1 -->
   <script type="text/javascript" src="<?php echo base_url() ?>js/validation.js"></script>
<script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
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
        Category
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category</li>
      </ol>
    </section>

    <!-- Model for Add Category -->

    <div class="modal fade" id="modal-default1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Category</h4>
              </div>
              <div class="modal-body">
                <p><form action="<?php echo base_url();?>/home/addcategory" method="post">
                  <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Enter Category Name" onkeypress ='return CharsOnly(event);'>
                  <label style="color:red" id="lblcat" ></label>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" id="btnaddcat" onclick='return validate("lblcat");' class="btn btn-primary" name="btnaddcat" value="Add Category">
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
    <!-- End Modal -->


    <!-- Edit category  -->

    <div class="modal fade" id="editsubcategorymodel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Category </h4>
              </div>
              <div class="modal-body" >
                <p><form action="<?php echo base_url();?>/home/updatecat" method="post">
                  <div id="form-data-frm" > 
                   <!--  <input type="text" class="form-control" name="txtname" placeholder="Enter Subcategory Name">
                  <input type="hidden" name="catid" id="catid" > -->
                  </div>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary"  name="btneditcat" value="Edit Category">
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>


    <!--Modal for Add subcategory-->
    <div class="modal fade" id="addsubcategorymodel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Subcategory </h4>
              </div>
              <div class="modal-body">
                <p><form action="<?php echo base_url();?>home/addsubcategory" method="post">
                  <input type="text" class="form-control" id="txtsubname" onkeypress ='return CharsOnly(event);' name="txtname" placeholder="Enter Subcategory Name">
                   <label style="color:red" id="lblsubcat" ></label>
                  <input type="hidden" name="catid" id="categoryid" >
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" onclick='return validate("lblsubcat");' name="btnaddsubcat" value="Add Subcategory">
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
    <!--End Modal-->
    <form action="<?php echo base_url();?>home/deleteselectedcat" method="post">
       <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
              <a style="float:right;" data-toggle="modal" data-target="#modal-default1" href="<?php echo base_url();?>"><input type="button" class="btn btn-primary" name="btnaddcat" value="Add Category"></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center><input type="checkbox" class="checkall" name="deleteall"></center></th>
                  <th class="tbl-text-formatleft" >Category Name</th>
                  <th class="tbl-text-format" >Active</th>
                  <th  class="tbl-text-format" >Sub Category</th>
                  <th class="tbl-text-format" >Action</th>
                  
                </tr>
                </thead>
                <tbody>
          <?php
            foreach ($data as $value) 
            {
          ?>
              <tr>
                  <td align="center"><input type="checkbox" name="delete[]" value="<?php echo $value["CategoryId"]?>" class="check" multiple=""></td>
                  <td class="tbl-text-formatleft" ><?php echo $value["CategoryName"]?></td>
                  <td class="tbl-text-format" >
                    <?php
                        if($value["IsActive"]==1)
                        {
                          ?>
                          <a href="<?php echo base_url();?>home/isactive?id=<?php echo $value["CategoryId"]?>&status=<?php echo $value["IsActive"]?>">
                            <i class="fa fa-check"></i>
                          </a>
                    <?php
                        }
                        else
                        {
                          ?>
                           <a class="tbl-text-format" href="<?php echo base_url();?>home/isactive?id=<?php echo $value["CategoryId"]?>&status=<?php echo $value["IsActive"]?>">
                          <i class="fa fa-close"></i>
                        </a>
                          <?php
                        }
                      ?>
                    </td>
                  <td class="tbl-text-format"><a title="View Subcategory" style="font-size:22px" href="<?php echo base_url();?>home/subcategory?id=<?php echo $value["CategoryId"]?>">
                          <i class="fa fa-list-alt"></i></td>

                  <td class="tbl-text-format" ><a class="addcategorylink" catid="<?php echo $value["CategoryId"]; ?>" data-toggle="modal" data-target="#addsubcategorymodel" title="Add Subcategory" ><i class="fa fa-plus"></i></a> &nbsp;&nbsp;&nbsp;

                     <a onclick="return confirm('Are you sure you want to Remove?');" title="Delete Category" href="<?php echo base_url();?>home/deletecategory?id=<?php echo $value["CategoryId"]?>"> <i class="fa fa-trash"></i> </a>&nbsp;&nbsp;&nbsp;

                    <a title="Edit Category" editcatid="<?php echo $value["CategoryId"] ?>" data-toggle="modal" class="editcat" data-target="#editsubcategorymodel"  
                      ><i class="fa fa-edit"></i> </a>
                        </td>
                </tr>
          <?php
            }
          ?>
                </tbody>
                
              </table>
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
<!-- DataTables -->

<script type="text/javascript">
  $(document).ready(function(){
    $(".addcategorylink").click(function(){
      var catid = $(this).attr("catid");
      //alert(catid);
      $("#categoryid").val(catid);
    });



    // ajax call for edit category data


    $(".editcat").click(function(){
      var catid= $(this).attr("editcatid");
      //alert(catid);
      $.ajax({
        url:"<?php echo base_url() ?>home/editcatdata",
        method:"post",
        data:{categoryid:catid},
        success:function(data){
          $("#form-data-frm").html(data);
        }
      });

    });

    // ajax call for exits cat
    $("#txtname").blur(function(){
      cat=$(this).val();

        $.ajax({
        url:"<?php echo base_url() ?>home/checkCat",
        method:"post",
        data:{catname:cat},
        success:function(data){
          $("#lblcat").html(data);
        }
      });
    });

    // ajax call for exits subcat
     $("#txtsubname").blur(function(){
      subcat=$(this).val();

        $.ajax({
        url:"<?php echo base_url() ?>home/checkSubCat",
        method:"post",
        data:{subcatname:subcat},
        success:function(data){
          $("#lblsubcat").html(data);
        }
      });
    });
  });

  //delete all
  $(".checkall").on('change',function(){
   $(".check").prop('checked',$(this).is(":checked"));
  });

  $(".check").on('change',function(){
   $(".checkall").prop("checked", false);
  });





</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addo
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

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
