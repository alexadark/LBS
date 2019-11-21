<?php
/**
 * Template name: Single case
 */

$context          = Timber::context();
$context['posts'] = new Timber\PostQuery();

$templates        = array( 'single-case.twig' );
Timber::render( $templates, $context );