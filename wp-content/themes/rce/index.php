<?php get_header(); ?>

<div class="Row Row--top">
	<div class="Discover">
		<div class="Letters">
			Discover by:
			<?php $letters = array('All', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Æ', 'Ø', 'Å');?>
			<?php foreach($letters as $letter): ?>
				<div class="Letter <?echo (!isset($_GET['tag']) && isset($_GET['tagStartsWith']) && $_GET['tagStartsWith'] == $letter) ? 'selected' : ''?> <?echo ((!isset($_GET['tag']) && !isset($_GET['tagStartsWith']) && $letter == 'All')) ? 'selected' : ''?>"
					data-filter="<?=$letter?>"><?=$letter?></div>
			<?php endforeach;?>
		</div>
		<?php if (isset($_GET['tagStartsWith'])):?>
			<?php
				$letter = $_GET['tagStartsWith'];
				$args = array("hide_empty" => true, 'orderby' => 'tag_count', 'order' => 'DESC');
				$tags = get_tags($args);
			?>
			<div class="Tags">
				<?php $hasResults = false;?>
				<?php if($tags) : foreach($tags as $tag): ?>
					<?php if ($letter == 'All'):?>
						<?php $hasResults = true;?>
						<div class="Tag Tag--discover" data-filter="<?=$tag->slug?>"><?=$tag->name?></div>
					<?php else: ?>
						<?php if (strtolower($tag->slug[0]) == strtolower($letter)):?>
							<?php $hasResults = true;?>
							<div class="Tag Tag--discover" data-filter="<?=$tag->slug?>"><?=$tag->name?></div>
						<?php endif; ?>
					<?php endif; ?>
					<?php endforeach; endif;?>
				<?php if (!$hasResults):?>
					<div class="NoTagFeedback">
						<div class="NoTagFeedback-title">Sorry, no articles whose tag with '<?echo $letter;?>' yet 😢</div>
						<div class="NoTagFeedback-message">Come back later, where we hopefolly have some articles ready for you.</div>
					</div>
				<?php endif; ?>
			</div>
		<?php else: ?>
			<?php if (isset($_GET['tag'])):?>
				<?php $tag_name = get_term_by('slug', $_GET['tag'], 'post_tag')->name; ?>
				<?php $the_query = new WP_Query( 'tag='.$_GET['tag'] ); ?>
				<?php if ($the_query->have_posts()) : ?>
					<div class="Chosen-tag">
						<div>Chosen tag:</div>
						<div class="Tag Tag--discover Tag--chosen"><?echo($tag_name);?></div>
					</div>
				<?php endif; ?>
				<?php if ($the_query->have_posts()) : while ($the_query->have_posts()): $the_query->the_post(); ?>
					<?php 
						$tags = get_the_tags();
						$imageUrl = get_the_post_thumbnail_url(get_the_id(), 'medium');
						$tagSlug_string = $tags ? join(',', wp_list_pluck($tags, 'slug')) : "";
					?>
					<div class="ArticleItem filtr-item" data-category="<?=$tagSlug_string?>">
						<div class="ArticleItem-coverImage">
							<a class="ArticleItem-link" style="background-image: url('<?=$imageUrl?>')" href="<?php the_permalink();?>"></a>
						</div>
						<h2 class="ArticleItem-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
					</div>
				<?php endwhile; else : ?>
					<div>There are no articles with this tag.</div>
					<div id="Discover-btn">Discover</div>
				<?php endif; ?>

			<?php else: ?>
				<?php
					$args = array("hide_empty" => true, 'orderby' => 'tag_count', 'order' => 'DESC');
					$tags = get_tags($args);
				?>
				<div class="Tags">
					<?php if($tags) : foreach($tags as $tag): ?>
						<div class="Tag Tag--discover" data-filter="<?=$tag->slug?>"><?=$tag->name?></div>
					<?php endforeach; endif;?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
