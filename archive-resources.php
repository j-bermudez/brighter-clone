

<?php
       get_header();
       global $wp_query;
?>

<div class="j-bai-separador bg-darkblue  has-text-align-center column center-content">
<h3 class="has-huge-font-size no-margin ">Blog</h3>
</div>


<section class="center-content   j-bai-container-previews-resources">
   <div class=" center-content j-bai-previews-resources">
       <?php get_template_part('inc/section', 'preview')?>
   </div>
       
   

</section> 



<div class="center-content j-bai-separador ">
       
              <?php previous_posts_link()?>
              
              <!--<h4>See More</h4>-->

              <?php next_posts_link()?>
       <!--
       <div class= "center-content column button-xl j-bai-button">
              <h4>See More</h4>
       </div>
       -->
       

</div>



<?php
       get_footer();
?>
              
