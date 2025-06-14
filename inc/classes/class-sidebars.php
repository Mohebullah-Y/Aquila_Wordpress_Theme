<?php
/**
 * Themes Sidebar
 * 
 * @package Aquila
 */

 namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Sidebars {
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
    add_action('widgets_init', [$this, 'register_sidebars']);
    add_action('widgets_init', [$this, 'register_clock_widget']);
   }
   //The register_sidebar is custom function not a built in function
   public function register_sidebars() {
        register_sidebar( [
            'name'          => __( 'Sidebar', 'aquila' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Main sidebar', 'aquila' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] );
        register_sidebar( [
            'name'          => __( 'Footer', 'aquila' ),
            'id'            => 'sidebar-2',
            'description'   => __( 'Footer sidebar', 'aquila' ),
            'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] );
   }
   
   public function register_clock_widget(){
       // add class name of our widget as parameter of following function    
       register_widget('AQUILA_THEME\Inc\Clock_Widget');
   }
}