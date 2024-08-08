<section class="">
    <div class="swiper main-banner min-h-screen h-fit !flex justify-center items-center bg-no-repeat bg-cover bg-overlay-black duration-300">
        <div class="swiper-wrapper">
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
                    $i++; ?>
                    <div class="swiper-slide" data-bg="<?= get_the_post_thumbnail_url(get_the_ID()) ?>">
                        <div class="container !flex justify-center items-start flex-col h-full tablet:!resp-[px/80]">
                            <div class="flex resp-[gap/10] resp-[mb/28]">
                                <?php
                                $terms = wp_get_post_terms(get_the_ID(), 'stories-tag');
                                if ($terms) { ?>
                                    <?php foreach ($terms as $term) { ?>
                                        <div class="bg-[#3462A0] resp-[px/10] resp-[pt/5] resp-[pb/3] rounded-[10px] leading-none relative block font-accent  resp-[font/24/16/16]">
                                            <?= $term->name; ?>
                                        </div>
                                <?php }
                                } ?>
                            </div>

                            <div class="title-1 resp-[mb/28] text-line-overflow-2">
                                <?= get_the_title() ?>
                            </div>

                            <p class="resp-[mb/28] font-accent-regular resp-[font/28] text-line-overflow-3">
                                <?= get_the_excerpt() ?>
                            </p>

                            <?php renderComponent('buttons/post', ['id' => get_the_ID()]); ?>
                        </div>
                    </div>
            <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="swiper-button-next after:hidden !resp-[svg-width/50] !resp-[svg-height/50] scale-[-1] !hidden tablet:!block">
            <?php renderAssetsSVG('swiper-arrow') ?>
        </div>
        <div class="swiper-button-prev after:hidden !resp-[svg-width/50] !resp-[svg-height/50] !hidden tablet:!block">
            <?php renderAssetsSVG('swiper-arrow') ?>
        </div>
    </div>
</section>