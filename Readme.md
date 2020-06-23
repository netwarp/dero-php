# Dero PHP

Library to call API on the Dero blockchain.

## Install

```bash
composer require netwarp/derophp
```

## Usage

### Daemon

```php
$daemon = new Daemon('127.0.0.1', '30306');
```


#### getblockcount

#### get_info

#### getblocktemplate

#### submitblock

#### getlastblockheader

#### getblockheaderbyhash

#### getblockheaderbytopoheight

#### getblockheaderbyheight

#### getblock

#### gettxpool

#### getheight

#### gettransactions

#### sendrawtransaction

#### is_key_image_spent

### Wallet

#### getaddress

#### getbalance

#### getheight

#### transfer

#### get_bulk_payments

#### query_key

#### make_integrated_address

#### split_integrated_address

#### get_transfer_by_txid

#### get_transfers

