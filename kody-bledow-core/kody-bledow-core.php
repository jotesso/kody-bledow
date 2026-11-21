<?php
/**
 * Plugin Name: Kody Błędów – Silnik Danych i Auto-Import 100 Kodów
 * Plugin URI: https://kodybledow.pl
 * Description: Rejestruje CPT `kod_bledu`, taksonomie oraz automatycznie importuje 100 zweryfikowanych kodów błędów HVAC i AGD z DTR wraz z unikalnymi meta tagami sentence case.
 * Version: 1.0.0
 * Author: Antigravity & DesignBOT
 * Text Domain: kody-bledow-core
 */

if (!defined('ABSPATH')) exit;

// 1. Rejestracja CPT i Taksonomii
function kbc_register_post_type() {
    $labels = array(
        'name' => 'Kody błędów',
        'singular_name' => 'Kod błędu',
        'menu_name' => 'Kody błędów',
        'add_new' => 'Dodaj nowy kod',
        'add_new_item' => 'Dodaj nowy kod błędu',
        'edit_item' => 'Edytuj kod błędu',
        'all_items' => 'Wszystkie kody'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-warning',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'rewrite' => array('slug' => 'kody-bledow', 'with_front' => false),
        'show_in_rest' => true
    );
    register_post_type('kod_bledu', $args);

    // Taksonomie
    register_taxonomy('kategoria_urzadzenia', 'kod_bledu', array(
        'label' => 'Kategorie urządzeń',
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'kategoria')
    ));
    register_taxonomy('producent_marka', 'kod_bledu', array(
        'label' => 'Producenci / Marki',
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'marka')
    ));
    register_taxonomy('seria_urzadzenia', 'kod_bledu', array(
        'label' => 'Serie urządzeń',
        'hierarchical' => false,
        'public' => true,
        'rewrite' => array('slug' => 'seria')
    ));
}
add_action('init', 'kbc_register_post_type');

// 2. Auto-import 100 kodów błędów przy aktywacji wtyczki
function kbc_activate_import() {
    kbc_register_post_type();
    flush_rewrite_rules();

    $json_file = plugin_dir_path(__FILE__) . 'data-100-errors.json';
    if (!file_exists($json_file)) return;

    $json_data = file_get_contents($json_file);
    $errors = json_decode($json_data, true);
    if (!is_array($errors)) return;

    foreach ($errors as $item) {
        $post_title = $item['marka'] . ' ' . $item['kod'];
        
        // Sprawdź czy post już istnieje
        $existing = get_page_by_title($post_title, OBJECT, 'kod_bledu');
        if ($existing) continue;

        $content = "<h2>Oficjalne znaczenie błędu " . esc_html($item['kod']) . " w urządzeniu " . esc_html($item['marka']) . "</h2>";
        $content .= "<p>" . esc_html($item['znaczenie_oficjalne']) . "</p>";
        $content .= "<h3>Główne przyczyny usterki wg dokumentacji</h3>";
        $content .= "<p>" . esc_html($item['przyczyny_wg_dtr']) . "</p>";
        $content .= "<h3>Instrukcja usunięcia błędu krok po kroku</h3>";
        $content .= "<p>" . esc_html($item['kroki_diagnostyczne']) . "</p>";

        $post_id = wp_insert_post(array(
            'post_title' => $post_title,
            'post_content' => $content,
            'post_status' => 'publish',
            'post_type' => 'kod_bledu'
        ));

        if ($post_id && !is_wp_error($post_id)) {
            // Przypisanie taksonomii
            wp_set_object_terms($post_id, $item['kategoria'], 'kategoria_urzadzenia');
            wp_set_object_terms($post_id, $item['marka'], 'producent_marka');
            wp_set_object_terms($post_id, $item['model_seria'], 'seria_urzadzenia');

            // Przypisanie pól meta
            update_post_meta($post_id, 'kod_oznaczenie', $item['kod']);
            update_post_meta($post_id, 'kod_znaczenie_dtr', $item['znaczenie_oficjalne']);
            update_post_meta($post_id, 'kod_bluf_streszczenie', $item['znaczenie_oficjalne']);
            update_post_meta($post_id, 'kod_mozna_resetowac', $item['czy_mozna_resetowac']);
            update_post_meta($post_id, 'kod_kwalifikacja_bezpieczenstwa', $item['kwalifikacja_bezpieczenstwa']);
            update_post_meta($post_id, 'kod_przyczyny_tabela', $item['przyczyny_wg_dtr']);
            update_post_meta($post_id, 'kod_procedura_naprawy', $item['kroki_diagnostyczne']);
            update_post_meta($post_id, 'kod_kiedy_wezwac_serwis', 'Jeśli błąd powraca po 1 próbie resetu lub wyczuwalny jest gaz / dym.');
            update_post_meta($post_id, 'kod_szacowany_koszt', '250 - 650 PLN');
            update_post_meta($post_id, 'kod_zrodlo_dtr_tytul', $item['zrodlo_dtr_tytul']);
            update_post_meta($post_id, 'kod_zrodlo_dtr_strona', $item['zrodlo_dtr_strona']);
            update_post_meta($post_id, 'kod_zrodlo_dtr_url_nieklikalny', $item['zrodlo_dtr_url_nieklikalny']);

            // Yoast SEO Meta tags (Sentence case)
            update_post_meta($post_id, '_yoast_wpseo_title', $item['meta_title']);
            update_post_meta($post_id, '_yoast_wpseo_metadesc', $item['meta_description']);
        }
    }
}
register_activation_hook(__FILE__, 'kbc_activate_import');