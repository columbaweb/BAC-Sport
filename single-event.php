<?php get_header(); ?>

<div id="slider">
   <?php echo get_new_royalslider(3); ?>
</div>

<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <h1>Sporting Event: <?php the_title(); ?></h1>
   <section id="banner">
      <div id="banner-title" class="grid_8 alpha">
         <?php if(function_exists('bcn_display')){bcn_display();}?>
      </div>   
      <div class="next">
         <?php next_post_link('%link', 'Next &#8594;'); ?> 
      </div>
   </section>
   
   <div class="grid_9 event-body">
      <h2><?php the_title(); ?></h2>
      <ul class="event-meta">       
         <li>When: 
            <strong>
               <?php 
                  $month = get_post_meta( $post->ID, '_start_month', true );
                  $month = $wp_locale->get_month_abbrev( $wp_locale->get_month( $month ) );
                  $day = get_post_meta( $post->ID, '_start_day', true );
                  $year = get_post_meta( $post->ID, '_start_year', true );
               ?>
               <?php echo $month . ' ' . $day . ' ' . $year; ?> - 
               <?php 
                  $month = get_post_meta( $post->ID, '_end_month', true );
                  $month = $wp_locale->get_month_abbrev( $wp_locale->get_month( $month ) );
                  $day = get_post_meta( $post->ID, '_end_day', true );
                  $year = get_post_meta( $post->ID, '_end_year', true );
               ?>
               <?php echo $month . ' ' . $day . ' ' . $year; ?>
            </strong>
         </li>
         <li>Where: <strong><?php $event-location; echo get_post_meta($post->ID, '_event_location', true); ?></strong></li>
         <li>Sports: <strong><?php the_terms( $post->ID, 'event_category' ,  ' ' ); ?></strong></li>
      </ul>
      <?php the_content(''); ?>
      <h2>Contact Us</h2>
               <?php if (function_exists('iphorm')) echo iphorm(2); ?>

       <div class="related-events">
         <h3>Popular Events</h3>
         <?php query_posts('post_type=event&orderby=rand&posts_per_page=3'); ?>
         <?php $class = ''; ?>
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>         
            <?php $class = ('side-container' == $class) ? 'middle-container' : 'side-container'; // alternate classes ?>
               <div class="grid_3 <?php echo $class ?>">
                  <a href="<?php the_permalink(); ?>">
                     <?php the_post_thumbnail(); ?>
                     <span><?php the_title(); ?></span>
                  </a>
               </div>
         <?php endwhile; endif; wp_reset_query(); ?>
      </div>
      
   <?php endwhile; else: ?><p>Sorry, no posts matched your criteria.</p>
   <?php endif; ?>
   
   </div>
   
   <div class="grid_3 sidebar">
      <div class="box upcoming-events">
         <h2 class="widgettitle">Upcoming Events</h2> 
            <?php if ( has_term('motorsport', 'event_category')) { $args = array('order' => 'ASC', 'posts_per_page' => 4, 'tax_query' => array( array('taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'motorsport')) );  } 
            elseif ( has_term('football', 'event_category')) { $args = array('order' => 'ASC', 'posts_per_page' => 4, 'tax_query' => array( array('taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'football')) ); } 
            elseif ( has_term('rugby', 'event_category')) { $args = array('order' => 'ASC', 'posts_per_page' => 4, 'tax_query' => array( array('taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'rugby')) ); } 
            elseif ( has_term('cricket', 'event_category')) { $args = array('order' => 'ASC', 'posts_per_page' => 4, 'tax_query' => array( array('taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'cricket')) ); } 
            elseif ( has_term('tennis', 'event_category')) { $args = array('order' => 'ASC', 'posts_per_page' => 4, 'tax_query' => array( array('taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'tennis')) ); } 
            elseif ( has_term('golf', 'event_category')) { $args = array('order' => 'ASC', 'posts_per_page' => 4, 'tax_query' => array( array('taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'golf')) ); } 
            elseif ( has_term('other-sports', 'event_category')) { $args = array('order' => 'ASC', 'posts_per_page' => 4, 'tax_query' => array( array('taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'other-sports')) ); ?>
            <?php } else {  ?>
               <p>No upcoming events</p>
            <?php }?>
			
         <?php 				
            $events = new WP_Query( $args );
            if ( $events->have_posts() ) : while ( $events->have_posts() ) : $events->the_post(); ?>
               <div class="upcoming-event-excerpt">
                  <a class="post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                  <h2 class="eventname"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h2>
                  <ul class="event-meta">       
                     <li>
                           <?php 
                              $month = get_post_meta( $post->ID, '_start_month', true );
                              $month = $wp_locale->get_month_abbrev( $wp_locale->get_month( $month ) );
                              $day = get_post_meta( $post->ID, '_start_day', true );
                              $year = get_post_meta( $post->ID, '_start_year', true );
                           ?>
                           <?php echo $month . ' ' . $day; ?> - 
                           <?php 
                              $month = get_post_meta( $post->ID, '_end_month', true );
                              $month = $wp_locale->get_month_abbrev( $wp_locale->get_month( $month ) );
                              $day = get_post_meta( $post->ID, '_end_day', true );
                              $year = get_post_meta( $post->ID, '_end_year', true );
                           ?>
                           <?php echo $month . ' ' . $day . ' ' . $year; ?>
                     </li>
                  </ul>
               </div>   
            <?php endwhile; endif; wp_reset_query(); ?>                 
      </div>
   
   
      <div class="box more-events">
         <h2 class="widgettitle">More Events</h2>
         <select name="drop_cat" onChange='document.location.href=this.options[this.selectedIndex].value;'>
            <option value=""><?php echo attribute_escape(__('Select Event')); ?></option>
            <?php
               $args = array( 'post_type' => 'event', 'meta_key' => '_start_eventtimestamp', 'orderby'=> 'meta_value_num', 'order' => 'ASC', 'posts_per_page' => -1 );
               $events = new WP_Query( $args );
               if ( $events->have_posts() ) : while ( $events->have_posts() ) : $events->the_post(); ?>
                  <option value="<?php echo get_permalink($post->ID);?>" ); ?><?php the_title(); ?></option>
               <?php endwhile; endif; ?>
         </select>
      </div>
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Events Sidebar') ) : ?><?php endif; ?>
   </div>
      
</div> <!-- content end -->
<?php get_footer(); ?>