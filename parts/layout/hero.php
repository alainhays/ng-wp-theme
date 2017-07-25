<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
} // Exit if accessed directly
?>
<?php

$title        = get_sub_field( 'title' );

?>

<section class="hero">
  <div class="container">
    <div class="row">
      <?php echo (!empty( $title )) ? '<h1 class="hero__title">'. $title .'</h1>' : '' ?>
    </div>
  </div>
</section>
