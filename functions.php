<?php
//wordpress automatically includes fucntions.php file. it is not need to include this file manually
/**
 * Theme Functions
 * 
 * @package Aquila
 */
if(!defined('AQUILA_DIR_PATH')){
    define('AQUILA_DIR_PATH',untrailingslashit(get_template_directory()));
}
if(!defined('AQUILA_DIR_URI')){
    define('AQUILA_DIR_URI',untrailingslashit(get_template_directory_uri()));
}
if(!defined('AQUILA_ARCHIVE_POST_PER_PAGE')){
    define('AQUILA_ARCHIVE_POST_PER_PAGE', 9);
}
if(!defined('AQUILA_SEARCH_RESULTS_POST_PER_PAGE')){
    define('AQUILA_SEARCH_RESULTS_POST_PER_PAGE', 9);
}
require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';
require_once AQUILA_DIR_PATH . '/inc/helpers/template-tags.php';

function aquila_get_theme_instance(){
    \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
}
aquila_get_theme_instance();

// Restore classic widgets in WordPress
add_filter('use_widgets_block_editor', '__return_false');
