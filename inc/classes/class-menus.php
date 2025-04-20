<?php
/**
 * Register Menus
 * 
 * @package Aquila
 */
//We should not add every thing just in AQUILA_THEME class so we use another class to divide functionality
namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Menus {
  use Singleton;
  protected function __construct(){
    //load other classes
     $this->setup_hooks();
   }
   protected function setup_hooks(){
    //actions and filters
    /**
     * Actions
     */
    add_action('init',[$this,'register_menus']);
   }

   public function register_menus() {
    register_nav_menus([
          'aquila-header-menu' => esc_html__( 'Header Menu','aquila'),
          'aquila-footer-menu' => esc_html__( 'Footer Menu','aquila')
     ]);
   }
}