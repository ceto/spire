<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('ps'); ?>>
    <header class="row">
      <div class="columns">
          <h1 class="prettytitle"><?php the_title(); ?></h1>
          <?php get_template_part('templates/entry-meta'); ?>
      </div>
    </header>
    <div class="row">
      <div class="columns medium-10 large-8 medium-push-2">
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
        <footer>
          <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
      </div>
    </div>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
