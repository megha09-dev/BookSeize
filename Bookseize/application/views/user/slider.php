<section class="hero-slider" style="height:200px !important  ;background-image: url(img/hero-slider/main-bg.jpg);">
        <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
        <?php
          foreach ($banner as $value)
          {
        ?>
                  <div class="item">
            <div class="container padding-top-3x">
              <div class="row justify-content-center align-items-center">
                <div class="col-md-12 "><img class="d-block mx-auto" src="<?php echo base_url();?>banner_images/<?php echo $value["ImageName"]?>" style="height: 350px;width:1300px;"></div>
              </div>
            </div>
          </div>
        <?php
          }
        ?>
        </div>
      </section>