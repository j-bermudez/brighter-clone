

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
<!-- Test  -->

<?php 
//Get the list of categories from the taxonomy Resources Type
$taxonomyName = "resources-types";
//This gets top layer terms only.  This is done by setting parent to 0.  
$parent_terms = get_terms( $taxonomyName, array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false ) );   
echo '<ul>';
foreach ( $parent_terms as $pterm ) {
    //Get the Child terms
    $terms = get_terms( $taxonomyName, array( 'parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
    foreach ( $terms as $term ) {
        echo '<li><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';   
    }
}
echo '</ul>';


?>
<!-- End test  -->



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
              
