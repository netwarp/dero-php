<?php

namespace DeroPHP;

class Wallet {

    private string $address;
    private string $port;

    function __construct(string $address, string $port) {
        $this->address = $address;
        $this->port = $port;
    }

    private function request(string $method, $params = null, $verb = 'POST', $path = 'json_rpc') {
        $url = "http://{$this->address}:{$this->port}/$path";

        $data = [
            'jsonrpc' => '2.0',
            'id' => '1',
            'method' => $method
        ];

        if ($params) {
            $data['params'] = $params;
        }

        $options = [
            'http' => [
                'header' => 'Content-Type: application/json',
                'method' => $verb,
                'content'=> json_encode($data, JSON_FORCE_OBJECT)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);


        if ($result === FALSE) {

        }
        else {
            header('Content-Type: application/json');
            return $result;
        }
    }

    public function getaddress() {
        return $this->request('getaddress');
    }

    public function getbalance() {
        return $this->request('getbalance');
    }

    public function getheight() {
        return $this->request('getheight');
    }

    public function transfer(int $amount, string $address, int $Mixin = 6, string $payment_id = '') {
        
    }
}

$wallet = new Wallet('127.0.0.1', '30309');
echo $wallet->getheight();