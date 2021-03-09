# Wordpress REST API Publisher

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pforret/wp_rest_publisher.svg?style=flat-square)](https://packagist.org/packages/pforret/wp_rest_publisher)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/pforret/wp_rest_publisher/Tests?label=tests)](https://github.com/pforret/wp_rest_publisher/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/pforret/wp_rest_publisher.svg?style=flat-square)](https://packagist.org/packages/pforret/wp_rest_publisher)


Publish your Wordpress posts from PHP, using images, tags and categories

## Installation

You can install the package via composer:

```bash
composer require pforret/wp_rest_publisher
```

## Usage

```php
$skeleton = new Pforret\WpRestPublisher();
echo $skeleton->echoPhrase('Hello, Pforret!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Peter Forret](https://github.com/pforret)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
