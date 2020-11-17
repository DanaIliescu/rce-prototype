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
					<span class="Tag Tag--article" data-filter="<?=$tag->slug?>"><?=$tag->name?></span>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="Article-content"><?php the_content(); ?></div>
		<div class="AddTag-container">
			<?php if(function_exists('wp_folksonomy_add_form')): ?>
				<?php if($tags && count($tags) < 10): ?>
					<div class="AddTag-info">
						<hr>
						<div class="AddTag-infoTitle">Add a tag to the article</div>
						<div class="AddTag-infoMessage">Tags help other curious readers understand the topic of the articles. Remember to keep them relevant and simple for others to easily understand and identify by them. Read more <a target="_blank" href="http://localhost/rce/tag-system-guide/">here</a>.</div>
					</div>
					<div class="AddTag-btn">Add tag</div>
					<div class="AddTag-form"><?wp_folksonomy_add_form()?></div>
				<?php else: ?>
					<div class="AddTag-btn disabled">Add tag</div>
						<div class='AddTag-feedback'>
						<p class='AddTag-feedbackTitle'>Ups. It looks like the tag limit is reached 😔</p>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		</div>
	</div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>