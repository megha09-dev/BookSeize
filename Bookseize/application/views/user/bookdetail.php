 <div class="modal-header">
            <h4 class="modal-title"><?php echo $data["BookName"];?> (By <?php echo $data["Author"]?>)</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="table-responsive shopping-cart mb-0">
              <table class="table">
               <tbody>
                <tr>
                  <td rowspan="5" style="width: 40%;">
                  <img src="<?php echo base_url()?>Images/<?php echo $data["ImageName"]?>" style="height: 250px;width:250px;">
                  </td>
                  <td>
                    Original Price : <?php echo $data["OriginalPrice"]?>
                  </td>
                </tr>
                <tr>
                  <td>Sale Price : <?php echo $data["SalePrice"]?></td>
                </tr>
                <tr>
                  <td>Quantity : <?php echo $data["Qty"]?></td>
                </tr>
                <tr>
                  <td>Language : <?php echo $data["Language"]?></td>
                </tr>
                <tr>
                  <td>Edition: <?php echo $data["Edition"]?></td>
                </tr>
                <tr>
                  <td colspan="2">
                  <p>Description : <?php echo $data["Description"]?></p>
                  </td>
                  </tr>
                </tbody>
              </table>
            </div>
          
            </div>
          </div>