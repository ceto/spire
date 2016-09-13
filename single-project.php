<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

    <div class="row ps projectheadrow">
      <div class="columns medium-10 large-8">
        <header class="pageheader fadeInUp wow">
          <a href="<?= the_permalink(45); ?>" class="backtowork">
            <i class="icon icon--times"></i>
          </a>
          <h1 class="pageheader__title"><?php the_title(); ?></h1>
        </header>
        <div class="projectcontent fadeInUp wow" data-wow-delay="125ms" data-wow-duration="875ms">
          <?php the_content(); ?>
        </div>
        <footer class="fadeInUp wow" data-wow-delay="1250ms" data-wow-duration="500ms">
          <nav class="projectnav">
           <?php
            /**
             *  Infinite next and previous post looping in WordPress
             */
            if( get_adjacent_post(false, '', true) ) {
              previous_post_link('%link', '<i class="icon icon--chevron-left"></i> %title', FALSE);
            } else {
                $first = new WP_Query('post_type=project&posts_per_page=1&order=DESC'); $first->the_post();
                  echo '<a href="' . get_permalink() . '" rel="prev"><i class="icon icon--chevron-left"></i> '.get_the_title().'</a>';
                wp_reset_query();
            };
              echo " | ";
            if( get_adjacent_post(false, '', false) ) {
              next_post_link('%link', '%title <i class="icon icon--chevron-right"></i>', FALSE);
            } else {
              $last = new WP_Query('post_type=project&posts_per_page=1&order=ASC'); $last->the_post();
                  echo '<a href="' . get_permalink() . '" rel="next">'.get_the_title().' <i class="icon icon--chevron-right"></i></a>';
                wp_reset_query();
            };
          ?>
          </nav>
        </footer>
      </div>
    </div>
    <?php
      $the_gallery = get_field('gallery');
      if( $the_gallery ): ?>
        <div class="row expanded collapse fadeInUp wow" data-wow-delay="500ms" data-wow-duration="750ms">
          <div class="columns">
            <aside id="projectcarousel" class="projectcarousel owl-carousel" data-magellan-target="projectcarousel">
              <?php foreach( $the_gallery as $image ): ?>
                <div class="item">
                  <a class="popimg" href="<?= $image['url']; ?>" title="<?php the_title(); ?>">
                    <?= wp_get_attachment_image($image['id'], 'large' ); ?>
                  </a>
                </div>
              <?php endforeach; ?>
            </aside>
          </div>
        </div>
    <?php endif; ?>
  </article>
<?php endwhile; ?>
<?php get_template_part('templates/project','keyboard'); ?>