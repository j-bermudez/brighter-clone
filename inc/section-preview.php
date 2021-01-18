<?php 

    $currentPage = (get_query_var('paged')) ? get_query_var('paged') :1;
    $resourcesAllPosts = new WP_Query(
        array(
            'post_type' => 'resources',
            'posts_per_page' => 4,
            'paged'=> $currentPage,
           
        )
        
    );



if ( $resourcesAllPosts->have_posts()):
    while ($resourcesAllPosts->have_posts()):
        $resourcesAllPosts->the_post();?>
 
                    

 <div class="bg-light previewBox">
       
        <a target = "_blank" href="<?php the_permalink()?>"><div class="j-bai-img-preview-box">
            <img src="<?php the_post_thumbnail_url();?>" class="" alt="">
        </div>
        </a>
            <div class="j-bai-description-preview-container ">
                
               
                 <div class="j-bai-title-preview-container">
                    <h3 class="j-bai-title-preview">
                        <?php the_title();?> 
                      
                    </h3>
                 </div>        
                <div class="j-bai-description-preview-container">
                    <p class="">
                        <?php the_excerpt();?> 
                    </p>
                </div>
               

                <div class="j-bai-read-more-preview-container ">
                    <a 
                    target = "_blank" 
                    class= "j-bai-text-decoration-none" 
                    href=" <?php the_permalink()?>">
                    
                        <!-- <div class="j-bai-button button-l">
                                READ MORE
                       </div> -->
                </a>
                    
                </div>
               
                
            </div>
</div>
<?php 
wp_reset_postdata();
endwhile;?>

<div class="center-content j-bai-separador ">
       
       <?php previous_posts_link()?>
       
     

       <?php next_posts_link()?>

</div>


<?php
 endif;
 ?>


