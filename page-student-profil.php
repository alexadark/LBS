<?php
/**
 * Template Name: Student profil
 *
 *
 */
$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'student-profil.twig' ), $context );