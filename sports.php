<?php /* Template Name: Sports */  ?>

<?php get_header(); ?>

<div id="slider">
   <?php echo get_new_royalslider(3); ?>
</div> 
<div id="content">
   <?php if(get_field('title' ) != ""): ?>
      <h1><?php the_field('title'); ?></h1>
   <?php endif; ?>
   <section id="banner">
      <div id="banner-title">
         <span class="bcr"><?php if(function_exists('bcn_display')){bcn_display();}?></span>
      </div>   
   </section>
  
  <div class="grid_12">
     <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <div <?php post_class('grid_6 alpha'); ?> >
           <?php the_content(); ?>
        </div>
        <div class="grid_6 omega">
           <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('What Clients Say') ) : ?><?php endif; ?>
        </div>
     <?php endwhile; endif; wp_reset_query(); ?>
     
      <section id="popular-sports">
         <h2>Popular Sports</h2>
            <div id="tabs">
               <ul>
                  <?php query_posts( 'post_type=sports&posts_per_page=-1' ); ?>
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                     <li><a href="#post-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
                  <?php endwhile; endif; wp_reset_query(); ?>
               </ul>                             
               <?php query_posts( 'post_type=sports&posts_per_page=-1' ); ?>
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                  <div id="post-<?php the_ID(); ?>">
                     <div class="tab-content">
                        <div class="grid_8">
                           <?php the_content(); ?> 
                        </div>	
                        <div class="grid_4">
                           <?php if(has_post_thumbnail()) :?><?php the_post_thumbnail(); ?><?php endif;?>                          
                           <?php if(get_field('upcoming_events_calendar_link' ) != ""): ?>
                              <a class="red large" href="<?php the_field('upcoming_events_calendar_link'); ?>">Upcoming Events</a>
                           <?php endif; ?>
                        </div>
                     </div>   	
                  </div>
               <?php endwhile; endif; wp_reset_query(); ?>
            </div>        
     </section>   
     
     <section id="questions">
        <div class="grid_8 alpha">
           <h2>Common Questions</h2>
           <div class="faq">
              <?php echo do_shortcode( '[wp_super_faq show_specific_category=common-questions]' ) ?>
           </div>
        </div>
        <div class="grid_4 omega">
           <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('FAQ') ) : ?><?php endif; ?>
        </div>
     </section>    
  </div>
   <section id="contact" >      
      <div class="grid_4">
         <h2>Notify Me</h2>
         <?php if (function_exists('iphorm')) echo iphorm(3); ?>
         <h3>Get Social</h3>
         <div class="social-links">
   	<a id="phone" href="" target="_blank" ></a>   
   	<a id="rss" href="http://188.121.50.189/~bacsport/feed/" target="_blank" ></a>
   	<a id="google" href="" target="_blank" ></a>
   	<a id="twitter" href="https://twitter.com/bacsport" target="_blank" ></a>
   	<a id="facebook" href="http://www.facebook.com/pages/BAC-Sport/102478672373?fref=ts" target="_blank" ></a>
         </div>
      </div>         
      <div class="grid_8">
         <h2>Contact Us</h2>
         <?php if (function_exists('iphorm')) echo iphorm(2); ?>
      </div>
   </section>
</div>
<?php get_footer(); ?>