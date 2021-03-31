<header class="main-header">
    <!-- Logo -->
        
 <link rel="icon" href="<?php echo base_url();?>User/img/logo/bs_favicon.png" type="image/x-icon">
    <a href="<?php echo base_url()?>home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url();?>User/img/logo/bs_favicon.png" height="25px" width="40px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url();?>User/img/logo/bs_favicon.png" height="35px" width="50px">&nbsp;<b>Book</b>Seize</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>image/<?php echo $_SESSION["ImageUrl"]?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION["AdminName"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>image/<?php echo $_SESSION["ImageUrl"]?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION["AdminName"];?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row" >
                  <div class="col-xs-12 text-center " style="font-weight: bold;" >
                 <label class="text-primary">   Email Id  :  <?php echo $_SESSION["EmailId"];?></label>
                  </div>
                </div>
                <br/>
                <div class="row">
                  <div class="col-xs-12 text-center" style="font-weight: bold;">
                    <label class="text-primary"> Contact No  :  <?php echo $_SESSION["ContactNo"];?></label>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div align="center">
                  <a href="<?php echo base_url();?>/home/logout" class="btn btn-primary">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>