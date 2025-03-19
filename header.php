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
    <title><?php bloginfo("name");?></title>
    <?php wp_head();?>
    <!-- in order to insert style and script dynamically we should use  -->
</head>
<!-- body_class() adds bunch of classes for body tag every page  -->
<body <?php body_class("hello-class"); ?>>
  <?php
     if(function_exists('wp_body_open')){
       wp_body_open(); 
      }
   ?>
  <header>Header</header>


