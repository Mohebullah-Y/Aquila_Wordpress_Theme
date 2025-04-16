<?php
/**
 * Bootstraps the Theme.
 * 
 * @package Aquila
 */
//Bootstraps of the theme means add basic functionality of the theme 
namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME{
   use Singleton;
   protected function __construct(){
    //load other classes
     Assets::get_instance();
     $this->setup_hooks();
   }
   protected function setup_hooks(){
    //actions and filters
    /**
     * Actions
     */
    add_action('after_setup_theme',[$this,'setup_theme']);
   }
   public function setup_theme(){
    //add_theme_support( 'title-tag' ) let wordpress to manage document title which means this theme does not use hard coded title tag and expects wordpress to provide it for us 
    add_theme_support( 'title-tag' );

    add_theme_support( 'custom-logo', [
      'header-text'          => ['site-title', 'site-description' ],
      'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'unlink-homepage-logo' => true, 
    ] );
    add_theme_support( 'custom-background', [
      'default-color' => 'fff',
      'default-image' => '',
  ] );
   }
}
