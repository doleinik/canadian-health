<?php
if (!isset($args['data'])) {
    exit;
}
$data = $args['data'];
?>
<div class="pagination flex justify-center resp-[gap/8] resp-[mt/50/30] resp-[mb/80/40]">
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1; // Get the current page number

    $pagination_args = array(
        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'format' => '?paged=%#%',
        'current' => max(1, $paged),
        'total' => $data->max_num_pages,
        'prev_text' => '<div class="flex-center resp-[gap/5] resp-[py/5] resp-[px/10] rounded-[5px]"><div class="resp-[svg-width/15] resp-[svg-height/20] scale-x-[-1]"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.16699 9.99999H15.8337M15.8337 9.99999L10.0003 4.16666M15.8337 9.99999L10.0003 15.8333" stroke="#EFEFEF" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
</svg></div><div>Previous</div></div>',
        'next_text' => '<div class="flex-center resp-[gap/5] resp-[py/5] resp-[px/10] rounded-[5px]"><div>Next</div><div class="resp-[svg-width/15] resp-[svg-height/20] !pt-0"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.16699 9.99999H15.8337M15.8337 9.99999L10.0003 4.16666M15.8337 9.99999L10.0003 15.8333" stroke="#EFEFEF" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
</svg></div></div>',
        'type' => 'list',
    );

    $pagination_links = paginate_links($pagination_args);

    if ($pagination_links) {
        echo $pagination_links;
    } ?>
</div>