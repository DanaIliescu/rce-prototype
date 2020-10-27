<?php get_header(); ?>

<div class="Row Row--top">
	<div class="Discover">
		<?php if (isset($_GET['tag'])):?>
			<?php $the_query = new WP_Query( 'tag='.$_GET['tag'] ); ?>
			<?php if ($the_query->have_posts()) : while ($the_query->have_posts()): $the_query->the_post(); ?>
				<?php 
					$tags = get_the_tags();
					$imageUrl = get_the_post_thumbnail_url(get_the_id(), 'medium');
					$tagSlug_string = $tags ? join(',', wp_list_pluck($tags, 'slug')) : "";
				?>
				<div class="Chosen-tag">
					<div>Chosen tag:</div>
					<div><? echo($_GET['tag'])?></div>
				</div>
				<div class="Article filtr-item" data-category="<?=$tagSlug_string?>">
					<div class="Article-coverImage">
						<a class="Article-link" style="background-image: url('<?=$imageUrl?>')" href="<?php the_permalink();?>"></a>
					</div>
					<h2 class="Article-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
					<?php if($tags) : foreach($tags as $tag): ?>
						<div class="Tag" data-filter="<?=$tag->slug?>"><?=$tag->name?></div>
					<?php endforeach; endif;?>
					<div class="Article-content"><?php the_excerpt(); ?></div>
					<a class="Article-readMore" href="<?php the_permalink();?>">"Read more"</a>
				</div>
			<?php endwhile; else : ?>
				<div>"There are no articles with this tag."</div>
				<div id="#Discover-btn">Discover</div>
			<?php endif; ?>
		<?php else: ?>
			<!-- Search bar here -->
			<?php
				$args = array(
					"hide_empty" => true
				);
				$tags = get_tags($args);
			?>
			<?php if($tags) : foreach($tags as $tag): ?>
				<div class="Tag Tag--discover" data-filter="<?=$tag->slug?>"><?=$tag->name?></div>
			<?php endforeach; endif;?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
