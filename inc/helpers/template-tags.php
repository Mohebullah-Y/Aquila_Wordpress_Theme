<?php

function get_the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = [] ){
   $custom_thumbnail = '';

   if(null === $post_id){
     $post_id = get_the_ID();
   }
   if(has_post_thumbnail($post_id)){
     $default_attributes = [
        'loading' => 'lazy'
     ];
     $attributes = array_merge($additional_attributes, $default_attributes);
     $custom_thumbnail = wp_get_attachment_image(
        get_post_thumbnail_id($post_id),
        $size,
        false,
        $attributes
     );
   }
   return $custom_thumbnail;
}

function the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = [] ){
    echo get_the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = [] );
}


function aquila_posted_on(){
   $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
   // it means post has been modified
   if(get_the_time('U') !== get_the_modified_time('')){
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';    
   }

   $time_string = sprintf($time_string,
    esc_attr(get_the_date(DATE_W3C)),
    esc_attr(get_the_date()),
    esc_attr(get_the_modified_date(DATE_W3C)),
    esc_attr(get_the_modified_date()),
  );

  $posted_on = sprintf(
     esc_html_x('Posted on %s', 'post date', 'aquila'),
     '<a href="'.esc_url(get_permalink()).'" rel="bookmark">'.$time_string.'</a>'
  );
  echo '<span class="posted-on text-secondary">'. $posted_on .'</span>';
}

function aquila_posted_by(){
   $byline = sprintf(
      esc_html_x(' by %s', 'post author', 'aquila'),
      '<span class="author vcard"><a href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))).'">'. esc_html(get_the_author()) .'</a></span>'
   );
   echo '<span class="byline text-secondary">'. $byline .'</span>';
}

function aquila_the_excerpt($trim_character_count = 0) {
   if(! has_excerpt() || 0 === $trim_character_count){
      the_excerpt();
      return;
   }
   $excerpt = wp_strip_all_tags(get_the_excerpt());
   if (strlen($excerpt) > $trim_character_count) {
    $excerpt = substr($excerpt, 0, $trim_character_count);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' ')); // Avoid word break
   }
   echo $excerpt . '...';
}

function aquila_excerpt_more($more = '') {
   if(! is_single()){
      $more = sprintf('<button class="mt-4 btn btn-info"><a class="aquila-read-more text-white" href="%1$s">%2$s</a></button>',
         get_permalink(get_the_ID()),
         __('Read more', 'aquila')
   );
 }
  return $more;
}

function aquila_pagination() {
   $allowed_tags = [
      'span' => [
         'class' => []
      ],
      'a' => [
         'class' => [],
         'href' => []
      ]
   ];
   $args = [
      'before_page_number' => '<span class="btn border border-secondary mr-2 mb-2">',
      'after_page_number' => '</span>'
   ];
   $links = paginate_links($args);
   if($links){
      printf('<nav class="aquila-pagination clearfix">%s</nav>', wp_kses($links, $allowed_tags));
   }
}