<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
		<div class="post-header" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
			<div class="container">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div id="articles">
		<div class="container">
			<div class="single-inner col-lg-8 col-sm-12">
				<?php the_content(); ?>
				<p><a href="../" class="button">Back to articles</a></p>
			</div>
			
		</div>
		</div>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>