<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <?php $this->load->view("LoadCSS"); ?>
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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $order["total"]?></h3>

              <p>Total Sell</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url()?>home/order" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              
              <h3>
                <?php echo $cat["total"]?>
                <sup style="font-size: 20px"></sup>
              </h3>
              

              <p>Total Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url() ?>home/category" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

     
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $user["total"]?></h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url()?>home/userdata" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- col -->
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $book["total"]?></h3>

              <p>Total Books</p>
            </div>
            <div class="icon">
              <i class="fas fa-book"></i>
            </div>
            <a href="<?php echo base_url()?>book_c/book" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
       
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $inquiry["total"]?></h3>

              <p>Total Inquiry</p>
            </div>
            <div class="icon">
              <i class="fa fa-question"></i>
            </div>
            <a href="<?php echo base_url()?>others/inquiry" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3><?php echo $publisher["total"]?></h3>

              <p>Total Publisher</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url()?>book_c/publisher" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <br/>
      <div class="row">
      <center>
      <form method="post" action="<?php echo base_url()?>home">
        <div class="col-md-3" style="margin-left: 100px;">
          <label class="form-control">Select Year</label>
        </div>
        <div class="col-md-4">
          <select class="form-control" name="ddyear">
            <?php
            foreach ($dd as $value)
            {
            ?>
            <option value="<?php echo $value["Year"]?>" <?php if( isset($_SESSION["year"]) && $_SESSION["year"]==$value["Year"]) {echo "selected=''";}?>><?php echo $value["Year"]?></option>
            <?php
            }
            ?>
          </select>
          </div>
          <div class="col-md-3">
          <input class="btn btn-primary" type="submit" name="btngo" value="Go">
        </div>
        </form>
        </center>

      </div>
      <br/>
      <div class="row">
        <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Donut Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
    </section>
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
<script>
  $(function () {
    "use strict";

     var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "Clients", value:<?php echo $user["total"]; ?>},
        {label: "Books", value:<?php echo $book["total"]; ?>},
        {label: "Publisher",value:<?php echo $publisher["total"]; ?>}
      ],
      hideHover: 'auto'
    });

    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: <?php echo $str ?>,
      barColors: ['teal'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Book Selling'],
      hideHover: 'auto'
    });
  });
</script>
</body>
</html>
