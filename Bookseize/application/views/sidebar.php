<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>image/<?php echo $_SESSION["ImageUrl"]?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["AdminName"];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!--DashBoard-->
        <li class=" treeview">
          <a href="<?php echo base_url()?>home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>home"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          </ul>
        </li>
        <!--User Management-->
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>home/userdata"><i class="fa fa-circle-o"></i>User</a></li>
          </ul>
        </li>
        <!--Address Management-->
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-address-card-o"></i> <span>Address Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>home/state"><i class="fa fa-circle-o"></i>State</a></li>
          </ul>
        </li>
        <!--Book Management-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Books Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>home/category"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="<?php echo base_url();?>book_c/book"><i class="fa fa-circle-o"></i> Books</a></li>
            <li><a href="<?php echo base_url();?>book_c/publisher"><i class="fa fa-circle-o"></i> Publisher</a></li>
           <!-- <li><a href="<?php #echo base_url();?>book_c/adminbooks"><i class="fa fa-circle-o"></i> My Books</a></li>   -->
          </ul>
        </li>
        <!--Order Management-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Order Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         
            <li><a href="<?php echo base_url();?>home/order"><i class="fa fa-circle-o"></i>Orders</a></li>
          </ul>
        </li>
        <!--Others-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-ellipsis-h"></i>
            <span>Others</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>others/feedback"><i class="fa fa-circle-o"></i>Feedback</a></li>
            <li><a href="<?php echo base_url();?>others/testimonial"><i class="fa fa-circle-o"></i>Testimonial</a></li>
            <li><a href="<?php echo base_url();?>others/banner"><i class="fa fa-circle-o"></i>Banner</a></li>
            <li><a href="<?php echo base_url();?>others/inquiry"><i class="fa fa-circle-o"></i>Inquiry</a></li>
            <li><a href="<?php echo base_url();?>others/changepwd"><i class="fa fa-circle-o"></i>Change Password</a></li>
            <li><a href="<?php echo base_url();?>home/logout"><i class="fa fa-circle-o"></i>Logout</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>