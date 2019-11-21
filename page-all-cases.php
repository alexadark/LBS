<?php
/**
 * Template name: Cases
 *
 */

$templates = array( 'archive.twig', 'index.twig' );

$context          = Timber::context();
$context['title'] = get_the_title();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type'         =>'cases',
    'posts_per_page'    =>5,
    'paged'             =>$paged
);

$context['posts'] = new Timber\PostQuery($args);

Timber::render( $templates, $context );
