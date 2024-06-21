<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Zenvia_API {
    private $api_key;
    private $api_url;

    public function __construct() {
        $this->api_key = 'SUA_API_KEY'; // Substitua pela sua chave de API
        $this->api_url = 'https://api.zenvia.com/v2/';
    }

    public function send_sms($phone, $message) {
        $url = $this->api_url . 'channels/sms/messages';

        $data = [
            'from' => 'Seu Nome',
            'to' => $phone,
            'contents' => [
                [
                    'type' => 'text',
                    'text' => $message
                ]
            ]
        ];

        $args = [
            'body' => json_encode($data),
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->api_key
            ]
        ];

        $response = wp_remote_post($url, $args);

        if (is_wp_error($response)) {
            return false;
        } else {
            return true;
        }
    }

    public function send_whatsapp($phone, $message) {
        $url = $this->api_url . 'channels/whatsapp/messages';

        $data = [
            'from' => 'whatsapp-number', // Substitua pelo seu número do WhatsApp na Zenvia
            'to' => $phone,
            'contents' => [
                [
                    'type' => 'text',
                    'text' => $message
                ]
            ]
        ];

        $args = [
            'body' => json_encode($data),
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->api_key
            ]
        ];

        $response = wp_remote_post($url, $args);

        if (is_wp_error($response)) {
            return false;
        } else {
            return true;
        }
    }
}
