<?php get_header(); ?>
		<div class="container">
		<?php 
			$page_for_posts_id = get_option( 'page_for_posts' );
			$page_for_posts_obj = get_post( $page_for_posts_id );
			echo apply_filters( 'the_content', $page_for_posts_obj->post_content );
			vc_custom_css($page_for_posts_id);
			
		?>
		
		<div id="articles" class="row">
		<?php if ( have_posts() ) : $x = 0; ?>
			<?php while ( have_posts() ) : the_post(); $x++; 
				$postArray = array(4,7,10,13,16,19,22);
				if ( in_array($x, $postArray) )
					echo '<div class="clearfix"></div>';	
			?>
				<article class="col-lg-4 col-sm-12" id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog');  ?></a>
					<span class="date"><?php echo get_the_date(); ?></span>
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<?php the_excerpt(); ?>	
					<div class="post-footer">
						<a href="<?php the_permalink(); ?>">Read More</a>
					</div>		
				</article>
				
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part( 'loop-templates/content', 'none' ); ?>
		<?php endif; ?>
	</div>
	</div>
</div>
</div>
<?php get_footer(); ?>