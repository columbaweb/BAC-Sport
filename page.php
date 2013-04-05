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
      <div <?php post_class('grid_9'); ?> >
         <?php the_content(); ?>
      </div>
   <?php endwhile; endif; ?>

   <?php get_sidebar(); ?>
</div>   

<?php get_footer(); ?>