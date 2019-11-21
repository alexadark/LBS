<?php
/**
 * Template name: Featured Cases
 *
 */

$templates = array( 'archive.twig', 'index.twig' );

$context          = Timber::context();
$context['title'] = get_the_title();
$fc_option = get_field('featured_cases_option', 'option');
$fc_ids = array();
foreach ($fc_option as $item){
    $fc_ids[] = $item->ID;
}

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type'         =>  'cases',
    'posts_per_page'    =>  5,
    'paged'             =>  $paged,
    'post__in'          =>  $fc_ids,
    'orderby'           => 'post__in',
);

$context['posts'] = new Timber\PostQuery($args);

Timber::render( $templates, $context );
