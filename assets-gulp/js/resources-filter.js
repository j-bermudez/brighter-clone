/**
 * Personio block functionalitu
 *
 * This shows the job positions from personio
//  */
( function() {

	jQuery(document).ready( function($) {
        $('.cat-list_item').on('click', function() {
            $('.cat-list_item').removeClass('active');
            $(this).addClass('active');
          
            $.ajax({
              type: 'POST',
              url: 'http://localhost/brighter-clone/wp-admin/admin-ajax.php',
              dataType: 'html',
              data: {
                action: 'filter_projects',
                category: $(this).data('slug'),
              },
              success: function(res) {
                $('.project-tiles').html(res);
              }
            })
          });
        
		
	});
} )();
    