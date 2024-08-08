<?php
$item_id = get_the_ID();

$post = get_post($item_id);
$video = get_field('video', $item_id);
$references = get_field('references', $item_id);
?>
<main id="primary" class="site-main">
    <section class="container resp-[pt/61]">
        <div id="video-container" class="aspect-ratio-[1280/680] overflow-hidden resp-[mb/30] relative" data-video="<?= $video ?>">
            <div id="thumbnail-container">
                <?php echo get_the_post_thumbnail($item_id) ?>
                <?php if ($video) { ?>
                    <div id="play-button" class="flex position-center opacity-80 hover:opacity-100 resp-[svg-width/80] resp-[svg-height/80]">
                        <?php renderAssetsSVG('watch'); ?>
                    </div>
                <?php } ?>
            </div>
            <div id="video"></div>
        </div>

        <div class="flex items-start justify-between resp-[gap/40] flex-col tablet:flex-row relative">
            <div class="w-full resp-[w-max/710]">
                <h1 class="resp-[font/48/24] leading-none font-georgia-bold resp-[mb/16]">
                    <?= get_the_title($item_id) ?>
                </h1>
                <p>
                    <?= get_the_content($item_id) ?>
                </p>
            </div>

            <div class="flex  flex-col-reverse tablet:flex-row w-full resp-[w-max/545] sticky resp-[top/70]">
                <div class="flex tablet:flex-col resp-[gap/35] tablet:resp-[px/24] tablet:border-r-[1px] border-white">
                    <div>
                        <div class="flex-center resp-[width/81/40] resp-[height/81/40] rounded-full bg-[#707070] cursor-pointer save-item  <?php if (isCookieValueExists('save', $item_id)) echo 'added' ?>" data-id="<?= $item_id ?>">
                            <div class="resp-[svg-width/48/28] resp-[svg-height/48/28]">
                                <?php renderAssetsSVG('controls/save'); ?>
                            </div>
                        </div>
                        <div class="text-center resp-[mt/10] resp-[font/16] text-white font-helvetica-bold">
                            41.4K
                        </div>
                    </div>
                    <div>
                        <div class="flex-center resp-[width/81/40] resp-[height/81/40] rounded-full bg-[#707070] ">
                            <div class="resp-[svg-width/48/28] resp-[svg-height/48/28]">
                                <?php renderAssetsSVG('controls/like'); ?>
                            </div>
                        </div>
                        <div class="text-center resp-[mt/10] resp-[font/16] text-white font-helvetica-bold">
                            233.8K
                        </div>
                    </div>
                    <div>
                        <div class="flex-center resp-[width/81/40] resp-[height/81/40] rounded-full bg-[#707070] ">
                            <div class="resp-[svg-width/48/28] resp-[svg-height/48/28]">
                                <?php renderAssetsSVG('controls/comment'); ?>
                            </div>
                        </div>
                        <div class="text-center resp-[mt/10] resp-[font/16] text-white font-helvetica-bold">
                            694
                        </div>
                    </div>
                    <div>
                        <div class="flex-center resp-[width/81/40] resp-[height/81/40] rounded-full bg-[#707070] ">
                            <div class="resp-[svg-width/48/28] resp-[svg-height/48/28]">
                                <?php renderAssetsSVG('controls/reply'); ?>
                            </div>
                        </div>
                        <div class="text-center resp-[mt/10] resp-[font/16] text-white font-helvetica-bold">
                            3052
                        </div>
                    </div>
                </div>
                <div class="flex flex-col resp-[gap/20] tablet:resp-[px/24] resp-[mb/15] w-full resp-[w-max/400]">
                    <div class="flex items-center resp-[gap/18]">
                        <div class="resp-[width/78/50] resp-[height/78/50] rounded-full bg-[#FFBEBE] overflow-hidden">
                            <img src="<?= get_avatar_url(1, array('size' => 450)) ?>" alt="">
                        </div>
                        <div class="resp-[font/24/18] font-helvetica-bold ">
                            <?= getAuthorByPostId($item_id) ?>
                        </div>
                    </div>
                    <?php $terms = wp_get_post_terms($item_id, 'stories-tag'); ?>
                    <?php if ($terms) { ?>
                        <div class="flex flex-col">
                            <div class="resp-[font/24/18] font-helvetica-bold resp-[mb/8]">
                                Tags
                            </div>

                            <div class="flex flex-col resp-[gap/8]">
                                <?php $terms = wp_get_post_terms($item_id, 'stories-tag'); ?>
                                <?php foreach ($terms as $term) { ?>
                                    <div class="text-accent">
                                        #<?= $term->name; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($references) { ?>
                        <div class="flex flex-col">
                            <div class="resp-[font/24/18] font-helvetica-bold resp-[mb/8]">
                                References
                            </div>

                            <div class="resp-[font/12] font-helvetica-medium">
                                <?= $references ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php renderBlock('latest-episodes'); ?>
    <?php renderReusableBlock('163'); ?>
    <?php renderReusableBlock('166'); ?>
</main>