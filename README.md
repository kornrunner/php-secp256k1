# php-secp256k1 [![Tests](https://github.com/kornrunner/php-secp256k1/actions/workflows/tests.yml/badge.svg?branch=master)](https://github.com/kornrunner/php-secp256k1/actions/workflows/tests.yml) [![Coverage Status](https://coveralls.io/repos/github/kornrunner/php-secp256k1/badge.svg?branch=master)](https://coveralls.io/github/kornrunner/php-secp256k1?branch=master) [![Latest Stable Version](https://poser.pugx.org/kornrunner/secp256k1/v/stable)](https://packagist.org/packages/kornrunner/secp256k1)

```lang=bash
$ composer require kornrunner/secp256k1
```

## Usage

Sign a message:

```php
<?php

require_once 'vendor/autoload.php';

use kornrunner\Secp256k1;
use kornrunner\Serializer\HexSignatureSerializer;

$secp256k1 = new Secp256k1();

// return signature contains r, s and recovery param (v).
// message and privateKey are hex strings
$signature = $secp256k1->sign($message, $privateKey);

// get r
$r = $signature->getR();

// get s
$s = $signature->getS();

// get recovery param
$v = $signature->getRecoveryParam();

// encode to hex
$serializer = new HexSignatureSerializer();
$signatureString = $serializer->serialize($signature);

// or you can call toHex
$signatureString = $signature->toHex();
```

Verify a message:

```php
<?php

require_once 'vendor/autoload.php';

use kornrunner\Secp256k1;

$secp256k1 = new Secp256k1();

// signature was created by sign method
// hash and publicKey are hex strings
$isVerified = $secp256k1->verify($hash, $signature, $publicKey);
```

## License

MIT

## Crypto


[![Ethereum](https://user-images.githubusercontent.com/725986/61891022-0d0c7f00-af09-11e9-829f-096c039bbbfa.png) 0x9c7b7a00972121fb843af7af74526d7eb585b171][Ethereum]

[Ethereum]: https://etherscan.io/address/0x9c7b7a00972121fb843af7af74526d7eb585b171 "Donate with Ethereum"
