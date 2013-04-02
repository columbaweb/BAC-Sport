<?php get_header(); ?>

<div class="grid_8" id="content">
  <h1>About the Author</h1>
	<?php
         $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
      ?>      
      <section class="post-author">
        
         <h2><?php echo $curauth->nickname; ?></h2>
         <p><?php echo $curauth->user_description; ?></p>
      </section>
   
      <h3>Posts by <?php echo $curauth->nickname; ?>:</h3>
         <section class="author-posts">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
               <div>
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                  <?php the_title(); ?></a>,
                  <?php the_time('d M Y'); ?> in <?php the_category('&');?>
               </div>
            <?php endwhile; else: ?>
               <p><?php _e('No posts by this author.'); ?></p>
            <?php endif; ?>
         </section>   
</div>
   
<?php get_sidebar(); ?>

<?php get_footer(); ?>