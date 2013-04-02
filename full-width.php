<?php /* Template Name: Full Width */  ?>
<?php get_header(); ?>
<div id="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<div <?php post_class('grid_12 p_thumb'); ?> >
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>
