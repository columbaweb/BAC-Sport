<?php get_header(); ?>

<div class="clear"></div>
<h1 class="push_12">Blog Archive</h1>
<section id="banner" class="push_12">
      <div id="banner-title" class="grid_8 alpha">
         <?php if(get_field('subtitle' ) != ""): ?>
            <p><?php the_field('subtitle'); ?></p>
         <?php endif; ?>
      </div>   
      <div class="breadcrumbs"><?php if(function_exists('bcn_display')){bcn_display();}?></div>
   </section>

<div class="grid_8" id="content">
<?php while ( have_posts() ) : the_post(); ?>
<div <?php post_class('p_thumb'); ?> >
	<h2><?php the_title(); ?></a></h2>
	<?php the_excerpt(); ?>
</div>
<?php endwhile; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>