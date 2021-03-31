<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view("LoadCSS"); ?>
  <style type="text/css">
    .tbl-text-format{
      text-align:center;
      font-size:18px;
    }

    .tbl-text-formating{
      font-size:14px;
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
        Book Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>book_c/book">Book</a></li>
        <li class="active">Book All Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><b><?php echo $data["BookName"]; ?></b>
                 By <?php echo $data["Author"];?>(Author)</h3>
                <br>

              <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                  
              </div>

               <div class="row">
      <div class="col-xs-5">
        <div class="box-body">
            <img src="<?php echo base_url(); ?>Images/<?php echo $data["ImageName"]; ?>" class="img-thumbnail" style="width:450px;height:550px">
            <strong class="tbl-text-format"><i class="fa fa-angle-right margin-r-5"></i>Book Details</strong>
                <br/>
                <p class="text tbl-text-formating">
                 ISBN Number : <?php echo $data["ISBNno"];?>
                 <br/>
                 Edition : <?php echo $data["Edition"];?>
                 <br/>
                 Language : <?php echo $data["Language"];?>
                 <br/>
                 Description : <?php echo $data["Description"];?>
                 <br/>
                 New : <?php if($data["IsNew"]==1) {echo "Yes";} else {echo "No";}
                 ?>
                 </p>
        </div>  
      </div>
      <div class="col-xs-7">
        <div class="box box-primary">
            <div class="box-body">
              <strong class="tbl-text-format"><i class="fa fa-angle-right margin-r-5"></i>Price Details </strong>
                <br/>
                <p class="text tbl-text-formating">
                Original Price : <?php echo $data["OriginalPrice"];?> &#8377;
                <br/>
                Sale Price : <?php echo $data["SalePrice"];?> &#8377;
               </p>

              <hr>

              <strong class="tbl-text-format"><i class="fa fa-angle-right margin-r-5"></i>Category</strong>
                <br/>
                <p class="text tbl-text-formating"><?php echo $data["CategoryName"];?></p>

              <hr>

              <strong class="tbl-text-format"><i class="fa fa-angle-right margin-r-5"></i>SubCategory</strong>
                <br/>
                <p class="text tbl-text-formating"><?php echo $data["SubCategoryName"];?></p>

              <hr>

              <strong class="tbl-text-format"><i class="fa fa-angle-right margin-r-5"></i> Publisher</strong>
                <br/>
                <p class="text tbl-text-formating"><?php echo $data["PublisherName"];?></p>

              <hr>

              <strong class="tbl-text-format"><i class="fa fa-angle-right margin-r-5"></i>Quantity</strong>
                <br/>
                <p class="text tbl-text-formating"><?php echo $data["Qty"];?></p>

              <hr>

               <strong class="tbl-text-format"><i class="fa fa-angle-right margin-r-5"></i>Seller's Details</strong>
                <br/>
                <p class="text tbl-text-formating">
                  Name : <?php echo $data["FirstName"]." ".$data["LastName"];?>
                  <br/>
                  Email-Id : <?php echo $data["EmailId"];?>
                  <br/>
                  Contact No : <?php echo $data["ContactNo"];?>
                </p>
            </div>
        </div>
      </div>
    </div>

             </div>
          </div>

        </div>
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
</body>
</html>