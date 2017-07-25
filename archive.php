<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
} // Exit if accessed directly ?>
<?php include 'part/header.php' ?>
<section class="archive">
  <div class="container">
    <div class="row">
      <div class="title-desc">
        <h1>
          <?php the_archive_title() ?>
        </h1>
        <?php echo (!empty(the_archive_description())) ? '<p class="description">'.the_archive_description() .'</p>' : ''; ?>
      </div>
      <?php // The Loop of posts
          if ( have_posts() ) : ?>
      <div class="archive-post">
        <?php while ( have_posts() ) : the_post(); ?>

        <?php endwhile; ?>
      </div>
      <?php else : ?>
      <p>
        <?php _e( 'No posts found =(', 'iqq' ) ?>
      </p>
      <?php endif;
          // Restore original Post Data
          wp_reset_postdata();
      ?>

      <?php
          //pagination
          $nav = get_the_posts_pagination( array(
            'prev_text'          => __( 'Previous page', 'iqq' ),
            'next_text'          => __( 'Next page', 'iqq' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'iqq' ) . ' </span>',
            'screen_reader_text' => __( 'A' )
          ) );
          $nav = str_replace('<h2 class="screen-reader-text">A</h2>', '', $nav);
          echo $nav;
          ?>
    </div>
  </div>
</section>
<?php include 'part/footer.php' ?>