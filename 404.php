<?php get_header(); ?>

<div id="content">
   <div class="grid_4">
      <p class="fof-error">404<p>
   </div>
   <div class="grid_4 fof-links">
      <h2>Here are some useful links:</h2>
      <?php wp_nav_menu( array( 'theme_location' => 'topnav' ) ); ?>
   </div>
   <div class="grid_4 fof-search">
      <h2>Search the website:</h2>
      <p>Can't find what you need? Take a moment a do a search below.</p>
      <?php include ('searchform.php'); ?>
   </div>
</div>   

<?php get_footer(); ?>