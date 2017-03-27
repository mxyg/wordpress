<?php 
/*Plugin Name: 侧边栏显示分类文章
Description: 侧边栏显示分类文章.
Version: 1.0.1
Author: Liu Man
Author URI: http://xuanzeta.com
License: GPLv2
*/
class LmCategory extends WP_Widget {
 
    function __construct() {
		parent::__construct(
			'Category_Articles_List',
			__('模块管理'),
			[
				'description' => __( '' )
			]
		);
    }
 
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = sanitize_text_field( $instance['title'] );	
		$categorie = sanitize_text_field( $instance['categorie'] );		
?>		 
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">模块名称:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('categorie'); ?>">选择分类:</label>
			<select name="<?php echo $this->get_field_name( 'categorie' ); ?>" id="<?php echo $this->get_field_id( 'categorie' ); ?>" class="widefat">
			<?php
				foreach( get_categories() as $category ) {
			?>
			<option value="<?php echo $category->cat_ID; ?>"<?php selected( $instance['categorie'], $category->cat_ID ); ?>><?php echo $category->name; ?></option>
			<?php
				} 
			?>
			</select>
		</p>

<?php
    }
 
    function update( $new_instance, $old_instance ) {       
		$instance = $old_instance;
		$instance[ 'categorie' ] = sanitize_text_field( $new_instance[ 'categorie' ] );
		$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
		return $instance;
    }
 
    function widget( $args, $instance ) {
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? get_cat_name($instance[ 'categorie' ]) : $instance['title'], $instance, $this->id_base );
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title. '<a class="title_more" href="'.get_category_link( $instance['categorie'] ).'">&gt;&gt;More</a>' . $args['after_title'];
		} ?>
		<ul class="other_model">
		<?php
			global $post;
			$myposts = get_posts([
				'category'			=> $instance['categorie'],
				'posts_per_page'	=> 10,
				'orderby'			=> 'date',
				'order'				=> 'DESC',
			]);
			foreach ( $myposts as $post ) : setup_postdata( $post );
		?>
			<li>
							<a href="<?php the_permalink(); ?>"><span class="date">[<?php the_time('Y-m-d'); ?>]</span><span class="title"><img src="<?php echo get_template_directory_uri().'/img/biao3.gif'?>">&nbsp;&nbsp;<?php the_title(); ?></span></a>
							
						</li>

		<?php
				endforeach;?>
		</ul>
	<?php
		echo $args['after_widget'];
    }
 
}
add_action( 'widgets_init', create_function( '', 'register_widget("LmCategory");' ) );
?>