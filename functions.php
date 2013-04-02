<?php

# Add Scripts
function add_my_scripts() {
   wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '2.6.2', false );
}
add_action('wp_enqueue_scripts', 'add_my_scripts');

# Register Sidebars
if ( function_exists('register_sidebar') )
    register_sidebar(array('name' => 'Homepage Services','before_widget' => '<div class="box">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Case Studies','before_widget' => '<div class="box">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Sidebar','before_widget' => '<div class="box">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Footer 1','before_widget' => '<div class="box">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Footer 2','before_widget' => '<div class="box">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Footer 3','before_widget' => '<div class="box">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Header','before_widget' => '<div class="box">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Clients','before_widget' => '<div class="box">','after_widget' => '</div>',));

register_post_type('services', array(
'label' => 'Services',
'public' => true,
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => true,
'rewrite' => array('slug' => 'services'),
'query_var' => true,
'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
) );

register_post_type('promo', array(
'label' => 'Promo',
'public' => true,
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => true,
'rewrite' => array('slug' => 'promo'),
'query_var' => true,
'supports' => array('title', 'editor', 'excerpt')
) );

add_theme_support('post-thumbnails', array( 'post', 'page', services, promo ) );

function register_my_menus() {
  register_nav_menus(
    array(
      'topnav' => __( 'Top Menu' ),
      'sidenav' => __( 'Side Menu' ),
      'headnav' => __( 'Header Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

# Displays the comment authors gravatar if available
function dp_gravatar($size=50, $attributes='', $author_email='') {
global $comment, $settings;
if (dp_settings('gravatar')=='enabled') {
if (empty($author_email)) {
ob_start();
comment_author_email();
$author_email = ob_get_clean();
}
$gravatar_url = 'http://www.gravatar.com/avatar/' . md5(strtolower($author_email)) . '?s=' . $size . '&amp;d=' . dp_settings('gravatar_fallback');
?><img src="<?php echo $gravatar_url; ?>" <?php echo $attributes ?>/><?php
}
}

# Puts link in excerpts more tag
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

# Adds excerpts for pages
add_post_type_support( 'page', 'excerpt' );

# Shortcode in widgets
add_filter('widget_text', 'do_shortcode');

# PHP in widgets
add_filter('widget_text','execute_php',100);
function execute_php($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}

// Limit Post Title
function shortened_title() {
$original_title = get_the_title();
$title = html_entity_decode($original_title, ENT_QUOTES, "UTF-8");
// Set Limit
$limit = "55";
// Set End Text
$ending="...";
if(strlen($title) >= ($limit+3)) {
$title = substr($title, 0, $limit) . $ending; }
echo $title;
}

remove_filter('term_description','wpautop');

class WPMUDEV_Update_Notifications {}

?>