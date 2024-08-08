<section class="container resp-[py/120/80]">
    <h1 class="title-1 resp-[mb/80/30]">
        Articles
    </h1>

    <form action="/stories" role="search" method="get" class="stories-fillter flex resp-[pb/30] resp-[mb/40] resp-[gap/30] w-full overflow-scroll scrollbar-hide">
        <?php
        $terms = get_terms([
            'taxonomy' => 'stories-category',
            'hide_empty' => false,
        ]);
        foreach ($terms as $i => $term) { ?>
            <div class="checkbox-wrap">
                <input id="category-<?= $i ?>" name="category[]" type="checkbox" value="<?= $term->slug ?>" class='hidden' <?php if (isset($_GET["category"])) {
                                                                                                                                foreach ($_GET["category"] as $category) {
                                                                                                                                    if ($category === $term->slug) {
                                                                                                                                        echo 'checked';
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            } ?>>
                <label for="category-<?= $i ?>">
                    <?= $term->name ?>
                </label>
            </div>

        <?php } ?>
    </form>

    <ul class="flex flex-wrap resp-[gap-x/16] resp-[gap-y/60/20]">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'post_type' => 'stories',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $paged,
            'relation' => 'AND'
        );

        if (isset($_GET["category"]) && $_GET["category"] != 0) {
            $taxQuery[] = [
                'taxonomy' => 'stories-category',
                'field' => 'slug',
                'terms' => $_GET["category"],
                'compare' => 'IN',
            ];
        }
        if (isset($taxQuery)) {
            $args['tax_query'] = $taxQuery;
        }
        $shorts = new WP_Query($args);


        if ($shorts->have_posts()) :
            while ($shorts->have_posts()) : $shorts->the_post();
                $item_id = get_the_ID();
                renderComponent('stories/archive-item', ['id' => get_the_ID()]);
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </ul>

    <?php renderComponent('pagination', ['data' => $shorts]); ?>

</section>