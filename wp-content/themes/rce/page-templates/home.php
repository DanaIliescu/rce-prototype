<?php
/* Template Name: Homepage */
?>
<?php get_header(); ?>

<div class="Row Row--top">
	<div class="Column">
		<article class="Article">
			<h1 class="Article-title"><?php the_title(); ?></h1>
			<div><?php the_content(); ?></div>
		</article>
	</div>
</div>