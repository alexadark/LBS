<?php
/**
 * Template name: Your account
 *
 */

$templates = array( 'your-account.twig', 'index.twig' );

$context          = Timber::context();
$context['title'] = get_the_title();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array('post_type'=>'cases');

$context['posts'] = new Timber\PostQuery($args);

Timber::render( $templates, $context );
