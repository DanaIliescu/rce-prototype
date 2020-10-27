<?php
add_theme_support( 'post-thumbnails');
add_theme_support( 'title-tag');

// NOTE(Dana): Add custom scripts and styling
function rce_add_scripts() {
	wp_register_script('cglwebsite_scripts', "/wp-content/themes/rce/assets/js/scripts.min.js", array(), '1', true);
	wp_enqueue_script('cglwebsite_scripts');
}
add_action( 'wp_enqueue_scripts', 'rce_add_scripts' );

function rce_add_styles() {
	wp_register_style('cglwebsite_styles', "/wp-content/themes/rce/assets/css/style.min.css", array(), '1');
	wp_enqueue_style('cglwebsite_styles');
}
add_action("wp_enqueue_scripts", "rce_add_styles");


// NOTE(Dana): Remove categories functionallity
function rce_unregister_categories() {
    unregister_taxonomy_for_object_type( 'category', 'post' );
}
add_action( 'init', 'rce_unregister_categories' );

// NOTE(Dana): Add formatted date fields to post rest api
add_action( 'rest_api_init', 'create_api_formatted_dates_field' );
function create_api_formatted_dates_field() {
    register_rest_field( 'post', 'formatted-dates', array(
           'get_callback'    => 'get_post_meta_for_api',
           'schema'          => null,
        )
    );
}
function get_post_meta_for_api( $object ) {
    //get the id of the post object array
	$post_id = $object['id'];
	$date = array(
		"date" => get_the_date("d", $post_id),
		"monthYear" => get_the_date("M y", $post_id)
	);
	return $date;
}

// NOTE(Dana): Register main navigation
add_action( 'after_setup_theme', 'register_header_menu' );
function register_header_menu() {
	register_nav_menu( 'header_menu', __( 'Header Navigation', 'cglwebsite' ) );
}

// NOTE(Dana): Remove comments entirely (Source: https://gist.github.com/mattclements/eab5ef656b2f946c4bfb)

// // Disable support for comments and trackbacks in post types
// function rce_disable_comments_post_types_support() {
// 	$post_types = get_post_types();
// 	foreach ($post_types as $post_type) {
// 		if(post_type_supports($post_type, 'comments')) {
// 			remove_post_type_support($post_type, 'comments');
// 			remove_post_type_support($post_type, 'trackbacks');
// 		}
// 	}
// }
// add_action('admin_init', 'rce_disable_comments_post_types_support');

// // Close comments on the front-end
// function rce_disable_comments_status() {
// 	return false;
// }
// add_filter('comments_open', 'rce_disable_comments_status', 20, 2);
// add_filter('pings_open', 'rce_disable_comments_status', 20, 2);

// // Hide existing comments
// function rce_disable_comments_hide_existing_comments($comments) {
// 	$comments = array();
// 	return $comments;
// }
// add_filter('comments_array', 'rce_disable_comments_hide_existing_comments', 10, 2);

// // Remove comments page in menu
// function rce_disable_comments_admin_menu() {
// 	remove_menu_page('edit-comments.php');
// }
// add_action('admin_menu', 'rce_disable_comments_admin_menu');

// // Redirect any user trying to access comments page
// function rce_disable_comments_admin_menu_redirect() {
// 	global $pagenow;
// 	if ($pagenow === 'edit-comments.php') {
// 		wp_redirect(admin_url()); exit;
// 	}
// }
// add_action('admin_init', 'rce_disable_comments_admin_menu_redirect');

// // Remove comments metabox from dashboard
// function rce_disable_comments_dashboard() {
// 	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
// }
// add_action('admin_init', 'rce_disable_comments_dashboard');

// // Remove comments links from admin bar
// function rce_disable_comments_admin_bar() {
// 	if (is_admin_bar_showing()) {
// 		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
// 	}
// }
// add_action('init', 'rce_disable_comments_admin_bar');
