<?php $option = get_field('page_content', 'information'); ?>

<?php if (!is_page('quick-clips')) { ?>
  <footer class="resp-[pt/65] container flex justify-between items-start resp-[gap/60/20] resp-[pb/110/40] flex-col tablet:flex-row">
    <a href="<?= getHomeUrl() ?>" class="resp-[svg-width/150] resp-[svg-height/64]">
      <?php renderUploadsSVG($option['logo']); ?>
    </a>

    <div class="footer_menu mr-auto">
      <?php wp_nav_menu(array(
        'container' => 'nav',
        'theme_location' => 'footer_menu',
      ));
      ?>
    </div>

    <?php if ($option['social_media']) { ?>
      <ul class="flex resp-[gap/30/20] justify-center">
        <?php foreach ($option['social_media'] as $item) { ?>
          <li>
            <a href="<?= $item['link'] ?>" class="resp-[svg-height/22]" target="_blank">
              <?php renderAssetsSVG('social/' . $item['social']); ?>
            </a>
          </li>
        <?php } ?>
      </ul>
    <?php } ?>
  </footer>
<?php } ?>