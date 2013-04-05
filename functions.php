<?php

@define( 'PARENT_DIR', get_template_directory() );
require_once (PARENT_DIR . '/shortcodes.php');

# Add Scripts
function add_my_scripts() {
   wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '2.6.2', false );
}
add_action('wp_enqueue_scripts', 'add_my_scripts');

# Register Sidebars
if ( function_exists('register_sidebar') )
    register_sidebar(array('name' => 'Homepage Services','before_widget' => '<div id="%1$s" class="box %2$s">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'What Clients Say','before_widget' => '<div id="%1$s" class="box %2$s">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Sidebar','before_widget' => '<div id="%1$s" class="box %2$s">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Footer 1','before_widget' => '<div id="%1$s" class="box %2$s">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Footer 2','before_widget' => '<div id="%1$s" class="box %2$s">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Footer 3','before_widget' => '<div id="%1$s" class="box %2$s">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Header','before_widget' => '<div id="%1$s" class="box %2$s">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Clients','before_widget' => '<div id="%1$s" class="box %2$s">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'FAQ','before_widget' => '<div id="%1$s" class="box %2$s">','after_widget' => '</div>',));
    register_sidebar(array('name' => 'Events Sidebar','before_widget' => '<div id="%1$s" class="box %2$s">','after_widget' => '</div>',));


register_post_type('sports', array(
'label' => 'Sports',
'add_new_item' => 'Add New Sport',
'public' => true,
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => true,
'rewrite' => array('slug' => 'sports'),
'query_var' => true,
'menu_position' => 5,
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

register_post_type('slider-caption', array(
'label' => 'Slider Boxes',
'public' => true,
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => true,
'rewrite' => array('slug' => 'slider'),
'query_var' => true,
'supports' => array('title', 'editor', 'excerpt')
) );

add_theme_support('post-thumbnails', array( 'post', 'page', sports, promo, event, ai1ec_event ) );

function register_my_menus() {
  register_nav_menus(
    array(
      'topnav' => __( 'Top Menu' ),
      'sidenav' => __( 'Side Menu' ),
      'footnav' => __( 'Footer Menu' )
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

if (!function_exists('get_image_path'))  {
function get_image_path() {
	global $post;
	$id = get_post_thumbnail_id();
	// check to see if NextGen Gallery is present
	if(stripos($id,'ngg-') !== false && class_exists('nggdb')){
	$nggImage = nggdb::find_image(str_replace('ngg-','',$id));
	$thumbnail = array(
	$nggImage->imageURL,
	$nggImage->width,
	$nggImage->height
	);
	// otherwise, just get the wp thumbnail
	} else {
	$thumbnail = wp_get_attachment_image_src($id,'full', true);
	}
	$theimage = $thumbnail[0];
	return $theimage;
}
}


# Multiple Featured Images
$args1 = array(
            'id' => 'featured-image-2',
            'post_type' => 'ai1ec_event',      // Set this to post or page
            'labels' => array(
                'name'      => 'Featured image 2 (460 x 180)',
                'set'       => 'Set featured image 2',
                'remove'    => 'Remove featured image 2',
                'use'       => 'Use as featured image 2',
            )
    );

    $args2 = array(
            'id' => 'featured-image-3',
            'post_type' => 'post',
            'labels' => array(
                'name'      => 'Featured image 2',
                'set'       => 'Set featured image 2',
                'remove'    => 'Remove featured image 2',
                'use'       => 'Use as featured image 2',
            )
    );
    
    $args3 = array(
            'id' => 'featured-image-4',
            'post_type' => 'ai1ec_event',
            'labels' => array(
                'name'      => 'Featured image 3 (215 x 180)',
                'set'       => 'Set featured image 3',
                'remove'    => 'Remove featured image 3',
                'use'       => 'Use as featured image 3',
            )
    );
    
    $args4 = array(
            'id' => 'featured-image-5',
            'post_type' => 'event',      // Set this to post or page
            'labels' => array(
                'name'      => 'Event image (460 x 300)',
                'set'       => 'Set event image',
                'remove'    => 'Remove event image',
                'use'       => 'Use as event image',
            )
    );

    new kdMultipleFeaturedImages( $args1 );
    new kdMultipleFeaturedImages( $args2 );
    new kdMultipleFeaturedImages( $args3 );
    new kdMultipleFeaturedImages( $args4 );


# custom excerpt length  -  p h p   e c h o   e x c e r p t ( 4 5 )

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }


# Popular Posts     < ?   p h p   e c h o   p o p u l a r P o s t s ( 3 ) ;   ? >
function popularPosts($num) {
    global $wpdb;
    
    $posts = $wpdb->get_results("SELECT comment_count, ID, post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , $num");
    
    foreach ($posts as $post) {
        setup_postdata($post);
        $id = $post->ID;
        $title = $post->post_title;
        $count = $post->comment_count;
        
        if ($count != 0) {
            $popular .= '<li>';
            $popular .= '<a href="' . get_permalink($id) . '" title="' . $title . '">' . $title . '</a> ';
            $popular .= '</li>';
        }
    }
    return $popular;
}



function filter_search($query) {
    if ($query->is_search) {
	$query->set('post_type', array('post', 'page', 'event', 'sports'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');














remove_filter('term_description','wpautop');

require_once("tbtpaginate.class.php")




?>