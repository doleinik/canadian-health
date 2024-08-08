<?php $option = get_field('page_content', 'information'); ?>
<header class="bg-black/75 backdrop-blur-[7px] fixed top-0 w-full z-[101] overflow-visible resp-[py/20]">
  <div class="container !resp-[w-max/1430] flex items-center w-full resp-[gap/30] tabletMiddle:py-0">
    <a href="<?= getHomeUrl() ?>" class="resp-[svg-width/150/70] resp-[svg-height/65/35] mr-auto tabletMiddle:mr-0">
      <?php renderUploadsSVG($option['logo']); ?>
    </a>

    <div class=" mr-auto hidden tabletMiddle:block">
      <?php wp_nav_menu(array(
        'container' => 'nav',
        'theme_location' => 'header_menu', // область меню
        // 'walker' => new Custom_Walker_Nav_Menu()
      ));
      ?>
    </div>

    <!-- <div class="ajaxsearch__wrap relative w-full resp-[ml/50/0/0 resp-[w-max/300]">
      <div class="hidden tabletMiddle:block bg-white resp-[px/10] resp-[py/7] header-search rounded-[100px] z-10 relative">
        <?php echo do_shortcode('[wpdreams_ajaxsearchpro id=1]'); ?>
      </div>
      <div class="absolute top-0 h-auto z-0 resp-[pt/30] bg-white rounded-[20px] overflow-hidden">
        <?php echo do_shortcode('[wpdreams_ajaxsearchpro_results id=1 element="div"]'); ?>
      </div>
    </div> -->

    <a href="/save" class="relative resp-[svg-width/24] resp-[svg-height/32] cursor-pointer">
      <?php renderAssetsSVG('sticker'); ?>
      <div class="absolute !hidden resp-[right/-10] resp-[top/-10] resp-[width/20] resp-[height/20] rounded-full bg-accent resp-[font/14] flex-center save-count">
        0
      </div>
    </a>

    <div class="hidden tabletMiddle:block bg-accent resp-[font/24] resp-[px/22] rounded-[10px] resp-[py/16] font-accent open-modal-subscribe">
      <?php esc_attr_e('subscribe', 'health'); ?>
    </div>

    <!-- <a href="/" class="flex items-center resp-[gap/10] font-accent resp-[font/24]">
      <div>
        <?php renderAssetsSVG('profile') ?>
      </div>
      <div>
        Sign in
      </div>
    </a> -->

    <div class="tabletMiddle:hidden header__hamburger flex flex-col resp-[gap/6] resp-[width/24] resp-[height/24] relative duration-300">
      <span class="resp-[height/4] w-full bg-white rounded-full"></span>
      <span class="resp-[height/4] w-full bg-white rounded-full"></span>
      <span class="resp-[height/4] w-full bg-white rounded-full"></span>
    </div>
  </div>
</header>

<div class="modal-menu hidden tabletMiddle:hidden fixed left-0 top-0 h-[100dvh] z-[100] w-screen bg-black">
  <div class="header_menu-mobile resp-[pt/140] resp-[px/15]">
    <?php wp_nav_menu(array(
      'container' => 'nav',
      'theme_location' => 'header_menu',
    ));
    ?>
  </div>
</div>