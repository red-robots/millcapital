<?php
/**
 * The template for Home Page
 */
get_header(); 
?>
<?php while ( have_posts() ) : the_post(); ?>
  <main id="main" class="site-main">
    <section class="home-intro">
      <div class="textwrap">
        <?php if ( get_the_content() ) { ?>
          <div class="hometext"><div class="inside"><?php the_content(); ?></div></div>
        <?php } ?>
        <div class="graphic"></div>
      </div>
    </section>

    <?php if($homeblocks = get_field('homeblocks')) { ?>
      <?php $home_colright_img = get_field('home_colright_img'); ?>
      <section class="home-blocks <?php echo ($home_colright_img) ? 'twocol':'onecol'; ?>">
        <div class="hb-left">
          <div class="flexwrap">
            <?php foreach ($homeblocks as $b) { 
              $link = $b['link'];
              $pagelink = ( isset($link['url']) && $link['url'] ) ? $link['url'] : 'javascript:void(0)';
              $linkTitle = ( isset($link['title']) && $link['title'] ) ? $link['title'] : '';
              $target = ( isset($link['target']) && $link['target'] ) ? $link['target'] : '_self';
              $img = $b['image'];
              $style  = '';
              if($img) {
                $style  = ' style="background-image:url('.$img['url'].')"';
              }
              ?>
              <div class="block">
                <a href="<?php echo $pagelink ?>" target="<?php echo $target ?>">
                  <span class="image">
                    <span class="bg"<?php echo $style ?>></span>
                    <img src="<?php echo THEMEURI ?>/assets/images/rectangle.png" alt="" aria-hidden="true">
                  </span>
                  <?php if ($linkTitle) { ?>
                  <span class="title"><span><?php echo $linkTitle ?></span></span>
                  <?php } ?>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>

        <?php if ($home_colright_img) { ?>
        <div class="hb-right">
          <div class="image" style="background-image:url('<?php echo $home_colright_img['url'] ?>')">
            <img src="<?php echo $home_colright_img['url'] ?>" alt="<?php echo $home_colright_img['title'] ?>">
          </div>
        </div>
        <?php } ?>
      </section>
    <?php } ?>
  </main>
<?php endwhile; ?>  
<?php
get_footer();
