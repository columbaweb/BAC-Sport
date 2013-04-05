   <div id="clients" class="grid_12">      
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Clients') ) : ?><?php endif; ?>
   </div>
</div>


<footer>
   <div class="inner-container">
      <div class="grid_4 col1">
         <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : ?><?php endif; ?>
      </div>
      <div class="grid_4 col2">
         <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : ?><?php endif; ?>
      </div>
      <div class="grid_4 col3">
         <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : ?><?php endif; ?>
      </div>   
   </div>
   <div id="footer-copy">
      <div class="inner-container">
         <p class="grid_6 alpha">© Copyright <?php echo date('Y'); ?> Reynolds Digital Ltd. All Rights Reserved</p>
         <div class="grid_6 omega">
            <?php wp_nav_menu( array( 'theme_location' => 'footnav' ) ); ?>
         </div>
      </div>
   </div>   
</footer>
<?php wp_footer(); ?>



</body>
</html>