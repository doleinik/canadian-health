<?php
function getAuthorByPostId($id){
    global $post;
    $post = get_post($id);
    $author_id = get_post_field('post_author', $id);
    return get_the_author_meta('display_name', $author_id);
}

function getCookies($name)
{
    $newArr = [];

    if (isset($_COOKIE[$name])) {
        $list = explode(',', $_COOKIE[$name]);
        foreach ($list as &$number) {
            $newArr[] = (int)$number;
        }
    }

    return $newArr;
}

function isCookieValueExists($name, $valueToCheck) {
    if (isset($_COOKIE[$name])) {
        $cookieValues = explode(',', $_COOKIE[$name]);

        return in_array($valueToCheck, $cookieValues);
    }

    return false;
}

function stringToNumbers($inputString) {
    $numbers = array_map('intval', preg_split('/,/', $inputString));
    return array_filter($numbers, function ($number) {
        return !is_nan($number);
    });
}