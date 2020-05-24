<?php

/**
 * Add to theme some WP functionalities
 */
function ouestHomeSupport()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Header');
    register_nav_menu('footer', 'Footer');
}

/**
 * Add assets
 */
function ouestHomeRegisterAssets()
{
    wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

/**
 * Edit title separator
 * @return string
 */
function ouestHomeTitleSeparator()
{
    return '|';
}

/**
 * Add bootstrap class 'nav-item' on menus items
 * @param array $classes
 * @return array
 */
function ouestHomeMenuClass(array $classes): array
{
    $classes[] = 'nav-item';
    return $classes;
}

/**
 * Add bootstrap link class 'nav-link' on menus items
 * @param array $attrs
 * @return array
 */
function ouestHomeMenuLinkClass(array $attrs): array
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}

/**
 * Activation hooks
 */
add_action('after_setup_theme', 'ouestHomeSupport');
add_action('wp_enqueue_scripts', 'ouestHomeRegisterAssets');
add_filter('document_title_separator', 'ouestHomeTitleSeparator');
add_filter('nav_menu_css_class', 'ouestHomeMenuClass');
add_filter('nav_menu_link_attributes', 'ouestHomeMenuLinkClass');
