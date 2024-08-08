<?php $arr = get_field('block_content') ?>

<section class="bg-accent resp-[py/75]">
  <div class="container flex justify-between resp-[gap/20] flex-col tablet:flex-row">
    <h2 class="resp-[font/32] font-helvetica-bold w-full tablet:resp-[w-max/390] leading-[1.1]">
      <?= $arr['title'] ?>
    </h2>

    <div class="form-subsc flex items-center w-full tablet:resp-[w-max/490/390]">
      <?= do_shortcode($arr['form']) ?>
    </div>
  </div>
</section>