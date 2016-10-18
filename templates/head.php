<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ( is_page_template('tmpl-landing.php') ) : ?>
  <meta http-equiv="refresh" content="15; url=<?php the_permalink(45); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri();?>/dist/images/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="<?= get_stylesheet_directory_uri();?>/dist/images/favicons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?= get_stylesheet_directory_uri();?>/dist/images/favicons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="<?= get_stylesheet_directory_uri();?>/dist/images/favicons/manifest.json">
  <link rel="mask-icon" href="<?= get_stylesheet_directory_uri();?>/dist/images/favicons/safari-pinned-tab.svg" color="#ff671f">
  <meta name="theme-color" content="#ffffff">
  <?php if ( (!defined('WP_ENV') || \WP_ENV === 'production') && !current_user_can('manage_options') ): ?>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-WNS2L7');</script>
  <!-- End Google Tag Manager -->
  <?php endif; ?>
</head>
