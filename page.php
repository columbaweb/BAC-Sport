<?php get_header(); ?>

<?php get_sidebar(); ?>
<div id="content" class="grid_8">
	<?php while ( have_posts() ) : the_post(); ?>
		<div <?php post_class('p_thumb'); ?> >
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>
