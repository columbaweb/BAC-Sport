<?php get_header(); ?>

<div id="slider">
   <?php echo get_new_royalslider(3); ?>
</div>

<h1 class="push_12"><?php single_cat_title(); ?></h1>
<section id="banner" class="push_12">
   <div id="banner-title">
      <span class="bcr"><?php if(function_exists('bcn_display')){bcn_display();}?></span>
   </div>   
</section>

<div id="content" class="grid_9">
   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div <?php post_class('post-excerpt'); ?> >
         <?php if(has_post_thumbnail()) :?><a class="post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><?php endif;?>    
         <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>	           	
         <?php the_excerpt(); ?>        
         <div class="meta">
            <span class="categories">
               <?php foreach((get_the_category()) as $category) {
                  if ($category->cat_name != 'Front Page') {
                     echo '<a href="' . get_category_link( $category->term_id ) . '"  ' . '>' . $category->name.'</a>  |  ';
                  }
               } ?>
            </span>
            <span class="date"><?php the_time('F jS, Y') ?> | </span>
            <span class="author">by <?php the_author_posts_link(); ?> </span>
            <a class="read-more" href="<?php the_permalink(); ?>">Read More &gt;</a>
         </div>	       
         
         
         
         
      </div>
   <?php endwhile; endif; ?>
   
   <div class="pagination">
      <?php wp_pagenavi(); ?>
   </div>
   
	
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>