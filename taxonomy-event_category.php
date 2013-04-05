<?php get_header(); ?>

<div id="slider">
   <?php echo get_new_royalslider(3); ?>
</div>

<div id="content">
   <h1>Events: <?php single_cat_title(); ?></h1>
   <section id="banner">
      <div id="banner-title">
         <span class="bcr"><?php if(function_exists('bcn_display')){bcn_display();}?></span>
      </div>   
   </section>
   
   <div class="grid_9"> 
      <section class="event-feed">
         <?php if ( has_term('motorsport', 'event_category')) { ?>
            <?php 
               $current_time = current_time('mysql'); 
               list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $current_time );
               $current_timestamp = $today_year . $today_month . $today_day . $hour . $minute;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
               $args = array('post_type' => 'event', 'meta_key' => '_start_eventtimestamp', 'orderby'=> 'meta_value_num', 'order' => 'ASC', 'showposts' => 20, 'paged' => $paged, 
                             'tax_query' => array( array('taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'motorsport')) );
            ?>
			
         <?php } elseif ( has_term('cricket', 'event_category')) { ?>
            <?php 
               $current_time = current_time('mysql'); 
               list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $current_time );
               $current_timestamp = $today_year . $today_month . $today_day . $hour . $minute;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
               $args = array('post_type' => 'event', 'meta_key' => '_start_eventtimestamp', 'orderby'=> 'meta_value_num', 'order' => 'ASC', 'showposts' => 20, 'paged' => $paged, 
                             'tax_query' => array( array('taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'cricket')) );	
            ?>

         <?php } elseif ( has_term('football', 'event_category')) { ?>
            <?php 
               $current_time = current_time('mysql'); 
               list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $current_time );
               $current_timestamp = $today_year . $today_month . $today_day . $hour . $minute;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;                  
               $args = array('post_type' => 'event', 'meta_key' => '_start_eventtimestamp', 'orderby'=> 'meta_value_num', 'order' => 'ASC', 'showposts' => 20, 'paged' => $paged, 
                             'tax_query' => array( array('taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'football' ) ) );
            ?>
				
         <?php } elseif ( has_term('golf', 'event_category')) { ?>
            <?php 
               $current_time = current_time('mysql'); 
               list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $current_time );
               $current_timestamp = $today_year . $today_month . $today_day . $hour . $minute;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
               $args = array('post_type' => 'event', 'meta_key' => '_start_eventtimestamp', 'orderby'=> 'meta_value_num', 'order' => 'ASC', 'showposts' => 20, 'paged' => $paged, 
                             'tax_query' => array( array( 'taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'golf' ) ) );
            ?>
			
         <?php } elseif ( has_term('other-sports', 'event_category')) { ?>
            <?php 
               $current_time = current_time('mysql'); 
               list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $current_time );
               $current_timestamp = $today_year . $today_month . $today_day . $hour . $minute;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
               $args = array('post_type' => 'event', 'meta_key' => '_start_eventtimestamp', 'orderby'=> 'meta_value_num', 'order' => 'ASC', 'showposts' => 20, 'paged' => $paged, 
                             'tax_query' => array( array( 'taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'other-sports' ) ) );
            ?>
				
         <?php } elseif ( has_term('rugby', 'event_category')) { ?>
            <?php 
               $current_time = current_time('mysql'); 
               list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $current_time );
               $current_timestamp = $today_year . $today_month . $today_day . $hour . $minute;
               
               $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
               $args = array('post_type' => 'event', 'meta_key' => '_start_eventtimestamp', 'orderby'=> 'meta_value_num', 'order' => 'ASC', 'showposts' => 20, 'paged' => $paged, 
			     'tax_query' => array( array( 'taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'rugby' ) ) );
            ?>
			
         <?php } elseif ( has_term('tennis', 'event_category')) { ?>
            <?php 
               $current_time = current_time('mysql'); 
               list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $current_time );
               $current_timestamp = $today_year . $today_month . $today_day . $hour . $minute;
               
               $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
               $args = array('post_type' => 'event', 'meta_key' => '_start_eventtimestamp', 'orderby'=> 'meta_value_num', 'order' => 'ASC', 'showposts' => 20, 'paged' => $paged, 
			     'tax_query' => array( array( 'taxonomy' => 'event_category', 'field' => 'slug', 'terms' => 'tennis' ) ) );
            ?>
			
         <?php } else {  ?>
            <p>No upcoming events</p>
         <?php }?>
			
         <?php 				
            $events = query_posts( $args );
         
         if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
               <div class="event-single">
                  <a class="post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
                  <?php echo excerpt(32); ?>
               </div>
         <?php endwhile; endif; ?>
               
         <div class="pagination">
            <?php wp_pagenavi(); ?>
         </div>

      </section>
   </div> <!-- grid_9 end -->
   
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