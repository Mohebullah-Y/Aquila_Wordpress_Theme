<?php
/**
* Main template file. 
*
* @package Aquila
*/
// include_once "header.php";
get_header();
?>
   <div id="primary">
       <main class="site-main mt-5" id="main" role="main">
          <?php
            if(have_posts()) :
            ?>
               <div class="container">
                  <?php
                    if(is_home() && ! is_front_page()) {
                      ?>
                        <header class="mb-5">
                            <h1 class="page-title">
                               <?php single_post_title(); ?>
                            </h1>
                        </header>
                     <?php 
                    }
                  ?>

                 <div class="row">
                     <?php
                        $index = 0;
                        $no_of_columns = 3;

                        //Start the loop
                        while(have_posts()): the_post();
                           if(0 === $index % $no_of_columns) {
                              ?>
                              <div class="col-sm-12 col-md-6 col-lg-4">
                           <?php
                           }
                            get_template_part("template-parts/content");
                            $index++;
                              if(0 !== $index && 0 === $index % $no_of_columns){
                              ?>
                                </div>
                              <?php
                              }
                        
                        endwhile;
                     ?>
                 </div>
               </div>
            <?php
             else :
               get_template_part("template-parts/content-none");   
             endif;
             aquila_pagination();
          ?>
       </main>
   </div>
<?php
// include_once "footer.php";
get_footer();



