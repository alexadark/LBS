<?php
/* Register our widget areas.
 */
function wst_register_widget_areas()
{
	// register_sidebar(array(
	// 	'name'          => __(' Footer Menus', TEXT_DOMAIN),
	// 	'id'            => 'footer_menus',
	// 	'description'   => __('Add footer menus widgets.', TEXT_DOMAIN),
	// 	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</div>',
	// 	'before_title'  => '<h3 class="widgettitle uppercase light-pink text-small bold no-margin">',
	// 	'after_title'   => '</h3>'
	// ));

}
add_action('widgets_init', 'wst_register_widget_areas');