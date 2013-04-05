<?php get_header(); ?>

<div id="slider">
   <?php echo get_new_royalslider(3); ?>
</div>

<div id="content">
   <h1>About the Author</h1>
   <section id="banner">
      <div id="banner-title">
         <span class="bcr"><?php if(function_exists('bcn_display')){bcn_display();}?></span>
      </div>   
   </section>

   <div class="grid_9">
      <?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author')); ?>
      <section class="post-author">
         <?php the_author_image();?>
         <h2><?php echo $curauth->nickname; ?></h2>
         <p><?php echo $curauth->user_description; ?></p>
      </section>
      <h3>Posts by  <?php echo $curauth->nickname; ?>:</h3>
         <section class="author-posts">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
               <div>
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                  <?php the_title(); ?></a>,
                  <?php the_time('d M Y'); ?> in <?php the_category('&');?>
               </div>
            <?php endwhile; else: ?>
               <p>No posts by this author</p>
            <?php endif; ?>
         </section>   
</div>
   
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>