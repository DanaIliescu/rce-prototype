<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php
	$tags = get_the_tags();
	$imageUrl = get_the_post_thumbnail_url(get_the_id(), 'medium');
?>

<div class="Row Row--top">
	<div class="Article">
		<h1 class="Article-title"><?php the_title(); ?></h1>
		<div class="Article-coverImage" style="background-image: url('<?=$imageUrl?>')"></div>
		<div class="Tags">
			<?php if($tags): ?>
				<span class="Tag-label">Tag(s):</span>
				<?php foreach($tags as $tag): ?>
					<span class="Tag" data-filter="<?=$tag->slug?>"><?=$tag->name?></span>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="Row">
			<div><?php the_content(); ?></div>
			<?php if(function_exists('wp_folksonomy_add_form')) wp_folksonomy_add_form();?>
		</div>
	</div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>