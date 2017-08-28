<?php

class wpngtheme_setup {
  static function hooks() {
    add_action( 'wp_enqueue_scripts', array( __CLASS__, 'setting_up_scripts' ), 1, 1 );
    add_action( 'after_setup_theme', array( __CLASS__, 'include_advanced_custom_fields' ) );
    add_action( 'after_setup_theme', array( __CLASS__, 'load_theme_textdomain' ) );
    add_action( 'init', array( __CLASS__, 'add_menu' ) );
    add_action( 'after_setup_theme', array( __CLASS__, 'theme_support' ) );
    add_action( 'init', array( __CLASS__, 'register_post_types' ), 10, 1 );
    add_action( 'wp_footer', array( __CLASS__, 'add_ajax_script' ) );
    // add_action( 'woocommerce_before_main_content', array( __CLASS__, 'my_theme_wrapper_start' ), 10 );
    // add_action( 'woocommerce_after_main_content', array( __CLASS__, 'my_theme_wrapper_end' ), 10 );
    add_action( 'after_setup_theme', array( __CLASS__, 'option_menu' ), 15, 1 );
    add_action( 'acf/init', array( __CLASS__, 'google_maps_api_key' ) );
    add_action( 'after_theme_setup', array( __CLASS__, 'type_of_image' ) );
    add_action( 'wp_footer', array( __CLASS__, 'scripts_to_footer' ) );
    add_action( 'wp_head', array( __CLASS__, 'scripts_to_head' ) );

    // remove_action( 'woocommerce_before_main_content', array(
    //   __CLASS__,
    //   'woocommerce_output_content_wrapper'
    // ), 10 );
    // remove_action( 'woocommerce_after_main_content', array(
    //   __CLASS__,
    //   'woocommerce_output_content_wrapper_end'
    // ), 10 );

    remove_filter ('the_content', 'wpautop'); //removes <p></p>
    remove_filter( 'the_excerpt', 'wpautop' ); //removes <p></p>
  }

  static function scripts_to_head() {
    $scriptGoogle   = get_field( 'g-scripts-header', 'option' );
    $scriptFacebook = get_field( 'f-scripts', 'options' );
    if ( ! empty( $scriptFacebook ) ):
      echo $scriptFacebook;
    endif;
    if ( ! empty( $scriptGoogle ) ):
      echo $scriptGoogle;
    endif;
  }

  static function scripts_to_footer() {
    $scriptGoogle = get_field( 'g-scripts-footer', 'option' );
    if ( ! empty( $scriptGoogle ) ):
      echo $scriptGoogle;
    endif;
  }

  static function type_of_image( $image ) {
    if ( $image === 'logo' ):
      $logo = get_field( 'logo', 'option' );
      if ( ! empty( $logo ) ):
        echo $logo['url'];
      else:
        echo get_template_directory_uri() . '/images/' . $image . '.png';
      endif;
    endif;

    if ( $image === 'favicon' ):
      $favicon = get_field( 'favicon', 'option' );
      if ( ! empty( $favicon ) ):
        echo $favicon['url'];

      else :
        echo get_template_directory_uri() . '/images/favicon.ico';
      endif;
    endif;

  }

  static function google_maps_api_key() {
    $key = get_field( 'google-api-key', 'option' );
    if ( ! empty( $key ) ):
      acf_update_setting( 'google_api_key', $key );
    endif;
  }

  static function add_ajax_script() {
    echo '<script type="text/javascript">var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '";</script>';
  }

  static function register_post_types() {
    /**
     * Here will Custom Post Type be created.
     */


    /*$labels = array(
      'name'               => _x( '', 'Post Type General Name', 'dd' ),
      'singular_name'      => _x( '', 'Post Type Singular Name', 'dd' ),
      'menu_name'          => __( 'Our', 'dd' ),
      'name_admin_bar'     => __( 'Our', 'dd' ),
      'parent_item_colon'  => __( '', 'dd' ),
      'all_items'          => __( 'All', 'dd' ),
      'add_new_item'       => __( 'Insert new', 'dd' ),
      'add_new'            => __( 'Insert new', 'dd' ),
      'new_item'           => __( 'New', 'dd' ),
      'edit_item'          => __( 'Edit', 'dd' ),
      'update_item'        => __( 'Update', 'dd' ),
      'view_item'          => __( 'Show', 'dd' ),
      'search_items'       => __( 'Search', 'dd' ),
      'not_found'          => __( 'No Found', 'dd' ),
      'not_found_in_trash' => __( 'No Found Bin', 'dd' ),
    );
    $args   = array(
      'label'               => __( 'Our', 'dd' ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'thumbnail', 'editor' ),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-list-view',
      'show_in_admin_bar'   => true,
      'show_in_nav_menus'   => true,
      'can_export'          => true,
      'has_archive'         => false,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'rewrite'             => array( 'slug' => 'name_for_post_type' ),
      'capability_type'     => 'post',
      'taxonomies'          => array( 'post_tag', 'category' ),
    );

    register_post_type( 'name_for_post_type', $args );*/

    /***
     * Register Custom Taxonomy
     */

    /*$labels = array(
      'name' => _x('', 'Taxonomy General Name', 'dd'),
      'singular_name' => _x('', 'Taxonomy Singular Name', 'dd'),
      'menu_name' => __('', 'dd'),
      'all_items' => __('All ', 'dd'),
      'parent_item' => __(' Parent', 'dd'),
      'parent_item_colon' => __('', 'dd'),
      'new_item_name' => __('New ', 'dd'),
      'add_new_item' => __('Add new ', 'dd'),
      'edit_item' => __('Edit ', 'dd'),
      'update_item' => __('Update ', 'dd'),
      'view_item' => __('Show ', 'dd'),
      'separate_items_with_commas' => __('Seperate Item With Commas', 'dd'),
      'add_or_remove_items' => __('Add or Remove ', 'dd'),
      'choose_from_most_used' => __('Choose From Most Used', 'dd'),
      'popular_items' => __('Popular Items', 'dd'),
      'search_items' => __('Search ', 'dd'),
      'not_found' => __('No Found In Bin', 'dd'),
    );
    $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'show_tagcloud' => true,
      'rewrite' => array('slug' => '')
    );

    register_taxonomy('', array(''), $args);*/

  }

  static function add_menu() {
    register_nav_menu( 'header', __( 'Header Menu' ) );

    // Set permalinks structure
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%category%/%postname%/' );
  }

  static function setting_up_scripts() {

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', esc_url( get_stylesheet_directory_uri() . '/node_modules/jquery/dist/jquery.min.js' ), array(), '2.2.4' );

    $key = get_field( 'google-api-key', 'option' );
    if ( ! empty( $key ) ):
      wp_register_script( 'google.maps',
        'https://maps.googleapis.com/maps/api/js?key=' . $key );
      wp_enqueue_script( 'core', esc_url( get_stylesheet_directory_uri() ) . "/app.js", array( 'jquery','google.maps' ), true, true );
    else:
      wp_enqueue_script( 'core', esc_url( get_stylesheet_directory_uri() ) . "/app.js", array('jquery'), true, true );
    endif;
    wp_enqueue_style( 'style-core', esc_url( get_stylesheet_directory_uri() . "/style.css" ) );
    wp_localize_script( 'core', 'globals', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
  }

  static function theme_support() {
    $html5 = array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'figure',
      'figcaption',
      'caption'
    );
    add_theme_support( 'html5', $html5 );
    add_theme_support( 'post-formats', $html5 );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
  }

  static function load_theme_textdomain() {
    load_theme_textdomain( 'dd', get_template_directory() . '/languages' );
  }

  static function include_advanced_custom_fields() {

    // If Advanced Custom Fields is not already available.
    if ( ! class_exists( 'acf' ) ) {

      add_filter( 'acf/settings/path', function ( $path ) {
        // update path
        $path = get_stylesheet_directory() . '/lib/acf/';

        return $path;
      } );

      add_filter( 'acf/settings/dir', function ( $dir ) {
        // update path
        $dir = get_stylesheet_directory_uri() . '/lib/acf/';

        return $dir;
      } );

      include( __DIR__ . '/lib/acf/acf.php' );

    }
  }

  static function option_menu() {
    if ( function_exists( 'acf_add_options_page' ) ) {

      acf_add_options_page( array(
        'page_title' => __( 'Theme Options', 'dd' ),
        'menu_title' => __( 'Theme Options', 'dd' ),
        'menu_slug'  => 'wpngtheme',
      ) );
    }
  }

}

class wpngtheme_security extends wpngtheme_setup {
  static function security_check() {
    parent::hooks();
    add_action( 'init', array( __CLASS__, 'disable_stuff' ) );
  }

  static function disable_stuff() {
//Disable Emoji, Move to optimization snippet...
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

//Disable WLW, unless Windows Live Writer is used.
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rsd_link' );

//Disable XML RPC
    add_filter( 'xmlrpc_enabled', '__return_false' );

//Disable feed, unless Comment Feeds are used.
    add_action( 'do_feed', 'wp_die', 1 );
    add_action( 'do_feed_rdf', 'wp_die', 1 );
    add_action( 'do_feed_rss', 'wp_die', 1 );
    add_action( 'do_feed_rss2', 'wp_die', 1 );
    add_action( 'do_feed_atom', 'wp_die', 1 );

  }

}

class wpngtheme extends wpngtheme_security {
  static function startup() {
    parent::security_check();
  }

}

include_once( __DIR__ . "/lib/wp_bootstrap_navwalker.php" );

wpngtheme::startup();

/* For front-end form registration and login */
  function logoutFn() {
    wp_logout();

    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      die();
    } else {
      header("Location: " . $_SERVER['HTTP_REFERER']);
    }
  }

  add_action("wp_ajax_logoutFn", "logoutFn");
  add_action("wp_ajax_nopriv_logoutFn", "logoutFn");

  function loginFn() {
    $creds = array();

    $username = null;
    $password = null;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
      $username = $_POST["username"];
      $password = $_POST["password"];
    } else {
      $username = $_GET["username"];
      $password = $_GET["password"];
    }

    $creds['user_login'] = $username;
    $creds['user_password'] = $password;
    $creds['remember'] = true;
    $user = wp_signon( $creds, false );
    $error = null;

    if ( is_wp_error( $user ) ) {

      $user = checkWpErrors($user);

      wp_send_json( array( 'success' => false, 'error' => $user) );
    }

    wp_send_json( array( 'success' => true, 'user_info' => $user->data) );
  }
  add_action("wp_ajax_loginFn", "loginFn");
  add_action("wp_ajax_nopriv_loginFn", "loginFn");


function checkWpErrors($error) {

  if($error->get_error_code() === 'invalid_username') {

    $error->remove('invalid_username');
    $error->add('invalid_username', 'Invalid username');

  } elseif ($error->get_error_code() === 'invalid_password') {

    $error->remove('invalid_password');
    $error->add('invalid_password', 'Invalid password');

  } elseif ($error->get_error_code() === 'incorrect_password') {

    $error->remove('incorrect_password');
    $error->add('incorrect_password', 'Incorrect password');

  } elseif ($error->get_error_code() === 'invalid_email') {

    $error->remove('invalid_email');
    $error->add('invalid_email', 'Invalid username');

  }

  return $error->get_error_message();
}

  /* TODO: PHP REGISTRATION WITH ACF FIELD */ // function pre_save_player( $post_id ) { // //prepare basic user info // $field_group
  // = acf_get_fields_by_id('14'); // $username = $_POST['acf']['field_5979cc8a77f89']; // $email = $_POST['acf']['field_597af637643c9'];
  // $password = $_POST['acf']['field_597af642643ca']; // //register user // $user_id = wp_create_user( $username, $password,
  // $email ); // // update other user meta, prevent creation of post data // foreach ( $field_group as $key => $value ) { //
  // update_user_meta( $user_id, $value['name'], $_POST['acf'][$value['key']] ); // unset( $_POST['acf'][$value['key']] ); //
  // } // wp_set_current_user($user_id); // wp_set_auth_cookie($user_id); // wp_redirect( home_url() ); // exit; // return 'user_'.
  // $user_id; // } // add_action('acf/validate_value/key=field_597af637643c9', 'validate_email', 10, 4); // add_action('acf/validate_value/key=field_5979cc8a77f89',
  // 'validate_username2', 10, 4); // add_filter('acf/pre_save_post' , 'pre_save_player' ); // function validate_email($valid,
  // $value, $field, $input) { // if (email_exists($value)) { // $valid = 'This E-mail adress already exists'; // } // return
  // $valid; // } // function validate_username2($valid, $value, $field, $input) { // $username = get_field($field['key']);
  // // if ($value == $username) { // $valid = 'This Username already exists'; // } // return $valid; // }