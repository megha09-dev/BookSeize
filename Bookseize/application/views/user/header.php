  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link rel="icon" href="<?php echo base_url();?>User/img/logo/bs_favicon.png" type="image/x-icon">
    <header class="navbar navbar-sticky">
      <!-- Search-->
      <form class="site-search" method="post" action="<?php echo base_url()?>validation_c/searchbook" >
        <input type="text" name="site_search" id="site_search" placeholder="Type to search...">
        <div class="search-tools"><span class="clear-search">Clear</span><span class="close-search"><i class="icon-cross"></i></span></div>
      </form>
      <div class="site-branding">
        <div class="inner">
          <!-- Site Logo--><a class="site-logo" href="<?php echo base_url();?>user_c"><img src="<?php echo base_url();?>User/img/logo/logo.png" style="width: 230px;height: 55px;" alt="Bookseize"></a>
        </div>
      </div>
      <!-- Main Navigation-->
      <nav class="site-menu">
        <ul>
          <li class="has-megamenu"><a href="<?php echo base_url();?>user_c"><span>Home</span></a>
           
          </li>
          <!--<li class=""><a href="<?php echo base_url();?>user_c/shopcategories"><span>All Categories</span></a>
            <ul class="sub-menu">
              <?php
                $i=0;
                foreach($cat as $value) 
                {
                  $i++;
                  if($i==8)
                  { break;
                    ?>
                    
                  <?php
                  }?>
                  <li><a href="<?php echo base_url() ?>user_c/viewsubcategory?id=<?php echo base64_encode($value["CategoryId"]) ?>"><?php echo $value["CategoryName"];?></a>
                  </li>
                
                 
                <?php
                }
              ?>
               <li><a href="<?php echo base_url();?>user_c/shopcategories">View More</a>
                  </li>
            </ul>
          </li> -->            
          <?php 
                 if(isset($_SESSION['UserId']))
                 { ?>

               <li><a href=""><span>Account</span></a>
                <ul class="sub-menu">
               
                <li><a href="<?php echo base_url();?>u_c/myorders">My Orders</a></li> 
                <li><a href="<?php echo base_url() ?>user_c/profile">Profile Page</a></li>
                <li><a href="">Contact / Shipping Address</a></li>
                <li><a href="<?php echo base_url();?>u_c/viewchangepwd">Change PassWord</a></li>
            </ul>
          </li>
                 <?php 
               }
               else
               {
                ?>
               <li><a href="<?php echo base_url() ?>user_c/login"><span>Login / Register</span></a></li>

                <?php
               }

           ?>
          <li class="has-megamenu"><a href="<?php echo base_url();?>user_c/aboutus"><span>About Us</span></a>
          </li>
           <li><a href="<?php echo base_url()?>u_c/testimonial"><span>Testimonial</span></a>
        </ul>
      </nav>
      <!-- Toolbar-->
      <div class="toolbar">
        <div class="inner">
          <div class="tools">
              <div class="account"><a href="<?php echo base_url()?>u_c/inquiry" title="Inquiry"></a><i class="fa fa-question"></i></div>  
              <?php 
                if(isset($_SESSION["UserId"]))
                {
              ?>
                  <div class="account"><a href="<?php echo base_url()?>u_c/sellform" title="Sell Your Books"></a><i class="fa fa-camera"></i></div>
              <?php
                }
              ?>         
            <div class="search"><i class="icon-search"></i></div>
            <?php 
                  if(isset($_SESSION['UserId']))
                  {
                    if($_SESSION["ImageUrl"]==NULL)
                    {
                       $img="download.png";
                    }
                    else 
                    {
                      $img=$_SESSION["ImageUrl"];
                    }
            ?>

            <div class="account"><a href=""></a><i class="icon-head"></i>
              <ul class="toolbar-dropdown">
                <li class="sub-menu-user">
                  <div class="user-ava"><img src="<?php echo base_url();?>user_image/<?php echo $img;?>">
                  </div>
                  <div class="user-info">
                    <h6 class="user-name"><?php echo $_SESSION['FirstName']." ". $_SESSION['LastName']?></h6>
                  </div>
                </li>
                  <li><a href="<?php echo base_url() ?>user_c/profile">My Profile</a></li>
                  <li><a href="<?php echo base_url();?>u_c/myorders">My Orders </a></li>
                  <li><a href="<?php echo base_url()?>u_c/mybooks">My Books </a></li>
                  <li><a href="<?php echo base_url()?>u_c/myorderlist">Order List </a></li>
                  
                <li class="sub-menu-separator"></li>
                <li><a href="<?php echo base_url() ?>user_c/logout"> <i class="icon-unlock"></i>Logout</a></li>
              </ul>
            </div>
            <?php
                  }
             ?>
            <div class="cart"><a href=""></a><i class="icon-bag"></i>
              <div class="toolbar-dropdown">
                <?php 
                if(isset($_SESSION['UserId']))
                {

                  if(count($cart)==0)
                  {
                    echo"Your Cart is Empty!!!";
                  }
                  else 
                  {
                    foreach ($cart as $value) 
                  {
                ?>
                      <div class="dropdown-product-item"><a class="dropdown-product-thumb" href=""><img src="<?php echo base_url();?>Images/<?php echo $value['ImageName']?>" alt="Product"></a>
                  <div class="dropdown-product-info"><a class="dropdown-product-title" href=""><?php  echo $value['BookName']?></a><span class="dropdown-product-details"><?php  echo $value['qty2']?> x <?php  echo $value['Price']?></span></div>
                  </div> 
                <?php
                 
                  }
                ?>
             
                <div class="toolbar-dropdown-group">
                 
                </div>
                <div class="toolbar-dropdown-group">
                  <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="<?php echo base_url()?>user_c/viewcart">View Cart</a></div>
                  
                   <div class="column"><a class="btn btn-sm btn-block btn-success" href="<?php echo base_url()?>user_c/checkout">Checkout</a></div>  
                    </div>
                    <?php
                  }
                }
                else
                {
                  if(count($this->cart->contents())==0)
                  {
                    echo"Your Cart is Empty!!!";
                  }
                  else 
                  {
                    foreach ($this->cart->contents() as $value) 
                  {
                ?>
                      <div class="dropdown-product-item"><a class="dropdown-product-thumb" href=""><img src="<?php echo base_url();?>Images/<?php echo $value['img']?>" alt="Product"></a>
                  <div class="dropdown-product-info"><a class="dropdown-product-title" href=""><?php  echo $value['name']?></a><span class="dropdown-product-details"><?php  echo $value['qty']?> x <?php  echo $value['price']?></span></div>
                  </div> 
                <?php
                 
                  }
                ?>
             
                <div class="toolbar-dropdown-group">
                 
                </div>
                <div class="toolbar-dropdown-group">
                  <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="<?php echo base_url()?>user_c/viewcart">View Cart</a></div>
                  
                    <div class="column"><a class="btn btn-sm btn-block btn-success" href="<?php echo base_url()?>user_c/login">Checkout</a></div>
                       </div>
                      <?php
                  }
                }
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <script type="text/javascript">
      $("#site_search").Change(function(){
        alert("ok");
      });
    </script>