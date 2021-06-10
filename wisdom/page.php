<?php get_header(); ?>
<div class="container">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		  	<?php the_content(); ?>	
  	  <?php endwhile; ?>
  <?php else : ?>
  <h2>Not Found</h2>
  <p>Sorry, but you are looking for something that isn't here.</p>
  <?php endif; ?> 
</div>
<?php get_footer(); ?>