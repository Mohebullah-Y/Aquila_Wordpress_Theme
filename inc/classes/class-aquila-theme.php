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
     Menus::get_instance();
     Meta_Boxes::get_instance();
     Sidebars::get_instance();
     Register_Post_Types::get_instance();
     Register_Taxonomies::get_instance();
     Archive_Settings::get_instance();

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
    
    //add custom logo feature
    add_theme_support( 'custom-logo', [
      'header-text'          => ['site-title', 'site-description' ],
      'height'               => 100,
      'width'                => 400,
      'flex-height'          => true,
      'flex-width'           => true,
      'unlink-homepage-logo' => true, 
    ] );

    //add custom background feature
    add_theme_support( 'custom-background', [
      'default-color' => 'fff',
      'default-image' => '',
   ]);
   
   //add post thumbnail feature
    add_theme_support( 'post-thumbnails');
    
   // Register image sizes
    add_image_size('featured-thumbnail', 350, 233, true);
   
    //Add widgets support
    add_theme_support( 'widgets' );

    //Instead of refreshing the whole page, only the part of the page with the updated widget is refreshed (partial refresh).
    add_theme_support( 'customize-selective-refresh-widgets');
 
    //When you enable automatic_feed_links, WordPress adds this to your HTML <head> section
    add_theme_support( 'automatic_feed_links');
    
    //This tells WordPress to output HTML5 markup for certain theme elements. Clean and modern HTML output for better performance, accessibility, and styling flexibility
    add_theme_support( 'html5',
     [
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption',
      'style',
      'script'
    ]
  );

  //this allows us to link custom style sheet for our editor it looks for editor-styles.css and also we can add our own stylesheet file
  add_editor_style();
  
  //This function enables the default block styles.If you don’t add this, your theme might miss out on important default styles, and blocks could look broken or plain on the frontend
  add_theme_support('wp_block_styles');
  
  /*
  This allows content creators to use "wide" and "full" alignment options on certain blocks (like images, cover blocks).If you're using a Cover block or Image block, enabling align-wide lets you choose:
  Wide width – slightly wider than the content area.
  Full width – stretches the block to the full width of the browser window.
  */
  add_theme_support('align-wide');

 //it sets maximum allowed width for any content of our frontend
  global $content_width;
  if(! isset($content_width) ){
     $content_width= 1240 ;
  }

 }
}
