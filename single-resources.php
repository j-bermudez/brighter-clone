<?php
        get_header();
?>
    <div style="background-image:url('<?php if(has_post_thumbnail()):?><?php the_post_thumbnail_url('blog-large');?><?php endif;?>');
                background-repeat:no-repeat;
                background-size:cover;
                background-position:center center;
                background-attachment:fixed;
                "
                class="j-bai-title-resource-container ">

                <div class="j-bai_dark-blue-filter">
                        <div class="j-bai-title-centered">
                                <p class="j-bai-title-resource-single"><?php the_title()?></p>
                        </div>
                </div>
               
        
    </div>
<div>  
<?php //wcr_share_buttons();
//generic email ?>
</div>

    <div class="j-bai-content-resource-container">
        <div class="j-bai-title-centered">
                <div class="j-bai-part-content">
                        <div class="j-bai-content">
                                <p class="j-bai-resources-date">
                                
                                <?php echo get_the_date();?>
                                </p>
                                <p class="">
                                       
                                        <?php get_template_part('inc/section', 'content')?>
                                </p>
                        </div>
                </div>

               
                <div class="j-bai-part-content ">
                        <div class="j-bai-content ">
                               
                                <div class="j-bai-resources-info">

                                        
                                        <div class="j-bai-resources-author-card">
                                                
                                                <div class="j-bai-resources-img-author">
                                                        <a href="<?php the_field('social_media_link_1');?>">
                                                                <img src="<?php the_field('author_img');?>
                                                                        " alt="">
                                                        </a>
                                                                
                                                </div>
                                                <div class="j-bai-resources-text-author">
                                                        
                                                        <p>
                                                                
                                                              
                                                                  <?php the_field('author_name');?><br>
                                                                <?php the_field('author_title');?><br>
                                                                <?php the_field('email_addrese');?>  <br>
                                                                
                                                        </p>

                                                        <!--Social media link-->
                                                        <div  class="j-bai-social-media-author">
                                                                <div class="j-bai-social-media-author-icon">
                                                                        <a href="<?php the_field('social_media_link_1');?>"><img src="<?php the_field('social_media_img_1');?>" alt=""></a>
                                                                </div>
                                                                <div class="j-bai-social-media-author-icon">
                                                                        <a href="<?php the_field('social_media_link_2');?>"><img src="<?php the_field('social_media_img_2');?>" alt=""></a>
                                                                </div>
                                                                <div class="j-bai-social-media-author-icon">
                                                                        <a href="<?php the_field('social_media_link_3');?>"><img src="<?php the_field('social_media_img_3');?>" alt=""></a>
                                                                </div>
                                                               
                                                                
                                                        </div>
                                                        <div class="j-bai-file-container">

                                       
                                                                        <?php
                                                                                $file = get_field('attachment_resource');
                                                                                if( $file ): ?>
                                                                                <div class="j-bai-icon-file">
                                                                                <img src="img/icons/recycle-icons.png" alt="">          
                                                                                </div>
                                                                                <div class="j-bai-button">
                                                                                
                                                                                <a href="<?php echo $file['url']; ?>">Download Resource</a>
                                                                                </div>
                                                                                
                                                                        <?php endif; ?>
                                                        </div>

                                                        

                                                        
                                                       
                                                        
                                                       
                                                </div>

                                                
                                                 

                                        </div>
                                        
                                        
                                       
                                       
                                </div>
                                
                               
                        </div>
                </div>
        </div>
    </div>

    <?php echo resources_add_related_resource_to_sigle_post(); ?>
    <div>
   
    </div>                                                                                    


    <section class=" ">
        <div class="">
        <h3><?/*php the_title()*/?></h3>
        </div>
        
        <section class="">
        
               
                        <div class=" ">
                               
                                <p>
                                        <?/*php get_template_part('inc/section', 'content')*/?>
                                </p>

                        </div>
                        <div class="">
                                <?php if(has_post_thumbnail()):?>
                        
                                                </img src="<?/*php the_post_thumbnail_url('blog-large');*/?>" class="j-bai-container-single-resources-img" alt="">

                                <?php endif;?>
                        </div>

                        
              
       
        </section>
        <div class="">

        </div>




    </section>
    
    

<?php
        get_footer();
?>
 