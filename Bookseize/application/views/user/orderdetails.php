 <div class="modal-header">
            <h4 class="modal-title">Order No  - <?php echo $OrderId;?></h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="table-responsive shopping-cart mb-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th class="text-center">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($data as $value)
                  {
                ?>
                    <tr>
                    <td>
                      <div class="product-item"><a class="product-thumb" href="shop-single.html"><img src="<?php echo base_url()?>Images/<?php echo $value["ImageName"]?>" alt="Product"></a>
                        <div class="product-info">
                          <h4 class="product-title"><a href=""><?php echo $value["BookName"]?><small>x <?php echo $value["Quantity"];?></small></a></h4><span><em>Status:</em> <?php echo $value["Status"]?></span>
                        </div>
                      </div>
                    </td>
                    <td class="text-center text-lg text-medium">&#8377; <?php echo $value["Price"]?></td>
                  </tr>

                <?php
                  }
                ?>
                </tbody>
              </table>
            </div>
          
            </div>
          </div>