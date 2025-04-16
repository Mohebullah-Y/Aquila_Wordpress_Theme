<?php
/**
 * Header template
 * 
 * @package Aquila
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title><?php bloginfo("name");?></title> -->
    <?php wp_head();?>
    <!-- in order to insert style and script dynamically we should use  -->
</head>
<!-- body_class() adds bunch of classes for body tag of every page  -->
<body <?php body_class("hello-class"); ?>>
  <?php
     if(function_exists('wp_body_open')){
       wp_body_open(); 
      }
   ?>
   <div id="page" class="site">
     <header id="masthead" class="site-header" role="banner">
        <!-- This function is basically used to include our templates. it is usefull to include multiple chunks in one place -->
         <!-- we use template-parts to break our code to multiple parts which makes it more readable -->
         <?php get_template_part('template-parts/header/nav');?>
         <?php get_template_part('template-parts/content','page');?>
         <?php get_template_part('template-parts/content','post');?>
     </header>
     <div id="content" class="site-content">

    


