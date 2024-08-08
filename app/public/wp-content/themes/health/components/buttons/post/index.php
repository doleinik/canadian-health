<?php
if (isset($args['id'])) {
    $item_id = $args['id'];
}

$video = get_field('video', $item_id);
?>
<?php if ($video) { ?>
    <a href="<?php the_permalink($item_id); ?>?play=true" class="flex flex-center resp-[gap/4] resp-[font/24] font-accent  text-white rounded-[10px] bg-green resp-[w-min/165] resp-[py/12] text-center">
        watch
    </a>
<?php } else { ?>
    <a href="<?php the_permalink($item_id); ?>" class="flex flex-center resp-[gap/4] resp-[font/24] font-accent  text-white rounded-[10px] bg-green resp-[w-min/165] resp-[py/12] text-center">
        read
    </a>
<?php } ?>