

<?php
       get_header();
       global $wp_query;
?>

<div class="j-bai-separador bg-darkblue  has-text-align-center column center-content">
<h3 class="has-huge-font-size no-margin ">Blog</h3>
</div>


<section class="center-content   j-bai-container-previews-resources">
   <div class=" cat-list_item project-tiles center-content j-bai-previews-resources">
       <?php get_template_part('inc/section', 'preview')?>
   </div>
       
   

</section> 
<!-- Test  -->


<?php 

//Print the different classes from the taxonomy "Resources Type"
 $taxonomyName = "resources-types";
 $terms = get_terms( $taxonomyName, array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false ) ); ?>
 <?php foreach($terms as $term) : ?>

    <li>
      <a class="cat-list_item" href="#!" data-slug="<?=$term->slug;?>">
        <?=  $term->name; ?>
        
      </a>
    </li>
    
   
  <?php endforeach; ?>

<section>

</section>


<!-- End test  -->






<?php
       get_footer();
?>
              
