<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="home_model">
				<?php
					global $post;
					$cat = get_category_by_slug( "home" );
					$myposts = get_posts([
						'category'			=> $cat->cat_ID,
						'posts_per_page'	=> 10,
						'orderby'			=> 'date',
						'order'				=> 'DESC',
					]);
				?>
					<h3><span><?php echo $cat->name ?></span><a class="title_more" href="<?php echo get_category_link( $cat->cat_ID )?>">&gt;&gt;More</a></h3>
					<?php 
						echo do_shortcode("[metaslider id=78]"); 
					?>
				<ul class="home_model_content">
					<?php
						foreach ( $myposts as $post ) : setup_postdata( $post );
					?>
						<li>
							<a href="<?php the_permalink(); ?>"><span class="date">[<?php the_time('Y-m-d'); ?>]</span><span class="title"><img src="<?php echo get_template_directory_uri().'/img/biao3.gif'?>">&nbsp;&nbsp;<?php the_title(); ?></span></a>
							
						</li>
					<?php
						endforeach;
					?>
				</ul>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
