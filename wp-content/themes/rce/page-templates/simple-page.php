<?php
/* Template Name: Simple page */
?>
<?php get_header(); ?>

<div class="Row Row--top">
	<div class="SimplePage">
		<h2><?php the_title(); ?></h2>
		<div><?php the_content(); ?></div>
	</div>
</div>

<?php get_footer(); ?>