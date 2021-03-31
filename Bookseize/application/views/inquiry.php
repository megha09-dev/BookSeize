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
      font-size:16px;
    }
    .tbl-text-formatleft{
      text-align:left;
      font-size:16px;
    }
    .modal.fade.in .lab-modal-body {
  bottom: 0;
  opacity: 1;
  z
}

.lab-modal-body h1 {
  font-size: 4rem;
}

.lab-modal-body p {
  margin: 0 0 1.62rem 0;
  line-height: 1.62;
  font-weight: 300;
  font-size: 1.62rem;
  color: #666;
}

.lab-modal-body {
  position: relative;
  bottom: -250px;
  margin: 150px auto 0;
  padding: 40px;
  max-width: 60%;
  height: auto;
  background-color: rgb(248, 250, 247);
  border: 1px solid #BEBEBE;
  opacity: 0;
  -webkit-transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
  -moz-transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
  -o-transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
  transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
}

.close {
  margin-top: -20px;
  margin-right: -20px;
  text-shadow: 0 1px 0 #ffffff;
}

.popup-button {
  margin-top: 70px;
}
  </style>
   <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/all.css">
  <!-- iCheck 1.0.1 -->
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
        Inquiry
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Inquiry</li>
      </ol>
    </section>
<!-- TO USE WITH WP NAV MENU: 
add 'lab-slide-up' to any nav menu item class 
-->

<!-- MODAL CONTENT SAMPLE STARTS HERE -->
<div class="modal fade" id="lab-slide-bottom-popup" data-keyboard="false" data-backdrop="false">
  <div class="lab-modal-body">
    <form action="<?php echo base_url()?>others/reply" method="post">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <div id="form-data-frm" > 
      </div>

  </form>

  </div>
  <!-- /.modal-body -->
</div>
<!-- /.modal -->
<!-- END MODAL CONTENT SAMPLE -->


<!-- SAMPLE NAVIGATION AND BUTTON ELEMENT END HERE -->
   <form action="" method="post">
       <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="tbl-text-format" >User Name</th>
                  <th  class="tbl-text-format" >Person Name</th>
                  <th  class="tbl-text-format" >Subject</th>
                  <th class="tbl-text-format">Description</th>
                  <th class="tbl-text-format">Inquiry On</th>
                  <th class="tbl-text-format">Reply</th>
                  <th class="tbl-text-format">Replied On</th>
                  <th class="tbl-text-format">Replied By</th>
                  <th class="tbl-text-format">Reply Description</th>
                  
                </tr>
                </thead>
                <tbody>
          <?php
            foreach ($data as $value) 
            {
          ?>
              <tr>
                <td class="tbl-text-formatleft" ><?php echo $value["FirstName"]." ".$value["LastName"]?></td>
                <td class="tbl-text-formatleft" ><?php echo $value["PersonName"]?></td>
                <td class="tbl-text-formatleft"><?php echo $value["Subject"]?></td>
                <td class="tbl-text-formatleft" ><?php echo $value["Description"]?></td>
                <td class="tbl-text-formatleft" ><?php echo $value["CreatedOn"]?></td>
                <td class="tbl-text-format" >
                    <?php
                        if($value["IsReplied"]==1)
                        {
                          ?>
                            <i class="fa fa-check"></i>
                    <?php
                        }
                        else
                        {
                          ?>
                          <a title="Reply" class="reply" replyid="<?php echo $value["InquiryId"] ?>"data-toggle="modal" data-target="#lab-slide-bottom-popup" >
                          <i class="fa fa-reply"></i>
                        </a>
                          <?php
                        }
                      ?>
                    </td>
                <td class="tbl-text-formatleft" ><?php echo $value["RepliedOn"]?></td>
                <td class="tbl-text-formatleft" ><?php echo $value["RepliedBy"]?></td>
                <td class="tbl-text-formatleft" ><?php echo $value["Reply"]?></td>
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
<!-- DataTables -->
<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
  // auto timer
  
  $(document).ready(function() {
    $('.lab-slide-up').find('a').attr('data-toggle', 'modal');
    $('.lab-slide-up').find('a').attr('data-target', '#lab-slide-bottom-popup');
  });

});
</script>
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

  $(document).ready(function(){
    $(".reply").click(function(){
      var rid= $(this).attr("replyid");
      //alert(rid);
      $.ajax({
        url:"<?php echo base_url() ?>others/dataforinquiry",
        method:"post",
        data:{inquiryid:rid},
        success:function(data){
          $("#form-data-frm").html(data);
        }
      });

    });

    

  });
</script>

</body>
</html>
