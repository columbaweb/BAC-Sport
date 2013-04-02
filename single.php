<?php get_header(); ?>
<div id="content" class="grid_8">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class('p_thumb'); ?> >
			<h1><?php the_title(); ?></h1>
			<?php the_content(''); ?>
		</div>
		<?php endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>

	<div class="p_nav">
		<div class="alignright"><?php next_post_link('%link', 'Next &raquo', TRUE, '3'); ?></div>
		<div class="alignleft"><?php previous_post_link('%link', '&laquo Previous', TRUE, '3'); ?> </div>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
