<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$templates = array( 'search.twig', 'archive.twig', 'index.twig' );

$context          = Timber::context();
$context['title'] = 'Search results';
$args = array('post_type'=>'cases');
if(isset($_GET['s']) && !empty($_GET['s'])) {
    $context['search_input_value'] = get_search_query();
    $args[] = array('s'=>get_search_query());
}
if(isset($_GET['title'])  && !empty($_GET['title'])) {
    $args['s'] = $_GET['title'];
}

$values_to_search = array('author_display_text'=>'author', 'case_reference_number'=>'case_id');
$meta_query = array('relation' => 'OR');
foreach ($values_to_search as $key=>$value) {
    if(isset($_GET[$value])  && !empty($_GET[$value])) {
        $meta_query[] = array(
            'key' => $key,
            'value' => $_GET[$value],
            'compare' => 'LIKE',
        );
    }
}
$args['meta_query'] = $meta_query;

$context['posts'] = new Timber\PostQuery($args);
$allsearch = new WP_Query($args);
$result_count = $allsearch->post_count;
$context['result_search'] = $result_count.' results for \'<i>'.get_search_query().'</i>\'';

Timber::render( $templates, $context );
