<?php

namespace DeroPHP\Traits;

trait Requester {

    public function request(string $method, $params = null, $verb = 'POST', $path = 'json_rpc') {
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
           // header('Content-Type: application/json');
            return $result;
        }
    }
}