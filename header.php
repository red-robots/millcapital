<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.1.0/swiper-bundle.css">
<?php if ( is_singular(array('post')) ) { 
global $post;
$post_id = $post->ID;
$thumbId = get_post_thumbnail_id($post_id); 
$featImg = wp_get_attachment_image_src($thumbId,'full'); ?>
<!-- SOCIAL MEDIA META TAGS -->
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:url"		content="<?php echo get_permalink(); ?>" />
<meta property="og:type"	content="article" />
<meta property="og:title"	content="<?php echo get_the_title(); ?>" />
<meta property="og:description"	content="<?php echo (get_the_excerpt()) ? strip_tags(get_the_excerpt()):''; ?>" />
<?php if ($featImg) { ?>
<meta property="og:image"	content="<?php echo $featImg[0] ?>" />
<?php } ?>
<!-- end of SOCIAL MEDIA META TAGS -->
<?php } ?>
<script>
var siteURL = '<?php echo get_site_url();?>';
var currentURL = '<?php echo get_permalink();?>';
var params={};location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){params[k]=v});
</script>
<?php wp_head(); ?>
</head>
<?php 
$extraClass = '';
if(is_page()) {
  $extraClass .= (get_field('header_image')) ? ' has-banner':' no-banner';
}
$topNavs = get_field("topNavs","option"); 
?>
<body <?php body_class($extraClass);?>>
<div id="page" class="site cf">
	<div id="overlay"></div>
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper wide">
      <div class="flexwrap">
  			<div id="site-logo">
          <?php if( get_custom_logo() ) { ?>
            <?php the_custom_logo(); ?>
          <?php } else { ?>
            <h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
          <?php } ?>
  			</div>

        <a class="mobile-menu" id="menutoggle" href="javascript:void(0)"><span class="bar"></span><i>Menu</i></a>

        <?php if ( has_nav_menu( 'primary' ) ||  $topNavs ) { ?>
        <div id="site-navigation">

          <?php if ( $topNavs ) { ?>
          <nav id="topnav" class="topnav">
            <ul class="menu">
            <?php foreach ($topNavs as $n) { 
              if( $n['link'] ) { 
                $a = $n['link'];
                $target = ( isset($a['target']) && $a['target'] ) ? $a['target'] : '_self';
                $icon = ($n['icon']) ? $n['icon'] : '';
                $hasIcon = ($icon) ? 'has-icon':'no-icon';
                ?>
                <li class="top-link <?php echo $hasIcon ?>"><a href="<?php echo $a['url'] ?>" target="<?php echo $target ?>"><?php echo $icon ?><?php echo $a['title'] ?></a></li>
              <?php } ?>
            <?php } ?>
            </ul>
          </nav>
          <?php } ?>

          <?php if ( has_nav_menu( 'primary' ) ) { ?>
    			<nav id="navigation" class="main-navigation animated fadeIn" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container'=>false, 'menu_id' => 'primary-menu') ); ?>
          </nav>
          <?php } ?>

          <span id="closeMobileNav"></span>
        </div>
        <?php } ?>
      
  		</div>
    </div>	
	</header>

	<?php get_template_part('parts/hero'); ?>

	<div id="content" class="site-content">
