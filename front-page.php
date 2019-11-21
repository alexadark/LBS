<?php
$context   = Timber::get_context();
$images = get_field('background_image');
$tab_image = array('first');
if( $images ):
    foreach($images as $image) :
        $tab_image[] = $image['sizes']['large'];
    endforeach;
endif;
$random = random_int(1,sizeof($tab_image)-1);
$context['hero_image'] = $tab_image[$random];

$posts = get_field('latest_cases');
$latest_cases = array();
if( $posts ):
    foreach( $posts as $post):
        setup_postdata($post);
        $post_id = get_the_ID();
        $image_url = get_the_post_thumbnail_url($post_id, 'medium');
        $image_url_large = get_the_post_thumbnail_url($post_id, 'large');
        $latest_cases[] = array(
            'title'=>get_the_title(),
            'permalink'=>get_the_permalink(),
            'id'=>$post_id,
            'author'=>get_field('author_display_text'),
            'topic'=>get_the_terms($post_id, 'topics'),
            'industry'=>get_the_terms($post_id, 'industry'),
            'geography'=>get_the_terms($post_id, 'geography'),
            'subject'=>get_the_terms($post_id, 'subjects'),
            'image_url'=>$image_url,
            'image_url_large'=>$image_url_large,
            'excerpt'=>get_the_excerpt($post_id)
        );
    endforeach;
    wp_reset_postdata();
endif;
   // the query
$the_query = new WP_Query( array(
   'post_type' => 'post',
   'posts_per_page' => 1,
));
$latest_post = array();
if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post();
        $latest_post['title'] = get_the_title(get_the_ID());
        $latest_post['content'] = get_the_content(get_the_ID());
    endwhile;
    wp_reset_postdata();
endif;

$context['latest_cases'] = $latest_cases;
$fc = get_featured_cases();
$context['featured_cases_option'] = $fc[0];
$context['latest_post']  = $latest_post;
$templates = array('front-page.twig');
Timber::render($templates, $context);