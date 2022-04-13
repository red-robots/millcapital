<?php if( is_front_page() || is_home() ) { ?>
  <?php  if( $banners = get_field("banner") ) { 
    $count = count($banners); 
    $slideClass = ($count==1) ? 'static-slide':'slideshow';
    ?>
    <div id="home-slider" class="slider <?php echo $slideClass ?>">
      <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <?php foreach ($banners as $b) { ?>
            <?php if ($b['image']) { 
              $img = $b['image']; 
              $slideText = $b['caption'];
            ?>
            <div class="swiper-slide">
              <div class="slide-image" style="background-image:url('<?php echo $img['url'] ?>')"></div>
              <?php if ($slideText) { ?>
              <div class="slide-text animated">
                <div class="textwrap">
                  <div class="wrap">
                    <div class="inline"><?php echo $slideText ?></div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <?php } ?>
          <?php } ?>
        </div>
        
        <?php if ($count>1) { ?>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
        <?php } ?>
      </div>
    </div>
  <?php } ?>
<?php } ?>