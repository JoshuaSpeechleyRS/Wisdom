<?php
/**
 * Template Name: Home
 **/ ?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php echo do_shortcode('[3_posts]'); ?>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>