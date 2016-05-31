<div class="row">
  <div class="columns">
    <h2 class="prettytitle">
      <?php the_field("home_title"); ?>
      <small><?php the_field("home_subtitle"); ?></small>
    </h2>
  </div>
</div>
<div class="row">
  <div class="columns medium-10 large-8 medium-push-2">
    <?php get_template_part('templates/content', 'page'); ?>
  </div>
</div>