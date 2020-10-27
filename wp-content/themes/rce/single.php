<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php
	$tags = get_the_tags();
?>

<div class="Row Row--top">
	<div class="Row">
		<h1 class="Article-title"><?php the_title(); ?></h1>
		<div class="Tags">
			<?php if($tags) : foreach($tags as $tag): ?>
				<div class="Tag" data-filter="<?=$tag->slug?>">#<?=$tag->name?></div>
			<?php endforeach; endif;?>
		</div>
	</div>
	<div class="Row">
		<article class="Article">
			<div><?php the_content(); ?></div>
		</article>
		<?php if(function_exists('wp_folksonomy_add_form')) wp_folksonomy_add_form();?>
	</div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>