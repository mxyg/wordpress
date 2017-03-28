<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">首页</a>/<?php the_category('/')?>
		<div class="content_model">
			<h3><span><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>“' . esc_html( get_search_query() ) . '”</span> ' ); ?></span></h3>
			<ul>
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
			?>
						<li>
							<a href="<?php the_permalink(); ?>"><span class="date">[<?php the_time('Y-m-d'); ?>]</span><span class="title"><img src="<?php echo get_template_directory_uri().'/img/biao3.gif'?>">&nbsp;&nbsp;<?php the_title(); ?></span></a>
							
						</li>
				
			
			<?php
			// End the loop.
			endwhile;

			// Previous/next page navigation.
			
			?>
			</ul>

			<div class="content_pagination">
			共<?php echo get_the_category()[0]->count?>条新闻 
			<?php
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'twentysixteen' ),
					'next_text'          => __( 'Next page', 'twentysixteen' ),
					'before_page_number' => '第',
					'after_page_number' => '页',
			) );
			?>
			</div>
		</div>
		<?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
