<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ninesquares
 */

?>
  <!doctype html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
  <head >
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.youtube.com/iframe_api"></script>

    <link rel="profile" href="https://gmpg.org/xfn/11">
      <?php wp_head(); ?>
  </head>
<body <?php body_class();?> id="body" >
<?php wp_body_open(); ?>
<?php renderComponent('header'); ?>