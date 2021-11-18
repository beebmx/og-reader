# OG Reader

[![Latest Version on Packagist](https://img.shields.io/packagist/v/beebmx/og-reader.svg?style=flat-square)](https://packagist.org/packages/beebmx/og-reader)
[![Total Downloads](https://img.shields.io/packagist/dt/beebmx/og-reader.svg?style=flat-square)](https://packagist.org/packages/beebmx/og-reader)

---
This packages helps you to detect and read `Open Graphs` tags in any html page.

---


## Installation

You can install the package via composer:

```shell
composer require beebmx/og-reader
```

## Usage

For validate a page with or without `Open Graph` tags:

```php
use Beebmx\OgReader\ContentReader;

$reader = ContentReader::load('https://website.com');

$reader->meta()->hasOg();
$reader->meta()->notHasOg();
```

If you need all the meta tags in the page:

```php
use Beebmx\OgReader\ContentReader;

$reader = ContentReader::load('https://website.com');

$reader->meta();
```

If you only need the `Open Graph` tags:

```php
use Beebmx\OgReader\ContentReader;

$reader = ContentReader::load('https://website.com');

$reader->meta()->og();
```

Each tag can be access like an object:

```php
$tag->property;
$tag->content;
```

If you need the tag representation as HTML just:

```php
$tag->asHtml();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Fernando Gutierrez](https://github.com/beebmx)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.