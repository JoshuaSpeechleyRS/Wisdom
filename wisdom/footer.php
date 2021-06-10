</div>
<div id="footer">
  <div class="clearfix">
  <div class="container top-row">
	  <div class="row">
	  	<img src="<?php bloginfo('template_directory'); ?>/img/wisdom-logo.png" alt="" />
	  	<ul>
		  	<li><a href="<?php bloginfo('url'); ?>/course-list/">Search Courses</a></li>
		  	<li><a href="<?php bloginfo('url'); ?>/workshop-list/">Search Workshops</a></li>
		  	<li class="social-buttons">
		  		<img src="<?php bloginfo('template_directory'); ?>/img/icon-facebook.png" alt="" />
		  		<img src="<?php bloginfo('template_directory'); ?>/img/icon-linkedin.png" alt="" />
		  		<img src="<?php bloginfo('template_directory'); ?>/img/icon-instagram.png" alt="" />
		  	</li>
	  	</ul>
	  </div>
  </div>
  </div>
  <div class="clearfix">
  <div class="container bottom-row">
	  <div class="row">
  		<?php if(is_active_sidebar('footer-widgets')) dynamic_sidebar('footer-widgets'); ?>
		<div class="col-lg-12 col-sm-12 copyright">
			<p><a href="<?php bloginfo('url'); ?>/privacy-policy/">Our Privacy Policy</a> | Copyright <?= date('Y'); ?> <?php bloginfo('name'); ?></p>
	  </div>
  </div>
  </div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>