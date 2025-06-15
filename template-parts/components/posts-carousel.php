<?php
/**
 * Posts Carousel
 * 
 * @package Aquila
 */
$args = [
   'posts_per_page' => 5,
   'post_type' => 'post',
   'update_post_meta_cache' => false,
   'update_post_term_cache' => false
];

$post_query = new \WP_Query($args);
?>

<div class="posts-carousel">
    <?php
      if ($post_query->have_posts()) :
         while($post_query->have_posts()):
            $post_query->the_post();
          ?>
             <div class="posts-carousel-item card">
                <?php
                  if(has_post_thumbnail()){
                     the_post_custom_thumbnail(
                        get_the_ID(),
                        'featured-thumbnail',
                        [
                           'sizes'=> '(max-width: 350px) 350px, 233px',
                           'class' => 'w-100'
                        ]
                     );
                  }else{
                   ?>
                    <img src="https://placehold.co/300x300?text=Hello+World" alt="post default image">
                  <?php
                  }
                ?>
                <div class="card-body">
                    <?php
                     the_title('<h3 class="card-title">', '</h3>');
                     aquila_the_excerpt();
                     ?>
                   <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html_e('View More','aquila'); ?></a>
                </div>
            </div>
          <?php
         endwhile;
      endif;
      wp_reset_postdata();
    ?>
</div>