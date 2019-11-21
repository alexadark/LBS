<?php
/**
 * Template Name: Create a profile
 *
 *
 */
$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-create-profile.twig' ), $context );