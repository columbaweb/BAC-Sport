<?php get_header(); ?>
<div id="slider">
   <?php echo get_new_royalslider(3); ?>
</div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <h1 class="push_12">
            <?php
               foreach((get_the_category()) as $childcat) {
               $parentcat = $childcat->category_parent;
               if ($parentcat) break;  // Save only first parent
               }
               $sep = '';
               $parentname = '';
               if ($parentcat) {
               $parentname = get_cat_name($parentcat);
               echo $parentname;
               $sep = '&nbsp;/&nbsp;';
               }
               foreach (get_the_category() as $category) {
               $cat_name = $category->cat_name;
               if ($cat_name != $parentname) {
               echo $sep;
               echo $cat_name;
               }
               $sep = '&nbsp;/&nbsp;';
               }
            ?>   
         </h1>
   <section id="banner" class="push_12">
      <div id="banner-title">
         <span class="bcr"><?php if(function_exists('bcn_display')){bcn_display();}?></span>
      </div>   
   </section>
   <div id="content" class="grid_9">
      <h2><?php the_title(); ?></h2>
      
      <?php if ( in_category( array( 'upcoming-events', 'football', 'golf', 'cricker', 'rugby', /*etc*/ ) )) { ?>
         <p><strong>When: </strong><?php the_field('event_start_date'); ?> - <?php the_field('event_end_date'); ?></p>
         <p><strong>Where: </strong>Location</p>
      <?php }?>
      
      <?php the_content(''); ?>
      <?php endwhile; else: ?><p>Sorry, no posts matched your criteria.</p>
      <?php endif; ?>
      
      <div class="p_nav">
         <div class="prev"><?php previous_post_link('%link', 'Previous Post', TRUE, '34'); ?></div>
         <div class="next"><?php next_post_link('%link', 'Next Post', TRUE, '34'); ?></div>
      </div>
      
      <div class="related-posts">
         <h3>Other visitors also read:</h3>
         
         <?php if (  in_category('case-studies')) { ?>
         	<?php query_posts('cat=7&orderby=rand&posts_per_page=3'); ?>
         <?php $class = ''; ?>
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php $class = ('side-container' == $class) ? 'middle-container' : 'side-container'; // alternate classes ?>
               <div class="<?php echo $class ?>">
                  <a href="<?php the_permalink(); ?>">
                     <?php the_post_thumbnail(); ?>
                     <span><?php the_title(); ?></span>
                  </a>
               </div>
         <?php endwhile; endif; wp_reset_query(); ?>
          
         <?php } else {  ?>
         	<?php query_posts('cat=2&orderby=rand&posts_per_page=3'); ?>
         <?php $class = ''; ?>
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php $class = ('side-container' == $class) ? 'middle-container' : 'side-container'; // alternate classes ?>
               <div class="<?php echo $class ?>">
                  <a href="<?php the_permalink(); ?>">
                     <?php the_post_thumbnail(); ?>
                     <span><?php the_title(); ?></span>
                  </a>
               </div>
         <?php endwhile; endif; wp_reset_query(); ?>
         <?php }?>       
      </div>
   </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>