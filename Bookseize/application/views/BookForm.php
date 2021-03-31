<!DOCTYPE html>
<html>
<head>
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
        Books
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Books</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <?php
              if(isset($data))
              {
                  $action=base_url()."book_c/editbookdata";
              }
              else
              {
                  $action=base_url()."book_c/addbookdata";
              }
            ?>
            <form role="form" action="<?php echo $action;?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="editid" value="<?php if(isset($data)) { echo $data["BookId"]; } ?>" >
              <div class="box-body">
              
                <div class="row" >
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>Book Name</label>
                      <input type="text" class="form-control" name="txtbname" placeholder="Enter Book Name" value="<?php if(isset($data)) echo $data["BookName"]?>">
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>Author Name</label>
                      <input type="text" class="form-control" name="txtauthor" placeholder="Enter Author Name" value="<?php if(isset($data)) echo $data["Author"]?>">
                    </div>
                  </div>
                </div>
               
                <div class="row" >
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>Category</label>
                      <select id="Category" name="ddcat" class="form-control select2" style="width: 100%;">
                        <option selected="selected" disabled="" >Select Category </option>
                        <?php
                          foreach ($cat as $value)
                          {
                            if(isset($data) && $data["CategoryId"]==$value["CategoryId"])
                            { ?>
                               <option selected="" value="<?php echo $value["CategoryId"] ?>" ><?php echo $value["CategoryName"] ?></option>
                            <?php 
                            }
                            else
                            { ?>
                              <option value="<?php echo $value["CategoryId"] ?>" ><?php echo $value["CategoryName"] ?></option>
                            <?php
                            }
                            ?>
                        
                              
                        <?php
                          }
                        ?>
                        
                       </select>
                    </div>
                  </div>
                   <div class="col-md-6" >
                     <div class="form-group">
                       <label> Sub Category</label>
                       <?php

                        if(isset($subcat))
                        { 

                          ?>
                           <select id="sub-category" name="ddsubcat" class="form-control select2" style="width: 100%;">
                            <?php
                              foreach ($subcat as $value) {
                                 ?>
                                  <option  value="<?php echo $value["SubCategoryId"] ?>" >
                                    <?php echo $value["SubCategoryName"] ?>
                                  </option>
                               <?php
                              } 
                            ?>
                          </select>
                        <?php
                        }
                        else
                        { ?>
                           <select id="sub-category" name="ddsubcat" class="form-control select2" style="width: 100%;">
                        Select Subcategory
                      </select>
                        <?php
                        }
                        ?>
                     
                      </div>
                  </div>
                </div>
    

                <div class="row" >
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>Publisher Name</label>
                      <select id="publisher" name="ddpub" class="form-control select2" style="width: 100%;">
                        <option selected="selected" disabled="" >Select Publisher </option>
                        <?php
                          foreach ($pub as $value)
                          {
                            if(isset($data) && $data["PublisherId"]==$value["PublisherId"])
                            { ?>
                               <option selected="" value="<?php echo $value["PublisherId"] ?>" ><?php echo $value["PublisherName"] ?></option>
                            <?php 
                            }
                            else
                            { ?>
                              <option value="<?php echo $value["PublisherId"] ?>" ><?php echo $value["PublisherName"] ?></option>
                            <?php
                            }
                            ?>
                              
                        <?php
                          }
                        ?>
                       </select>
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>Language</label>
                      <select  name="ddlang" class="form-control select2" style="width: 100%;">
                        <option selected="selected" disabled="" >Select Language </option>
                        <?php
                            if(isset($data))
                            { ?>
                               <option  <?php if($data["Language"]=="English") { echo "selected=''"; } ?> value="English" >English</option>

                                <option  <?php if($data["Language"]=="Hindi") { echo "selected=''"; } ?> value="Hindi" >Hindi</option>

                                <option  <?php if($data["Language"]=="Gujarati") { echo "selected=''"; } ?> value="Gujarati" >Gujarati</option>
                            <?php 
                            }
                            else
                            { ?>
                                <option value="English" >English</option>
                                <option value="Hindi" >Hindi</option>
                                <option value="Gujarati" >Gujarati</option>
                            <?php
                            }
                            ?>                 
                        
                       </select>
                    </div>
                  </div>
                </div>

                <div class="row" >
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>Edition</label>
                      <input type="text" class="form-control" name="txtedition" placeholder="Enter Edition" value="<?php if(isset($data)) echo $data["Edition"]?>">
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>Quantity</label>
                      <input type="number" min="1" max="20" class="form-control" name="txtqty" placeholder="Enter Quantity" value="<?php if(isset($data)) echo $data["Qty"]?>">
                    </div>
                  </div>
                </div>

            
                <div class="row" >
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>Original Price</label>
                      <input type="text" class="form-control" name="txtoprice" placeholder="Enter Original Price" value="<?php if(isset($data)) echo $data["OriginalPrice"]?>">
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>Sale Price</label>
                      <input type="text" class="form-control" name="txtsprice" placeholder="Enter Sale Price" value="<?php if(isset($data)) echo $data["SalePrice"]?>">
                    </div>
                  </div>
                </div>  

                <div class="row" >
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>ISBN No</label>
                      <input type="text" class="form-control" name="txtisbn" placeholder="Enter ISBN No" value="<?php if(isset($data)) echo $data["ISBNno"]?>">
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>New</label><br/>
                      <?php 
                        if(isset($data))
                        {
                      ?>
                      <input type="checkbox" <?php if($data["IsNew"]==1) { echo "checked=''"; } ?> name="chknew" >
                      <?php
                    }
                    else
                    {
                  ?>
                        <input type="checkbox" name="chknew" >
                      <?php
                    }
                    ?>
                    </div>
                  </div>
                </div> 

                <div class="row" >
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>Description</label>
                     <textarea class="form-control" name="txtdesc" rows="3" placeholder="Enter...." ><?php if(isset($data)) echo $data["Description"]?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label>Upload Book Image</label>
                      <?php 
                      if(isset($data)) 
                      {
                        ?>
                        <img src="<?php echo base_url();?>Images/<?php
                        echo $data["ImageName"];?>" height="200" width="200"/>
                        <?php
                      }

                      ?>
                      <input type="file" name="filebook" >
                    </div>
                  </div>
                </div>         


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?php
                  if(isset($data))
                  {
                ?>
                    <input type="submit" name="btneditbook" class="btn btn-primary" value="Update">
                <?php
                  }
                  else
                  {
                  ?>
                     <input type="submit" name="btnaddbook" class="btn btn-primary" value="Submit">
                  <?php
                  }
                ?>
                
              </div>
            </form>
          </div>
        </div>
      </div>
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

<script type="text/javascript">
    $(document).ready(function(){

      $("#Category").change(function(){


        var cat = $(this).val();
        //alert(cat);
        $.ajax({
          url:"<?php echo base_url() ?>book_c/getsubcategory",
          method:"post",
          data:{catid:cat},
          success:function(data){
            //alert(data);
            $("#sub-category").html(data);
          }
        });
      });
    });
</script>
</body>
</html>
