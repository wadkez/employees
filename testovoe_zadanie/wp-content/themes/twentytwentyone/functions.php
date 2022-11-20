<?php

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}
wp_enqueue_script( 'jquery' );
require_once get_template_directory() . '/inc/assets.php';

require_once get_template_directory() . '/inc/twentytwentyone.php';



if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}






