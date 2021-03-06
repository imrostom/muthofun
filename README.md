# MUTHOFUN SMS GATEWAY

[![Latest Version on Packagist](https://img.shields.io/packagist/v/imrostom/muthofun.svg?style=flat-square)](https://packagist.org/packages/imrostom/muthofun)
[![Build Status](https://img.shields.io/travis/imrostom/muthofun/master.svg?style=flat-square)](https://travis-ci.org/imrostom/muthofun)
[![Quality Score](https://img.shields.io/scrutinizer/g/imrostom/muthofun.svg?style=flat-square)](https://scrutinizer-ci.com/g/imrostom/muthofun)
[![Total Downloads](https://img.shields.io/packagist/dt/imrostom/muthofun.svg?style=flat-square)](https://packagist.org/packages/imrostom/muthofun)

Muthofun SMS GATEWAY is a LARAVEL client for MUTHOFUN SMS Gateway API

## Installation

You can install the package via composer:

```bash
composer require imrostom/muthofun
```

## Usage

You this namespace in your controllers:
``` php
use Imrostom\Muthofun\Facade\Muthofun;

```

## Configuration

Publish muthofun config file and configure your mutofun information.
``` php
return [
    'username' => 'imrostom',
    'password' => '123456',
    'unicode'  => 1, // 1 or 0
    'database' => true,
    'demo'     => true,
    'version'  => '1.0',
];

```

To send message single user
``` php
$response = Muthofun::messages(['mobile'=> '+0145465', 'message'=> 'a demo message'])->send();

```

To send message mutiple user
``` php
$response = Muthofun::messages([['mobile'=> '+0145465', 'message'=> 'a demo message'], ['mobile'=> '+0145465', 'message'=> 'a demo message']])->send();

```
### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email rostomali4444@gmail.com instead of using the issue tracker.

## Credits

- [Md Rostom Ali](https://github.com/imrostom)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
