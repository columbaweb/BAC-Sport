<?php /* Template Name: Full Width */  ?>

<?php get_header(); ?>

<div id="slider">
   <?php echo get_new_royalslider(3); ?>
</div>

<div id="content">
   <h1><?php the_title(); ?></h1>
   <section id="banner">
      <div id="banner-title">
         <span class="bcr"><?php if(function_exists('bcn_display')){bcn_display();}?></span>
      </div>   
   </section>
   
   <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <?php if ( is_page('meet-the-team')) { ?>
         <div <?php post_class('team'); ?> >
            <?php the_content(); ?> 
         </div>   
      <?php } else {  ?>
         <div <?php post_class('grid_12'); ?> >
            <?php the_content(); ?>
         </div>
      <?php }?>
   <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>