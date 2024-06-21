<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Zenvia_WooCommerce {

    public static function init() {
        add_action('woocommerce_thankyou', array(__CLASS__, 'notify_order'), 10, 1);
    }

    public static function notify_order($order_id) {
        if (!$order_id) {
            return;
        }

        $order = wc_get_order($order_id);
        $phone = $order->get_billing_phone();
        $message = 'Obrigado pelo seu pedido. Seu pedido número ' . $order_id . ' foi recebido.';

        $zenvia_api = new Zenvia_API();

        // Enviar SMS
        $zenvia_api->send_sms($phone, $message);

        // Enviar WhatsApp
        $zenvia_api->send_whatsapp($phone, $message);
    }
}
