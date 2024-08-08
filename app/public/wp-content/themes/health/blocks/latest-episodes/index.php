<?php
$args = array(
  'post_type' => 'stories',
  'posts_per_page' => 6,
  'orderby' => 'date',
  'order' => 'DESC',
  'post__not_in' => array(get_the_ID()),
  'tax_query' => array(
    array(
      'taxonomy' => 'stories-type',
      'operator' => 'NOT EXISTS',
    ),
  ),
);

$latest = new WP_Query($args);

if ($latest->have_posts()) : ?>
  <section class=" resp-[py/150/80] overflow-hidden">
    <div class="container">
      <h2 class="title-2 resp-[mb/45]">
        Most recent
      </h2>
      <div class="swiper latest_episodes !overflow-visible w-full h-full flex">
        <ul class="swiper-wrapper">
          <?php
          while ($latest->have_posts()) : $latest->the_post();
            renderComponent('stories/latest-item', ['id' => get_the_ID()]);
          endwhile;
          wp_reset_postdata();
          ?>
        </ul>
      </div>
    </div>

  </section>
<?php endif; ?>