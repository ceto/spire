<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ( is_page_template('tmpl-landing.php') ) : ?>
  <meta http-equiv="refresh" content="15; url=<?php the_permalink(45); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>
