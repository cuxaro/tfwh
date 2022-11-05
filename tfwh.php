<?php

/**
 * Plugin Name: Typeform Webhooks Helper
 * Plugin URI: https://github.com/cuxaro/tfwh
 * Description: Manejo de webhooks de typeform en WordPress
 * Author URI: https://www.linkedin.com/in/ivan-barreda
 * Author: cuxaro
 * Version: 1.0.0
 * Text Domain: typeform-webhooks
 * License: GPL-2.0+
 */

namespace TypeformWebhooks;


// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}


// Init CPTs

add_action('init', function () {

    /**
     * Post Type: TPWHs.
     */

    $labels = [
        "name" => esc_html__("TPWHs", "tfwh"),
        "singular_name" => esc_html__("TFWH", "tfwh"),
        "menu_name" => esc_html__("My TPWHs", "tfwh"),
        "all_items" => esc_html__("All TPWHs", "tfwh"),
        "add_new" => esc_html__("Add new", "tfwh"),
        "add_new_item" => esc_html__("Add new TFWH", "tfwh"),
        "edit_item" => esc_html__("Edit TFWH", "tfwh"),
        "new_item" => esc_html__("New TFWH", "tfwh"),
        "view_item" => esc_html__("View TFWH", "tfwh"),
        "view_items" => esc_html__("View TPWHs", "tfwh"),
        "search_items" => esc_html__("Search TPWHs", "tfwh"),
        "not_found" => esc_html__("No TPWHs found", "tfwh"),
        "not_found_in_trash" => esc_html__("No TPWHs found in trash", "tfwh"),
        "parent" => esc_html__("Parent TFWH:", "tfwh"),
        "featured_image" => esc_html__("Featured image for this TFWH", "tfwh"),
        "set_featured_image" => esc_html__("Set featured image for this TFWH", "tfwh"),
        "remove_featured_image" => esc_html__("Remove featured image for this TFWH", "tfwh"),
        "use_featured_image" => esc_html__("Use as featured image for this TFWH", "tfwh"),
        "archives" => esc_html__("TFWH archives", "tfwh"),
        "insert_into_item" => esc_html__("Insert into TFWH", "tfwh"),
        "uploaded_to_this_item" => esc_html__("Upload to this TFWH", "tfwh"),
        "filter_items_list" => esc_html__("Filter TPWHs list", "tfwh"),
        "items_list_navigation" => esc_html__("TPWHs list navigation", "tfwh"),
        "items_list" => esc_html__("TPWHs list", "tfwh"),
        "attributes" => esc_html__("TPWHs attributes", "tfwh"),
        "name_admin_bar" => esc_html__("TFWH", "tfwh"),
        "item_published" => esc_html__("TFWH published", "tfwh"),
        "item_published_privately" => esc_html__("TFWH published privately.", "tfwh"),
        "item_reverted_to_draft" => esc_html__("TFWH reverted to draft.", "tfwh"),
        "item_scheduled" => esc_html__("TFWH scheduled", "tfwh"),
        "item_updated" => esc_html__("TFWH updated.", "tfwh"),
        "parent_item_colon" => esc_html__("Parent TFWH:", "tfwh"),
    ];

    $labels = apply_filters('tfwh_cpt_labels', $labels);

    $args = [
        "label" => esc_html__("TPWHs", "tfwh"),
        "labels" => $labels,
        "description" => "",
        "public" => false,
        "publicly_queryable" => false,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "typeform_webhooks", "with_front" => true],
        "query_var" => true,
        "supports" => ["title"],
        "show_in_graphql" => false,
    ];

    $args = apply_filters('tfwh_cpt_args', $args);


    register_post_type("typeform_webhooks", $args);
});

//Init ACF
add_action('plugin_loaded', function () {


    // Define path and URL to the ACF plugin.
    define('TFWH_ACF_PATH', plugin_dir_path(__FILE__) . 'includes/acf/');
    define('TFWH_ACF_URL', plugin_dir_url(__FILE__) . 'includes/acf/');


    // Include the ACF plugin.
    include_once(TFWH_ACF_PATH . 'acf.php');

    // Customize the url setting to fix incorrect asset URLs.
    add_filter('acf/settings/url', function ($url) {


        return TFWH_ACF_URL;
    });


    // (Optional) Hide the ACF admin menu item.
    add_filter('acf/settings/show_admin', function ($show_admin) {
        return false;
    });
});


add_action('init', function () {


    if (function_exists('acf_add_local_field_group')) :

        $acf_fields_options = array(
            'key' => 'group_63652d569af29',
            'title' => 'TFWH',
            'fields' => array(
                array(
                    'key' => 'field_63652d56b1fa0',
                    'label' => 'secret',
                    'name' => 'secret',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => __('Clave secreta que tendrá que coincidir con la que pongamos en Typeform', 'tfwh'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '30',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
                array(
                    'key' => 'field_63652e33f971e',
                    'label' => 'Endpoint',
                    'name' => 'endpoint',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => __('Endpoint que tenemos que agregar en Typeform. El campo se mostrará cuando se publique', 'tfwh'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '70',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'readonly' => 1
                ),
                array(
                    'key' => 'field_63652d971eea8',
                    'label' => 'Save Params',
                    'name' => 'save_params',
                    'aria-label' => '',
                    'type' => 'true_false',
                    'instructions' => __('Si queremos guardar los datos del formulario enviado marcar esta casilla', 'tfwh'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '30',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 1,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                ),
                array(
                    'key' => 'field_63652dcea1023',
                    'label' => 'Typeform Params',
                    'name' => 'typeform_params',
                    'aria-label' => '',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_63652d971eea8',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '70',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'placeholder' => '',
                    'new_lines' => '',
                    'readonly' => 1
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'typeform_webhooks',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        );


        $acf_fields_options = apply_filters( 'tfwh_acf_fields_options', $acf_fields_options );
        acf_add_local_field_group($acf_fields_options);

    endif;
});

add_action('save_post', function ($post_id, $post, $update) {


    if ('typeform_webhooks' !== $post->post_type) {
        return;
    }

    $slug = $post->post_name;
    if (!$slug) :
        return;
    endif;

    $namespace = apply_filters('tfwh_namespace', 'tfwh/v1');
    $rest_url_base = get_rest_url(null, $namespace);
    $rest_url_base = apply_filters('tfwh_rest_url_base', $rest_url_base);

    $route = apply_filters('tfwh_route', '/webhook');
    $url_endpoint = "{$rest_url_base}{$route}/{$slug}";
    $url_endpoint = apply_filters('tfwh_url_endpoint', $url_endpoint);

    update_field('endpoint', $url_endpoint, $post_id);
}, 99, 3);


//API

add_action('rest_api_init', function () {



    $namespace = apply_filters('tfwh_namespace', 'tfwh/v1');
    $route = apply_filters('tfwh_route', '/webhook');

    register_rest_route($namespace, "{$route}/(?P<slug>[a-zA-Z0-9-]+)", [


        'methods'       =>      'POST',
        'callback'      =>      __NAMESPACE__ . "\save_tfwh"

    ]);
});

function save_tfwh(\WP_REST_Request $request)
{

    $headers = $request->get_headers();
    $url_params = $request->get_url_params();
    $params = $request->get_params();



    //Get el cpt typeform_webhooks
    //Con el slug 


    //Si exist el slug
    if (!isset($url_params['slug'])) :

        wp_send_json('Falta el identificador', 400);


    endif;

    $slug = $url_params['slug'];

    $args = array(
        'name'        => $slug,
        'post_type'   => 'typeform_webhooks',
        'post_status' => 'publish',
        'numberposts' =>  1
    );

    $typeform_webhooks_posts = get_posts($args);
    if (!$typeform_webhooks_posts || !isset($typeform_webhooks_posts[0])) :

        wp_send_json('No existe ningun webhook', 400);

    endif;

    $typeform_webhook = $typeform_webhooks_posts[0];

    $secret = get_field('secret', $typeform_webhook->ID);

    if (!isset($headers['typeform_signature'])) :
        wp_send_json('Falta validacion', 400);

    endif;


    $header_signature = $headers['typeform_signature'];

    $payload = @file_get_contents("php://input");
    $hashed_payload = hash_hmac("sha256", $payload, $secret, true);
    $base64encoded = "sha256=" . base64_encode($hashed_payload);



    if ($header_signature[0] != $base64encoded) {
        wp_send_json('Fallo Autentificacion erronea', 400);
    }


    //Llamadas para hacer acciones
    do_action('tfwh_new', $request, $typeform_webhook);

    wp_send_json(['Ok'], 200);
}

add_action('tfwh_new', function (\WP_REST_Request $request, \WP_Post $typeform_webhook) {


    if (get_field('save_params', $typeform_webhook->ID) == 1) :

        $params = $request->get_params();

        $typeform_params = get_field('typeform_params', $typeform_webhook->ID);

        $typeform_params = $typeform_params ? json_decode($typeform_params) : [];

        $typeform_params[] = $params;

        // $typeform_params = $typeform_params . json_encode($params);

        update_field('typeform_params',  json_encode($typeform_params), $typeform_webhook->ID);


    endif;
}, 10, 2);
