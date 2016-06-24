<?php
  // 1. customize ACF path
  add_filter('acf/settings/path', 'spire_acf_settings_path');
   function spire_acf_settings_path( $path ) {
      $path = get_stylesheet_directory() . '/lib/acf/';
      return $path;
  }

  // 2. customize ACF dir
  add_filter('acf/settings/dir', 'spire_acf_settings_dir');
  function spire_acf_settings_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/lib/acf/';
    return $dir;
  }

  // 3. Hide ACF field group menu item
  //add_filter('acf/settings/show_admin', '__return_false');

  // 4. Include ACF
  include_once( get_stylesheet_directory() . '/lib/acf/acf.php' );

  //include_once( get_stylesheet_directory() . '/lib/spire-acf.php' );

  include_once( get_stylesheet_directory() . '/lib/spire-customobjects.php' );

  //enable svg upload to media library
  function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');