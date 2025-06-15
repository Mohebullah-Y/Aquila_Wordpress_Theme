<?php
/**
 * Enqueue theme assets
 * 
 * @package Aquila
 */
//We should not add every thing just in AQUILA_THEME class so we use another class to divide functionality
namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets {
  use Singleton;
  protected function __construct(){
    //  wp_die('hello');
    //load other classes
     $this->setup_hooks();
   }
   protected function setup_hooks(){
    //actions and filters
    /**
     * Actions
     */
    add_action('wp_enqueue_scripts',[$this,'register_styles']);
    add_action('wp_enqueue_scripts',[$this,'register_scripts']);
   }
   public function register_styles(){
    // Register Styles
    wp_register_style('bootstrap-css', AQUILA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');
    wp_register_style('slick-css', AQUILA_DIR_URI . '/assets/src/library/css/slick.css', [], false, 'all');
    wp_register_style('slick-theme-css', AQUILA_DIR_URI . '/assets/src/library/css/slick-theme.css', ['slick-css'], false, 'all');
    wp_register_style('style-css', get_stylesheet_uri(), ['bootstrap-css'], filemtime(AQUILA_DIR_PATH . '/style.css'), 'all');
    // Enqueue Styles
    wp_enqueue_style('bootstrap-css');   
    wp_enqueue_style('slick-css');   
    wp_enqueue_style('slick-theme-css');   
    wp_enqueue_style('style-css');
  }
   public function register_scripts(){
    // Register Scripts
    wp_register_script('bootstrap-js', AQUILA_DIR_URI . '/assets/src/library/js/bootstrap.bundle.min.js', ['jquery'], false, true);    
    wp_register_script('slick-js', AQUILA_DIR_URI . '/assets/src/library/js/slick.js', ['bootstrap-js'], false, true);    
    wp_register_script('main-js', AQUILA_DIR_URI . '/assets/main.js', ['slick-js'], filemtime(AQUILA_DIR_PATH . '/assets/main.js'), true);
    // Enqueue Scripts
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('slick-js');
    wp_enqueue_script('main-js');
   }
}