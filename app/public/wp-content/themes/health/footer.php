<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ninesquares
 */

renderComponent('footer');
renderComponent('modals/subscribe');
?>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkBVrP6fiaDBU27v85nJEjxFOwH3HKXw4&callback=initMap" async defer></script>-->
<?php wp_footer(); ?>

</body>

</html>