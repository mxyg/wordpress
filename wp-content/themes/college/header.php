<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--[if lte IE 8]>
<div id="ie6-warning"><p>本页面采用HTML5+CSS3，您正在使用老版本 Internet Explorer ，在本页面的显示效果可能有差异。建议您升级到 <a href="http://www.microsoft.com/china/windows/internet-explorer/" target="_blank">Internet Explorer 9</a> 或以下浏览器：
    <br>
<a href="http://www.mozillaonline.com/"><img src="__PUBLIC__/image/browser/firefox.png">Firefox</a> / 
<a href="http://www.baidu.com/s?wd=google%E6%B5%8F%E8%A7%88%E5%99%A8"><img src="__PUBLIC__/image/browser/chrome.png">Chrome</a> / 
<a href="http://www.apple.com.cn/safari/"><img src="__PUBLIC__/image/browser/Safari.png">Safari</a> / 
<a href="http://www.operachina.com/"><img src="__PUBLIC__/image/browser/Opera.png">Opera</a></p></div>
<style type="text/css">
/*ie6提示*/
#ie6-warning{width:100%;background:#ffffe1;padding:5px 0;font-size:12px}
#ie6-warning p{width:960px;margin:0 auto;}
  </style>
<![endif]-->
<div id="page" class="site">
	<div class="site-inner">
		<!--<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>-->

		<header id="masthead" class="site-header" role="banner">
			<div style=" position: relative; ">
				<?php if ( get_header_image() ) : ?>
					<?php
						/**
						 * Filter the default twentysixteen custom header sizes attribute.
						 *
						 * @since Twenty Sixteen 1.0
						 *
						 * @param string $custom_header_sizes sizes attribute
						 * for Custom Header. Default '(max-width: 709px) 85vw,
						 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
						 */
						$custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
					?>
					<div class="header-image">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						</a>
					</div><!-- .header-image -->
				<?php endif; // End header image check. ?>
				<div class="site-header-main">
					<div class="site-branding">
						<?php twentysixteen_the_custom_logo(); ?>

						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->

				</div><!-- .site-header-main -->
			</div>
			<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
				<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?></button>

				<div id="site-header-menu" class="site-header-menu">
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_class'     => 'primary-menu',
								 ) );
							?>
							<?php get_search_form();?>
						</nav><!-- .main-navigation -->
					<?php endif; ?>

				</div><!-- .site-header-menu -->
			<?php endif; ?>
		</header><!-- .site-header -->

		<div id="content" class="site-content">
