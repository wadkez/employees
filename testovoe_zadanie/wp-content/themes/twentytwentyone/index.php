<?php

get_header(); ?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
<?php endif; ?>




<p style="margin: 0 0 0 20px">Изменить параметры шорткода можно в index.php </p>
<?php

	do_shortcode('[employees salary_min="10" salary_max="150" sort="DESC"]');


get_footer();
