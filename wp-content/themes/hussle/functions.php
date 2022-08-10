<?php

// Removing front end admin bar because it's ugly
    add_filter('show_admin_bar', '__return_false');

function hussle_theme_support(){
    //add dynamic title tag support to www (WP feature)
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'hussle_theme_support');

function hussle_call_menu(){
    $locations = [
        'primary' => "Desktop Primary Menu",
        'footer'  => "Footer Menu Items",
    ];

    register_nav_menus($locations);
}
add_action('init', 'hussle_call_menu');

function hussle_load_styles(){

    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('hussle-style', get_template_directory_uri() . "/style.css", ['hussle-bootstrap'], $version, 'all');
    wp_enqueue_style('hussle-bootstrap', get_template_directory_uri() . "/assets/css/bootstrap/bootstrap.min.css", [], '5.1.3', 'all');
    // //!slow-loadUp //wp_enqueue_style('hussle-bootstrap-icons', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css", [], '1.8.1', 'all');

}
add_action('wp_enqueue_scripts', 'hussle_load_styles');

function hussle_load_scripts(){

    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('hussle-bootstrap', get_template_directory_uri() . "/assets/js/bootstrap/bootstrap.min.js", [], '5.1.3', true);
    wp_enqueue_script('hussle-jquery', get_template_directory_uri() . "/assets/js/jquery-3.6.0.min.js", [], '3.6.0', true);
    wp_enqueue_script('hussle-main', get_template_directory_uri() . "/assets/js/main.js", ['hussle-bootstrap', 'hussle-jquery'], $version, true);

}
add_action('wp_enqueue_scripts', 'hussle_load_scripts');

function hussle_widget_areas(){
    
    register_sidebar(
        [
            'before_title'  => '',
            'after_title'   => '',
            'before_widget' => '',
            'after_widget'  => '',

            'name'          => 'Sidebar Area',
            'id'            => 'sidebar-1',
            'description'   => 'Sidebar Widget Area'
        ]
    );

    register_sidebar(
        [
            'before_title'  => '',
            'after_title'   => '',
            'before_widget' => '',
            'after_widget'  => '',

            'name'          => 'Footer Area',
            'id'            => 'footer-1',
            'description'   => 'Footer Widget Area'
        ]
    );

}
add_action('widgets_init', 'hussle_widget_areas');

//SVG upload
    // Wp v4.7.1 and higher
    add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
        $filetype = wp_check_filetype( $filename, $mimes );
        return [
            'ext'             => $filetype['ext'],
            'type'            => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];
    
    }, 10, 4 );
    
    function cc_mime_types( $mimes ){
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter( 'upload_mimes', 'cc_mime_types' );
    
    // function fix_svg() {
    //     echo '<style type="text/css">
    //         .attachment-266x266, .thumbnail img {
    //             width: 100% !important;
    //             height: auto !important;
    //         }
    //         </style>';
    // }
    // add_action( 'admin_head', 'fix_svg' );
