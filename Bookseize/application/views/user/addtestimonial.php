<div class="row">
  <div class="col">
    <h5 class="mb-30 padding-top-1x">&nbsp;&nbsp;&nbsp;Add Your Testimonial <button align="topRight" style="float:right;" class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h5>
                <form class="row" method="post" action="<?php echo base_url()?>u_c/addtestimonial?>">
                  <div class="col-10 offset-1">
                    <div class="form-group">
                      <label for="review_text">Review </label>
                      <textarea class="form-control form-control-rounded" id="review_text" rows="8" required name="txtreview"></textarea>
                    </div>
                  </div>
                   
                  <div class="col-10 offset-8">
                    <input class="btn btn-outline-primary" name="btntest" type="submit" value="Submit Review">
                  </div>
                </form>
  </div>
</div>