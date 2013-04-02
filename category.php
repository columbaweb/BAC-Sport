<?php get_header(); ?>

<div id="content" class="grid_8">
	<h1><?php single_cat_title(); ?></h1>
	<?php include ('breadcrumb.php'); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div <?php post_class('p_thumb'); ?> >
			<h2><?php the_title(); ?></h2>
	 		<div class="meta">
				<span class="categories">
					<?php foreach((get_the_category()) as $category) {
						if ($category->cat_name != 'Front Page') {
							echo '<a href="' . get_category_link( $category->term_id ) . '"  ' . '>' . $category->name.'</a>  &bull;  ';
							}
						} ?>
				</span>
				<span class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
				<span class="date"><?php the_time('F jS, Y') ?></span>
			</div>		           	
			<?php the_excerpt(); ?>
			<a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
		</div>
	<?php endwhile; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
