<?php get_header(); ?>

<div class="container">

  <div class="row">

    <div class="col-md-8 col-sm-12">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php get_template_part('/template-parts/content', get_post_format()); ?>

        <?php endwhile; ?>

      <?php else : get_404_template();
      endif; ?>

    </div>

    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>

  </div>

</div>
</div>
<?php get_footer(); ?>