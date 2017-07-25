<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
} // Exit if accessed directly ?>

<?php include 'part/header.php' ?>
<section class="single-post">
  <div class="container">
    <div class="row">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h1 class="title">
        <?php the_title(); ?>
      </h1>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post() ?>

<?php get_template_part( 'part/flexible-elements' ) ?>

<?php endwhile ?>

<?php endif ?>

<?php include 'part/footer.php' ?>