<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function sidebar_widget_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar'),
        'id' => 'main_sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );
}
add_action( 'widgets_init', 'sidebar_widget_init' );



