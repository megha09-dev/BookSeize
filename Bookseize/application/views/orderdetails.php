<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view("LoadCSS"); ?>
   <link rel="icon" href="<?php echo base_url();?>User/img/logo/bs_favicon.png" type="image/x-icon">
  <style type="text/css">
    .bold{
      font-weight: bold;
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
        Order Details
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url();?>home/order">Order</a></li>
        <li class="active">Order Details</li>
      </ol>
    </section>
    <br/>
    <!-- Main content -->
    <div class="container">
      <section class="invoice">
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-user"></i>  <?php echo $userdata["FirstName"]." ".$userdata["LastName"];?>
            </h2>
          </div>
        <!-- /.col -->
        <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">
              <b>Phone No : </b><?php echo $userdata["ContactNo"]; ?> <br>
              <b>Email : </b> <?php echo $userdata["EmailId"]; ?> 
            </div>
            <div class="col-sm-6 invoice-col">
              <br>
              <b>Order Id : </b> <?php echo $order["OrderId"]; ?><br>
              <b>Order Date : </b> <?php echo $order["CreatedOn"]; ?><br>
            </div>
          <!-- /.col -->
          </div>
          <br/><br/>
          <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Book</th>
              <th>Name</th>
              <th>Author</th>
              <th>Quantity</th>
              <!--<th>Language</th>-->
              <!--<th>Edition</th>-->    
              <th>Status</th>
              <th>Price( &#8377;)</th>
            </tr>
            </thead>
            <tbody>
            <?php
              foreach($orderdata as $value)
              {
            ?>
              <tr>
                <td><img src="<?php echo base_url();?>Images/<?php echo $value["ImageName"];?>"" height="80px" width="70px"></td>
                <td><?php echo $value["BookName"];?></td>
                <td><?php echo $value["Author"];?></td>
                <td><?php echo $value["Quantity"];?></td>
               <!-- <td><?php #echo $value["Language"];?></td>-->
                <!--<td><?php #echo $value["Edition"];?></td>--> 
                <td> <?php echo $value["Status"]?> </td>
                <td><?php echo $value["SalePrice"];?>  &#8377;</td>   
               
              </tr>
            <?php
              }
            ?>
            <tr>
              <td colspan="4"></td>
              <td></td>
              <td><b>Total:</b><?php echo $order["TotalAmount"];?>  &#8377;</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
        </div>
            <!-- /.row -->
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
</body>
</html>
