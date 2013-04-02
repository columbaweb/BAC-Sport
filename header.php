<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]>  <html class="no-js" <?php language_attributes(); ?>> <![endif]-->

<html lang="en-GB" class="no-js">
<head>
<title><?php wp_title(); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="google-translate-customization" content="e5d6bb5eebae058d-34e2279d52f0af78-g7424d9382a4f6003-13"></meta>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?'.filemtime( get_stylesheet_directory().'/style.css'); ?>" type="text/css" media="all" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css' />

<?php wp_enqueue_script('jquery');?>
<?php wp_head(); ?>

</head> 

<body <?php body_class(); ?>>
   <div id="top">
      <div class="inner-container">
         <div class="grid_4 alpha">
            <p>Call Today! 0207 456 7100 | <a href="info@bacsport.co.uk">info@bacsport.co.uk</a></p>            
         </div>  
         <div class="grid_8 omega">
            <?php include ('searchform.php'); ?>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header') ) : ?><?php endif; ?>
         </div>
      </div>   
   </div>
   <div id="wrapper" class="container_12">   	
      <header> 
         <div id="logo" class="grid_3"><a href="<?php echo home_url(); ?>" ><img src="<?php bloginfo( 'template_url' ); ?>/images/bac-sport.png" width="150" height="81" alt="Bac Sport" /></a></div>
         <?php wp_nav_menu( array( 'theme_location' => 'topnav' ) ); ?>
      </header>
		
		