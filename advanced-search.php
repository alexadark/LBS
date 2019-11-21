<?php
/**
 * Template name: Advanced Search
 *
 */

$templates = array( 'advanced-search.twig', 'index.twig' );

$context          = Timber::context();
$context['title'] = get_the_title();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array('post_type'=>'cases');

if(isset($_POST['keyword']) && !empty($_POST['keyword'])) {
    $args[] = array('s'=>$_POST['keyword']);
    $context['keyword'] = $_POST['keyword'];

}
if(isset($_POST['title'])  && !empty($_POST['title'])) {
    $args['s'] = $_POST['title'];
    $context['stitle'] = $_POST['title'];
}

$values_to_search = array('author_display_text'=>'author', 'case_reference_number'=>'case_id');
$meta_query = array('relation' => 'OR');
$meta_test = 0;
foreach ($values_to_search as $key=>$value) {
    if(isset($_POST[$value])  && !empty($_POST[$value])) {
        $context[$value] = $_POST[$value];
        $meta_test++;
        $meta_query[] = array(
            'key' => $key,
            'value' => $_POST[$value],
            'compare' => 'LIKE',
        );
    }
}
if($meta_test) {
    $args['meta_query'] = $meta_query;
}

$tax_query = array('relation' => 'OR');
$tax_to_search = array('industry', 'geography');
$tax_test = 0;
foreach ($tax_to_search as $item) {
    if(isset($_POST[$item])  && !empty($_POST[$item])) {
        $context[$item] = $_POST[$item];
        $tax_test++;
        $tax_query[] = array(
            'taxonomy' => $item,
            'field' => 'slug',
            'terms' => $_POST[$item],
        );
    }
}
if($tax_test){
    $args['tax_query'] = $tax_query;
}

$maxyear = date("Y");
$tab_year = array();
for ($i = 2000; $i<=$maxyear ; $i++){
    $tab_year[] = $i;
}
$context['tab_year'] = $tab_year;
$context['last_year'] = $maxyear;

if(isset($_POST['first_year'])  && !empty($_POST['first_year']) && isset($_POST['last_year'])  && !empty($_POST['last_year'])) {
    $context['first_year'] = $_POST['first_year'];
    $context['last_year'] = $_POST['last_year'];
    $args['date_query'] = array(
        array(
            'after' => array(
                'year' => $_POST['first_year'],
            ),
            'before' => array(
                'year' => $_POST['last_year'],
            ),
            'inclusive' => true,
        )
    );
}



//print_r($args);

$context['posts'] = new Timber\PostQuery($args);

Timber::render( $templates, $context );
