<?php

/**
 * Add to theme some WP functionalities
 */
function manniSupport()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Header');
    register_nav_menu('footer', 'Footer');
    add_image_size('card-header', 350, 215, true);
}

/**
 * Add assets
 */
function manniRegisterAssets()
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
function manniTitleSeparator(): string
{
    return '|';
}

/**
 * Add bootstrap class 'nav-item' on menus items
 * @param array $classes
 * @return array
 */
function manniMenuClass(array $classes): array
{
    $classes[] = 'nav-item';
    return $classes;
}

/**
 * Add bootstrap link class 'nav-link' on menus items
 * @param array $attrs
 * @return array
 */
function manniMenuLinkClass(array $attrs): array
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}

/**
 * Add a pagination with bootstrap
 */
function manniPagination()
{
    $pages = paginate_links(['type' => 'array']);
    if (is_null($pages)) {
        return;
    }
    echo '<nav aria-label="pagination" class="my-4">';
    echo '<ul class="pagination">';

    foreach ($pages as $page) {
        $active = strpos($page, 'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class .= ' active';
        }
        echo '<li class="' . $class . '">';
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
}

function manniInit()
{
    register_taxonomy('race', 'post', [
        'labels' => [
            'name' => 'Race',
            'singular_name' => 'race',
            'plural_name' => 'races',
            'search_items' => 'Rechercher des races',
            'all_items' => 'Toutes les races',
            'edit_item' => 'Éditer une race',
            'update_item' => 'Mettre à jour une race',
            'add_new_item' => 'Ajouter une nouvelle race',
            'new_item_name' => 'Ajouter une nouvelle race',
            'menu_item' => 'Race',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true
    ]);
}

/**
 * Activation hooks
 */
add_action('init', 'manniInit');
add_action('after_setup_theme', 'manniSupport');
add_action('wp_enqueue_scripts', 'manniRegisterAssets');
add_filter('document_title_separator', 'manniTitleSeparator');
add_filter('nav_menu_css_class', 'manniMenuClass');
add_filter('nav_menu_link_attributes', 'manniMenuLinkClass');

require_once('metaboxes/sponso.php');
SponsoMetabox::register();
