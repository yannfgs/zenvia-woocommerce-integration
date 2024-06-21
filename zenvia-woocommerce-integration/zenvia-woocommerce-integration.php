<?php
/*
Plugin Name: Integração Zenvia WooCommerce
Plugin URI:  http://seusite.com/zenvia-woocommerce-integration
Description: Integração do WooCommerce com a Zenvia para notificações automatizadas.
Version:     1.0
Author:      Seu Nome
Author URI:  http://seusite.com
License:     GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Inclui os arquivos necessários
require_once plugin_dir_path( __FILE__ ) . 'includes/class-zenvia-api.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-zenvia-woocommerce.php';

// Inicializa o plugin
function zenvia_woocommerce_integration_init() {
    Zenvia_WooCommerce::init();
}
add_action( 'plugins_loaded', 'zenvia_woocommerce_integration_init' );
