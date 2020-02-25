<?php 
/* Extract keywords from a webpage */
$meta = get_meta_tags('https://www.gofit.bh/');

$keywords = $meta['keyword'];
// Split keywords
$keywords = explode(',', $keywords );
// Trim them
$keywords = array_map( 'trim', $keywords );
// Remove empty values
$keywords = array_filter( $keywords );

print_r( $keywords ); //Array ( [0] => Gofit First online health and Fitness store in Bahrain )
?>
