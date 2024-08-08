<?php $arr = get_field('block_content') ?>

<section class="container resp-[pt/120/90]  resp-[pb/80]">
    <h2 class="title-1 title-1-blue resp-[mb/45]">
        <?= $arr['title'] ?>
    </h2>

    <ul class="grid resp-[gap-x/32] resp-[gap-y/32] grid-custom">
        <?php
        $args = array(
            'post_type' => 'stories',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'stories-type',
                    'field'    => 'id',
                    'terms'    => ['17'],
                ),
            ),
        );

        $products = new WP_Query($args);
        $i = 0;
        if ($products->have_posts()) :
            while ($products->have_posts()) : $products->the_post();
                $i++;
                renderComponent('stories/top-item', ['item' => $i, 'id' => get_the_ID()]);
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </ul>
</section>