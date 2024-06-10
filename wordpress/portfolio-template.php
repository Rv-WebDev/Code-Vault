<?php
	/*Template Name: Portfolio Template*/
	get_header();
?>


<style>
    .site-content .ast-container {
        display: block !important;
    }
	#filtered-posts-container{
	  display: flex;
	}

	.card {
	  overflow: hidden;
	  box-shadow: 0px 2px 20px #d7dfe2;
	  background: white;
	  border-radius: 0.5rem;
	  position: relative;
	  width: 350px;
	  margin: 1rem;
	  transition: 250ms all ease-in-out;
	  cursor: pointer;
	}

	.card:hover {
	  transform: scale(1.05);
	  box-shadow: 0px 2px 40px #d7dfe2;
	}

	.banner-img {
	  position: absolute;
	  object-fit: cover;
	  height: 14rem;
	  width: 100%;
	}

	.card-body {
	  margin: 15rem 1rem 1rem 1rem;
	}

	.blog-title {
	  line-height: 1.5rem;
	  margin: 1rem 0 0.5rem;
	}

	.blog-description {
	  color: #616b74;
	  font-size: 0.9rem;
	}

	.custom-taxonomy select {
		width: 160px;
		height: 50px;
	}
	
	
.custom-taxonomy button {
    width: 160px;
    height: 50px;
    font-size: 16px;
    cursor: pointer;
}

</style>

<?php
$args = array(
    'type'         => 'portfolio',
    'child_of'     => 0,
    'parent'       => '',
    'orderby'      => 'name',
    'order'        => 'ASC',
    'hide_empty'   => false,
    'hierarchical' => 1,
    'exclude'      => '',
    'include'      => '',
    'number'       => '',
    'taxonomy'     => 'technology',
    'pad_counts'   => false
);
$categories = get_categories($args);

?>

<div class="custom-taxonomy">
    <select name="taxonomy-dropdown" id="taxonomy-dropdown">     
        <?php
        $terms = get_terms(array(
            'taxonomy' => 'technology',
            'hide_empty' => false,
        ));
        foreach ($terms as $term) {
            echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
						  
        }
        ?>
    </select>
</div>

<div class="custom-taxonomy">
    <?php
    $terms = get_terms(array(
        'taxonomy' => 'technology',
        'hide_empty' => false,
    ));
    foreach ($terms as $term) {
        echo '<button class="taxonomy-button" data-term="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</button>';
    }
    ?>   
</div>



<div id="filtered-posts-container">
<?php
$args = array(
    'post_type'      => 'portfolio',
    'posts_per_page' => -1,
);
$the_query = new WP_Query($args);

if ($the_query->have_posts()) {

    while ($the_query->have_posts()) {
        $the_query->the_post();
        ?>

		<div class="wrapper">
			<div class="card">
			    <div class="card-banner">				
				    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>				
			    </div>
			    <div class="card-body">			
					<h2 class="blog-title"> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<p class="blog-description"><?php the_excerpt(); ?></p>			
			    </div>
			</div>
        </div>

        <?php
    }
    wp_reset_postdata();
    ?>

    <?php
} else {
    ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php
}
?>	
</div>

<script>

jQuery(document).ready(function($) {
    // Function to handle dropdown change
   
   $('#taxonomy-dropdown').change(function() {
        var selectedTerm = $(this).val();
        filterPortfolio(selectedTerm);
    });

    // Function to handle taxonomy button click
    $('.taxonomy-button').click(function() {
        var selectedTerm = $(this).data('term');
        filterPortfolio(selectedTerm);
    });

    // Function to filter portfolio items using AJAX
    function filterPortfolio(term) {
        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_portfolio',
                term: term,
            },
            success: function(response) {
                $('#filtered-posts-container').html(response);
            },
            error: function(xhr, status, error) {
                console.error(status + ': ' + error);
            }
        });
    }
});

</script>

<?php
	get_footer();
?>