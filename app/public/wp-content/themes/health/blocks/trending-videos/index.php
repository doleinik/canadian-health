<section class="trending_videos resp-[mt/150] resp-[pt/50/30] resp-[pb/120/80] bg-overlay-black bg-no-repeat bg-cover duration-300 overflow-hidden">
  <div class="container">
    <h2 class="title-2 title-2-green resp-[mb/45]">
      Trending Videos
    </h2>

    <div class="swiper trending_swiper !overflow-visible w-full h-full flex">
      <ul class="swiper-wrapper">
        <?php
        $args = array(
          'post_type' => 'stories',
          'posts_per_page' => 5,
          'orderby' => 'date',
          'order' => 'DESC',
          'tax_query' => array(
            array(
              'taxonomy' => 'stories-type',
              'field'    => 'id',
              'terms'    => ['18'],
            ),
          ),
        );

        $stories = new WP_Query($args);

        if ($stories->have_posts()) :
          while ($stories->have_posts()) : $stories->the_post(); ?>
            <?php renderComponent('stories/trending-item', ['id' => get_the_ID()]); ?>
        <?php endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </ul>
    </div>
  </div>
</section>