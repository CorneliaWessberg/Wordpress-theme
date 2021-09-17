<?php

    function load_stylesheets() {
        // Laddar alla olika stylesheets
        
        wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), 1, 'all');
        wp_enqueue_style('bootstrap');
        wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), 1, 'all');
        wp_enqueue_style('fontawesome');
        wp_register_style('styles', get_template_directory_uri() . '/css/main.css', array(), 1, 'all');
        wp_enqueue_style('styles');
        }
        add_action('wp_enqueue_scripts', 'load_stylesheets');

   //Så man kan lägga till bild på inlägg och sidor
    add_theme_support( 'post-thumbnails' );

    //laddar alla olika js-scripts
    function load_scripts(){
        wp_register_script('custom', get_template_directory_uri() . '/js/jquery.js', array(), 1, 1, 1);
        wp_register_script('custom', get_template_directory_uri() . '/js/script.js', array(), 1, 1, 1);
        wp_enqueue_script('custom');
        }

    add_action('wp_enqueue_scripts', 'load_scripts');


    //Så man kan lägga till menyer
    add_theme_support('menus');

    //registerar huvudmenyn
    register_nav_menus(
        array(
            'main-menu' => 'Main Menu',
        )
    );

    //registrerar undersidor menyerna
    function register_my_menu() {
        register_nav_menu('new-menu',__( 'New Menu' ));
        }
        add_action( 'init', 'register_my_menu' );

    //registrerar Sidomenyn
    function register_sidebar_menu() {
            register_nav_menu('sidebar',__( 'Sidebar Menu' ));
            }
            add_action( 'init', 'register_sidebar_menu' );

    //registrerar Arkiv menyn
    function register_archive_menu() {
            register_nav_menu('archive',__( 'Arkiv Menu' ));
        }
        add_action( 'init', 'register_archive_menu' );

    //registrerar Kategori menyn
    function register_categories_menu() {
            register_nav_menu('categories',__( 'Kategorier Menu' ));
        }
        add_action( 'init', 'register_categories_menu' );

            
// Försök till att göra en widget
register_sidebar(
    array(
        'name' => 'Page Sidebar',
        'id' => 'page-sidebar',
        'class' => 'social',
        'container' => 'ul',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    )
);


?>