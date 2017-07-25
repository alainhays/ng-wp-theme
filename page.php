<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
} // Exit if accessed directly ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

  <?php while ( have_posts() ) : the_post() ?>

    <?php get_template_part( 'parts/flexible-elements' ) ?>

  <?php endwhile ?>

<?php endif ?>

<?php get_footer(); ?>