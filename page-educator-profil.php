<?php
/**
 * Template Name: Educator profil
 *
 *
 */
$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'educator-profil.twig' ), $context );