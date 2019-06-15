# Encoding-json

[![Travis CI](https://api.travis-ci.org/qlimix/encoding-json.svg?branch=master)](https://travis-ci.org/qlimix/encoding-json)
[![Coveralls](https://img.shields.io/coveralls/github/qlimix/encoding-json.svg)](https://coveralls.io/qlimix/encoding-json)
[![Packagist](https://img.shields.io/packagist/v/qlimix/encoding-json.svg)](https://packagist.org/packages/qlimix/encoding-json)
[![MIT License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://github.com/qlimix/encoding-json/blob/master/LICENSE)

Encode and decode json based on the qlimix/encoding package.

## Install

Using Composer:

~~~
$ composer require qlimix/encoding-json
~~~

## usage

```php
<?php

use Qlimix/Encoding/Encode/JsonEncode;
use Qlimix/Encoding/Decode/JsonDecode;

$encode = new JsonEncode();
$decode = new JsonDecode();

$value = ['foo' => 'bar', 'number' => 1];

$encoded = $encode->encode($value);
$decode = $decode->decode($encoded);

```

## Testing
To run all unit tests locally with PHPUnit:

~~~
$ vendor/bin/phpunit
~~~

## Quality
To ensure code quality run grumphp which will run all tools:

~~~
$ vendor/bin/grumphp run
~~~

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.
