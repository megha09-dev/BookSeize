 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <?php
      if($this->session->flashdata("tost")=="true")
      { ?>
        <script type="text/javascript">
          toastr.success('Already in cart!');     
       </script>
      <?php
      } 
    ?>
         <?php
      if($this->session->flashdata("tost2")=="true")
      { ?>
        <script type="text/javascript">
        //alert("already in cart");
        $(document).ready(function(){
         toastr.success('Added to cart');
          
        });

      </script>
      <?php
      } 
    ?>


<form method="post" action="<?php echo base_url() ?>user_c/addtocart">
<div class="modal-body">
  <div class="row">
      <div class="col-md-4">
        <img src="<?php echo base_url()?>Images/<?php echo $book["ImageName"];?>" style="height:250px;width:200px;">
      </div>
      <div class="col-md-8">
        <div class="row" style="margin-bottom: 5px;">
          <div class="col-md-12" >
            <h4 class="modal-title"><?php echo $book["BookName"]?> (By <?php echo $book["Author"];?>)  <button align="topRight" style="float:right;" class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4>
            <div class="rating-stars">
                          <?php 

                           for ($i=1; $i <= $rating["rating"] ; $i++) { 
                            ?>
                               <i class="fa fa-star " style="color: gold;"></i>
                           <?php
                          }

                          $r=5 - $rating["rating"];

                          for ($i=0; $i <$r ; $i++) { 
                          ?>
                          <i class="fa fa-star"></i>

                          <?php
                          }

                          ?>
                          </div><span class="text-muted align-middle">&nbsp;&nbsp;<?php echo $rating["rating"]?></span>


          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <div style="border-color: lavender;text-align: center;">
              <?php  
                    if($book["SalePrice"]==$book["OriginalPrice"])
                    {
                      ?>
                <h6><b>&#8377; <?php echo $book["SalePrice"];?> </b></h6>
                
                <?php
                    }
                    else
                    {
                   ?>
                      <h5><b>&#8377; <?php echo $book["SalePrice"];?> </b></h5>
                <h6><del>&#8377; <?php echo $book["OriginalPrice"];?> </del></h6>
                    <?php
                    }
              ?>
            </div>
          </div>
          <div class="col-md-6" style=" border-left: solid;border-color:lavender ;">
            <h6>Quantity</h6>
            <input type="number" class="form-control mb-2" value="<?php echo $book["Qty"];?>" name="txtqty" max="<?php echo $book["Qty"];?>" min="1">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <h5>Book Overview </h5>

              Seller Name:<?php echo $book["FirstName"]." ".$book["LastName"];?>
              <br>
              Condition : <?php if($book["IsNew"]==1) {echo "New";} else {echo "Old";}?>
              <br>
              <h6 align="right"><a href="<?php echo base_url();?>user_c/moredetails?id=<?php echo base64_encode($book['BookId'])?>" >View More..</a></h6>
               <input type="hidden" name="txtid" value="<?php echo $book["BookId"]?>">
              <input type="hidden" name="txtname" value="<?php echo $book["BookName"]?>">
              <input type="hidden" name="txtprice" value="<?php echo $book["SalePrice"]?>">
               <input type="hidden" name="txtcid" value="<?php echo $book["CategoryId"]?>">
               <input type="hidden" name="txtimg" value="<?php echo $book["ImageName"]?>">       
          </div>
        </div>
      </div>
    </div>
</div>
<div class="modal-footer">            
    <input type="submit" name="btnquickcart" class="btn btn-outline-primary btn-sm" value="Add to Cart">
</div>
</form>