<?php
/* Register our widget areas.
 */
function wst_register_widget_areas()
{
	 register_sidebar(array(
	 	'name'          => __(' Footer Menus', TEXT_DOMAIN),
	 	'id'            => 'footer_menus',
	 	'description'   => __('Add footer menus widgets.', TEXT_DOMAIN),
	 	'before_widget' => '',
	 	'after_widget'  => '',
	 	'before_title'  => '<h3 class="widgettitle uppercase light-pink text-small bold no-margin">',
	 	'after_title'   => '</h3>'
	 ));
//    register_sidebar(array(
//        'name'          => __(' Footer Signup', TEXT_DOMAIN),
//        'id'            => 'footer_signup',
//        'description'   => __('Add footer signup widgets.', TEXT_DOMAIN),
//        'before_widget' => '',
//        'after_widget'  => '',
//        'before_title'  => '<h3 class="widgettitle uppercase light-pink text-small bold no-margin">',
//        'after_title'   => '</h3>'
//    ));
//    register_sidebar(array(
//        'name'          => __(' Footer Social Network', TEXT_DOMAIN),
//        'id'            => 'footer_social',
//        'description'   => __('Add footer social widgets.', TEXT_DOMAIN),
//        'before_widget' => '',
//        'after_widget'  => '',
//        'before_title'  => '<h3 class="widgettitle uppercase light-pink text-small bold no-margin">',
//        'after_title'   => '</h3>'
//    ));
//    register_sidebar(array(
//        'name'          => __(' Footer bottom links', TEXT_DOMAIN),
//        'id'            => 'footer_bottom_links',
//        'description'   => __('Add footer bottom links widgets.', TEXT_DOMAIN),
//        'before_widget' => '',
//        'after_widget'  => '',
//        'before_title'  => '<h3 class="widgettitle uppercase light-pink text-small bold no-margin">',
//        'after_title'   => '</h3>'
//    ));


}
add_action('widgets_init', 'wst_register_widget_areas');