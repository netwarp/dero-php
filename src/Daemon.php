<?php

namespace DeroPHP;

class Daemon
{
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

	public function getblockcount() {
        return $this->request('getblockcount');
	}

    public function get_info() {
        return $this->request('get_info');
	}

    /**
     * @param string $wallet_address
     * @param int $reserve_size
     * @return false|string
     */
	public function getblocktemplate(string $wallet_address, int $reserve_size = 10) {

	    $params = compact('wallet_address', 'reserve_size');

        return $this->request('getblocktemplate', $params);
	}

	/*
	private function submitblock() {

	}
	*/

	public function getlastblockheader() {
        return $this->request('getlastblockheader');
	}

	public function getblockheaderbyhash(string $hash) {
        $params = compact('hash');

        return $this->request('getblocktemplate', $params);
	}

	public function getblockheaderbytopoheight(int $topoheight) {
        $params = compact('topoheight');

        return $this->request('getblockheaderbytopoheight', $params);
	}

	public function getblockheaderbyheight(int $height) {
        $params = compact('height');

        return $this->request('getblockheaderbyheight', $params);
	}

	public function getblock(string $hash) {
        $params = compact('hash');

        return $this->request('getblock', $params);
	}

	public function gettxpool() {
        return $this->request('gettxpool');
	}

	public function getheight() {
        return $this->request('getheight', null, 'GET', 'getheight');
    }

    // TODO DEBUG
    public function gettransactions($params) {
        return $this->request('gettransactions', $params, 'GET', 'gettransactions');
    }

    public function sendrawtransaction() {

    }

    public function is_key_image_spent() {

    }
}