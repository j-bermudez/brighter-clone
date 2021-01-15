<?php ?>
 
                    

 <div class="bg-light previewBox">
        <!-- 
        <div class="j-bai-resource-type">
            <?php /*the_field('resource_type');*/?>
        </div>
        -->

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
                    
                        <div class="j-bai-button button-l">
                                READ MORE
                       </div>
                </a>
                    
                </div>
               
                
            </div>
</div>
<?php?>
