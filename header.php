<!DOCTYPE>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>
    <?php wp_title('&laquo;', true, 'right'); ?>
    <?php bloginfo('name'); ?>
  </title>
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?php wpngtheme::type_of_image( 'favicon' ) ?>" />

  <?php wp_head();?>
  <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
</head>

<body <?php body_class(); ?>>
  <nav class="navbar navbar-default header">
    <div class="container">
      <div class="row">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-navbar" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="logo" href="/"><img class="logo-image" src="<?php wpngtheme::type_of_image( 'logo' ) ?>" alt="logo"></a>
        </div>

        <?php wp_nav_menu( array(
            'menu'            => 'header',
            'theme_location'  => 'header',
            'depth'           => 2,
            'container'       => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'primary-navbar',
            'menu_class'      => 'nav navbar-nav navbar-right navbar-lean underline',
            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
            'walker'          => new wp_bootstrap_navwalker()
          )
        );
        ?>
      </div>
    </div>
  </nav>