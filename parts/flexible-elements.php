<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
} // Exit if accessed directly
global $section_counter;

// check if ACF is available and the flexible content field has rows of data
if ( function_exists( 'have_rows' ) && have_rows( 'sections' ) ) {

  // loop through the rows of data
  while ( have_rows( 'sections' ) ) {

    the_row();
    $layout = get_row_layout();
    include( locate_template( 'parts/layout/' . $layout . '.php' ) );
    $section_counter++;
  }

}