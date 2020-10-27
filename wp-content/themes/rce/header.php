<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Load jquery -->
<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"
	type="text/javascript"
	data-cookieconsent="ignore"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="Header">
	<div class="Row">
		<a class="Header-logo" href="<?=home_url()?>"></a>
		<div class="Header-navigation">
			<?=wp_nav_menu( array("theme_location"=>"header_menu") )?>
		</div>
	</div>
</div>
