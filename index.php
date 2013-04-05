<?php get_header(); ?>

<div id="slider">
      <?php echo get_new_royalslider(1); ?>
      <section id="slider-caption">
	<?php query_posts('post_type=slider-caption&posts_per_page=3'); ?>
	<?php if ( have_posts() ) : $i = -1;?>	
	<?php while (have_posts()) : the_post(); $i++;?>
            <div class="container col-<?php echo $i+1; ?>">
               <h2><?php the_title(); ?></h2>
               <?php the_content(); ?>
            </div>
         <?php endwhile; endif; wp_reset_query(); ?>
      </section>      
   </div>
   
   <section id="promo-box">  
      <?php query_posts('post_type=promo&posts_per_page=1'); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	   <div class="grid_12 push_12">
	      <?php the_content(); ?>
	      <a href="contact">Contact Us</a>
	   </div>
	<?php endwhile; endif; wp_reset_query(); ?>
   </section>

<div id="content">
   <section id="holidays">
      <h2 class="grid_12">Popular Sporting Holidays</h2>    
      <?php query_posts('post_type=sports&posts_per_page=6'); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	   <div <?php post_class('grid_4 p_thumb'); ?> >
               <a class="post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
               <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
               <?php the_excerpt(); ?>
            </div>
	<?php endwhile; endif; wp_reset_query(); ?>  
   </section>
  
     
   <section class="event-feed grid_9">
      <h2>Upcoming Events</h2> 
     <?php 
         $current_time = current_time('mysql'); 
         list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $current_time );
         $current_timestamp = $today_year . $today_month . $today_day . $hour . $minute;

         $args = array( 'post_type' => 'event', 'meta_key' => '_start_eventtimestamp', 'orderby'=> 'meta_value_num', 'order' => 'ASC', 'posts_per_page' => 6, );
         $events = new WP_Query( $args );
         if ( $events->have_posts() ) : while ( $events->have_posts() ) : $events->the_post(); ?>
            <div class="event-single">
               <a class="post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
               <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
               <ul class="event-meta">       
                  <li>When: 
                     <strong>
                        <?php 
                           // Gets the event start month from the meta field
                           $month = get_post_meta( $post->ID, '_start_month', true );
                           // Converts the month number to the month name
                           $month = $wp_locale->get_month_abbrev( $wp_locale->get_month( $month ) );
                           // Gets the event start day
                           $day = get_post_meta( $post->ID, '_start_day', true );
                           // Gets the event start year
                           $year = get_post_meta( $post->ID, '_start_year', true );
                        ?>
                        <?php echo $month . ' ' . $day . ' ' . $year; ?> - 

                        <?php 
                           // Gets the event start month from the meta field
                           $month = get_post_meta( $post->ID, '_end_month', true );
                           // Converts the month number to the month name
                           $month = $wp_locale->get_month_abbrev( $wp_locale->get_month( $month ) );
                           // Gets the event start day
                           $day = get_post_meta( $post->ID, '_end_day', true );
                           // Gets the event start year
                           $year = get_post_meta( $post->ID, '_end_year', true );
                        ?>
                        <?php echo $month . ' ' . $day . ' ' . $year; ?>
                     </strong>
                  </li>
                  <li>Where: <strong><?php $event-location; echo get_post_meta($post->ID, '_event_location', true); ?></strong></li>   
                  <li>Sports: <strong><?php the_terms( $post->ID, 'event_category' ,  ' ' ); ?></strong></li>
               </ul>
               <?php echo excerpt(32); ?>
            </div>
         <?php endwhile; endif; ?> 
      </section>
      
      <div class="grid_3 sidebar omega">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Events Sidebar') ) : ?><?php endif; ?>
     </div>
   
</div>

<?php get_footer(); ?>