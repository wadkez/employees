<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
<?php endif; ?>



<?php
if ( have_posts() ) {
?>

		<ul>
		<?php
			$args = array('post_type' => 'employees');
			$myposts = get_posts( $args );

			foreach( $myposts as $post ){
				setup_postdata($post);
				?>

				<li><a href="<?php the_permalink(); ?>">
					<?php echo get_post_meta($post->ID, 'Name', true) . ' ' .
								get_post_meta($post->ID, 'Salary', true) ?>
				</a></li>

				<?php
			} 
			wp_reset_postdata();
			?>
			</ul>
			
			<?php 
			$salary_min = 6;
			$salary_max = 20;

			$meta_query = array(

				'post_type' => 'employees',			
				'meta_key' => 'Salary',				//вывод по полю SALARY
				'orderby'  => 'meta_value_num',		//Получить значения
				'order'    => 'ASC',				//Сортировка по убыванию
				'posts_per_page'=>'-1',

				//WHERE Salary BETWEEN (array_value) (meta_query = 'WHERE')
				'meta_query' => array(
					'key'     => 'Salary',
					'value'   => array( $salary_min, $salary_max ),	
					'compare' => 'BETWEEN',
					'type'    => 'NUMERIC',
				),

		);


		$query = new WP_Query($meta_query);
		?>

		<ul>
		<?php
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="card col-6 text-center">
				
				<a href="<?php the_permalink(); ?>">
				<?php
					echo  get_post_meta($post->ID, 'Name', true) . ' '
					.get_post_meta($post->ID, 'Salary', true) ?>
				</div>
				
			<?php endwhile; else: ?>
				<?php echo 'Постов не найдено';
		endif; wp_reset_query(); 

		echo do_shortcode('[employees salary_min="5" salary_max="25"]');
		?>
		</ul>

		
	
<?php

}

get_footer();
