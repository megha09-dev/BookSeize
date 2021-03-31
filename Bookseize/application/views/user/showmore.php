 <?php
  foreach ($book as $value)
                {

              ?>
<div class="col-lg-4 col-md-6 col-sm-6"  >
                  <div class="product-card mb-30"  >
                  
                    <a class="product-thumb" href="#"><center><img src="<?php echo base_url()?>Images/<?php echo $value["ImageName"]?>" alt="Product" style="height:140px ;width:120px ;"></center></a>
                    <input type="hidden" name="txtid" value="<?php echo $value["BookId"];?>">
                    <input type="hidden" name="txtname" value="<?php echo $value["BookName"];?>">
                    <input type="hidden" name="txtprice" value="<?php echo $value["SalePrice"];?>">
                    <input type="hidden" name="txtcid" value="<?php echo $value["CategoryId"];?>">
                    <input type="hidden" name="txtimg" value="<?php echo $value["ImageName"];?>">
                      <h3 class="product-title text"  ><a href="#"><?php echo $value["BookName"]?></a></h3>
                      <h4 class="product-price">
                      <del><?php echo $value["OriginalPrice"];?> &#8377;</del><?php echo $value["SalePrice"];?> &#8377;
                      </h4>
                    <div class="product-buttons">
                      <a style="width:55px" class="btn btn-outline-info btn-sm btnview" data-toggle="modal" data-target="#modalLarge"  bid="<?php echo $value["BookId"]?>" title="Quick View" ><i class='fa fa-eye ' style="font-size:20px" ></i></a>


                      <input type="submit" class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" value="Add to Cart" name="btncart">
                    </div>
                  </div>
                </div>
              <?php
                }
              
              ?>
            </div>

 <div class="modal fade" id="modalLarge" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div id="form-data-frm">
                   
          </div>
        </div>
      </div>
    </div>
             <script type="text/javascript">
     $(document).ready(function(){
     

      $(".btnview").click(function(){
      var rid= $(this).attr("bid");
     // alert(rid);
      $.ajax({
        url:"<?php echo base_url() ?>user_c/bookview",
        method:"post",
        data:{bid:rid},
        success:function(data){
          $("#form-data-frm").html(data);
        }
      });

});
    });
  </script>