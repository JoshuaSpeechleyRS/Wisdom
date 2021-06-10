<?php get_header(); ?>
<div class="container">
	<div class="row">
				
				

				<?php if ( have_posts() ) : $x = 0; ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); $x++; 
						
						$postArray = array(1,2,4,5,6,7,11,12);
						
						if ( in_array($x, $postArray) ){
							$extra_class = 'col-lg-6 col-sm-12';
						}elseif($x == 3){
							$extra_class = 'col-lg-12 col-sm-12';
						}else{
							$extra_class = 'col-lg-4 col-sm-12';
						}
						
						$extra_class = 'col-lg-4 col-sm-12';
						
					?>

						<article <?php post_class($extra_class); ?> id="post-<?php the_ID(); ?>">
							
								
							<header class="entry-header">
						
								
						
								<?php if ( 'post' == get_post_type() ) : ?>
								
									<?php 
										
										echo '<a href="'.get_permalink().'">';
									    the_post_thumbnail('blog');
									    echo '</a>';
												
										 ?>
					
								<?php endif; ?>
								
								<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
								'</a></h4>' ); ?>
								
								<?php echo '<p>'.get_the_excerpt().'</p>'; ?>
								
								
						
							</header><!-- .entry-header -->
						
						
						
						</article><!-- #post-## -->

						
						

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>