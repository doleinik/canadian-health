<?php $option = get_field('page_content', 'information'); ?>
<div class="modal-subscribe hidden fixed top-0 left-0 w-full h-full bg-black/80 z-[103] justify-center">
    <div class="bg-white rounded-[20px] relative container:mx-auto resp-[mx/15] resp-[mt/30] resp-[w-max/1200] w-[calc(100%_-_30px)]">
        <div class="overflow-scroll scrollbar-hide resp-[h-max/650] h-[calc(100vh_-_30px)] flex justify-center tablet:justify-between resp-[gap/20]  resp-[px/80/40] resp-[py/50/30]">
            <div class="text-black resp-[w-max/500] text-center flex flex-col justify-center tablet:justify-start">
                <h4 class="text-accent resp-[font/48/30] font-helvetica-bold resp-[mb/40/20]">
                    <?= $option['modal_subscribe']['title'] ?>
                </h4>
                <p class="resp-[font/24/18]">
                    <?= $option['modal_subscribe']['text'] ?>
                </p>
                <div class="modal-subscribe-form ">
                    <?= do_shortcode($option['modal_subscribe']['form']) ?>
                </div>
                <p class="text-gray resp-[font/16] resp-[mt/40/20]">
                    <?= $option['modal_subscribe']['info_text'] ?>
                </p>
            </div>
            <div class="aspect-ratio-[500/540] hidden tablet:block">
                <img src="<?= $option['modal_subscribe']['image']['url'] ?>" alt="">
            </div>
        </div>
        <div class="modal-close  resp-[width/30] resp-[height/30] flex justify-center items-center cursor-pointer hover:scale-[1.05] absolute resp-[right/-15] resp-[top/-15]  bg-accent rounded-full">
            <div class="resp-[svg-width/14] resp-[svg-height/14]">
                <?php renderAssetsSVG('close'); ?>
            </div>
        </div>
    </div>
</div>