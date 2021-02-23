<?php
/* Template Name: Homepage */
/*
 * 
 *
 * @package ABC_Widgets
 */

get_header();
global $wpbd;
// Get the image link set through banner plugin
$banner_img = $wpdb->get_var("SELECT option_value FROM wp_options WHERE option_name = 'banner_image'");
$banner_txt = $wpdb->get_var("SELECT option_value FROM wp_options WHERE option_name = 'banner_text'");

?>
	<div id="primary" class="content-area pure-u-1 pure-u-md-2-3 ">
		<main id="main" class="site-main">
			<div class="banner-container">	
				<!--Display image link retreived from WP database-->
        		<img src="<?php echo $banner_img; ?>" alt="Banner Image" class="banner-image"/>
				<div class="text-centered"><?php echo $banner_txt; ?></div>
			</div>
		
				<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
		?>
<!--Custom PHP & SQL Feature as per assignment requirments.-->
<?php

// Get the category set for featured products
$feature_category = $wpdb->get_var("SELECT option_value FROM wp_options WHERE option_name = 'feature_text'");	

// SQL Query - see production journal for more details
$query = "SELECT wp_posts.id, posts.post_title, posts.post_excerpt, posts.guid, wp_posts.guid as image, postmeta.meta_value " 
		. "FROM ((((((wp_terms "
		. "INNER JOIN wp_term_relationships ON wp_terms.term_id = wp_term_relationships.term_taxonomy_id) "
		. "INNER JOIN wp_posts AS posts ON posts.id = wp_term_relationships.object_id) "
		. "INNER JOIN wp_postmeta ON posts.id = wp_postmeta.post_id) "
		. "INNER JOIN wp_postmeta AS postmeta ON posts.id = postmeta.post_id) "
    	. "INNER JOIN wp_postmeta AS postmeta2 ON posts.id = postmeta2.post_id) "
		. "INNER JOIN wp_posts ON wp_postmeta.meta_value = wp_posts.id) "
		. "WHERE wp_terms.name = '$feature_category' AND wp_postmeta.meta_key ='_thumbnail_id' AND postmeta.meta_key ='_price' AND postmeta2.meta_key = 'total_sales' "
		. "ORDER BY cast(postmeta2.meta_value AS UNSIGNED) DESC "
		. "LIMIT 3; ";
		

// Use the WP built in DB method and pass in our query 
$myrows = $wpdb->get_results($query);

// Print results to homepage
echo "<div class='homepage-feature'>";
echo "<p class='topseller-banner'>Today's Top Products</p>";
foreach ($myrows as $row){
	
	echo "<div class='item-grid'>";
	echo "<a href='".$row->guid."' id='p-items'>";
	echo "<h2>".$row->post_title."</h2>";
	echo "<img src='$row->image' id='p-image'>";
	// echo "<div id='homepage-feature-description'>";
	echo $row->post_excerpt;
	echo "<p id='price'>$".$row->meta_value."</p>";
	echo "<p><button>View Product</button></p>";
	echo "</a>";
	echo "</div>";
}
echo "</div>";		 

?>

<?php
get_sidebar();
get_footer();
