<?php

get_header(); ?>


<script>
	$salary_min = 10;
	$salary_max = 150;
</script>

<div class="container">

	<?php

		do_shortcode('[employees salary_min="10" salary_max="150" sort="DESC"]');
	?>
</div>

<?php
get_footer();
