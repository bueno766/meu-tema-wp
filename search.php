<?php get_header(); ?>
<div class="container">
  <div class="row">

    <div class="content-area col-sm-12 col-lg-8">

      <?php
      // Se houver resultados exibe o conteúdo, se não exibe um formuládio de buscas
      if (is_search()) :
        $total_results = $wp_query->found_posts;

        echo "<h3 class='mb-3'>" . sprintf(__('%s resultado(s) para "%s"', 'meu-tema'), $total_results, get_search_query()) . "</h3>";

      endif;
      ?>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php get_template_part('/template-parts/content', get_post_format()); ?>

        <?php endwhile; ?>

      <?php else :

        echo "<p>Sua busca não econtrou resultados. Use o formulário abaixo para refazer a busca.</p>";
        get_search_form();

      endif; ?>

      <div class="blog-pagination mb-5">
        <?php next_posts_link('Mais antigos'); ?> <?php previous_posts_link('Mais novos'); ?>
      </div>

    </div>

    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>

  </div>

</div>
</div>
<?php get_footer(); ?>