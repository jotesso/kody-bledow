<?php
/**
 * Functions and definitions for Kody Błędów – Promptowy.com Engine
 */

function kody_bledow_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'kody_bledow_setup');

function kody_bledow_scripts() {
    // Google Fonts: Bebas Neue, Plus Jakarta Sans, JetBrains Mono
    wp_enqueue_style('kody-bledow-fonts', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@500;700&display=swap', array(), null);
    wp_enqueue_style('kody-bledow-main', get_stylesheet_uri(), array('kody-bledow-fonts'), '1.0.0');
}
add_action('wp_enqueue_scripts', 'kody_bledow_scripts');

// Breadcrumbs helper
function kody_bledow_breadcrumbs() {
    echo '<div class="sub-nav-crumbs">';
    echo '<a href="' . esc_url(home_url('/')) . '">Strona główna</a>';
    
    if (is_singular('kod_bledu')) {
        $terms_cat = get_the_terms(get_the_ID(), 'kategoria_urzadzenia');
        $terms_brand = get_the_terms(get_the_ID(), 'producent_marka');
        
        if ($terms_cat && !is_wp_error($terms_cat)) {
            echo ' <span>/</span> <a href="' . esc_url(get_term_link($terms_cat[0])) . '">' . esc_html($terms_cat[0]->name) . '</a>';
        }
        if ($terms_brand && !is_wp_error($terms_brand)) {
            echo ' <span>/</span> <a href="' . esc_url(get_term_link($terms_brand[0])) . '">' . esc_html($terms_brand[0]->name) . '</a>';
        }
        echo ' <span>/</span> <span style="color:#fff;">' . esc_html(get_the_title()) . '</span>';
    } elseif (is_tax()) {
        $term = get_queried_object();
        echo ' <span>/</span> <span style="color:#fff;">' . esc_html($term->name) . '</span>';
    }
    echo '</div>';
}