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
   }
}
