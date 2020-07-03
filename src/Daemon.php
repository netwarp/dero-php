<?php

namespace DeroPHP;

use DeroPHP\Traits\Requester;

class Daemon
{
    use Requester;

	private string $address;
	private string $port;

	function __construct(string $address, string $port) {
        $this->address = $address;
        $this->port = $port;
	}

    /**
     * The method “getblockcount” returns the height of the (currently synced) chain. This is also the currenty unstable height. This method is called without parameters.
     * Returns the currently synced height of the chain
     * @return false|string
     */
	public function getblockcount() {
        return $this->request('getblockcount');
	}

    /**
     * The method “get_info” returns various info about the daemon and the state of the network. This method has no parameters.
     * Returns various info about the daemon and network
     * @return false|string
     */
    public function get_info() {
        return $this->request('get_info');
	}

    /**
     *
     * Return a block template (used for mining a block).
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

    /**
     * Returns the latest blockheader of the currently synced height
     * The method “getlastblockheader” returns the latest blockheader of the (currently synced) chain. This is equal to the top unstable height. This method is called without parameters.
     * @return false|string
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

$d = new Daemon('127.0.0.1', '30306');
dd($d->getblockcount());