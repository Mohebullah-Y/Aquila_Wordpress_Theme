<?php
/**
 * Enqueue theme assets
 * 
 * @package Aquila
 */
//We should not add every thing just in AQUILA_THEME class so we use another class to divide functionality
namespace Aquila_Theme\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets {
  use Singleton;
  protected function __construct(){
     Assets::get_instance();
     $this->setup_hooks();
   }
   protected function setup_hooks(){
    //actions and filters
    /**
     * Actions
     */
    // add_action('after_setup_theme',[$this, 'setup_theme']);
   }
   public function setup_theme(){
    //   add_theme_support('title-tag');
   }
}