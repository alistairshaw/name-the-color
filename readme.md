## Install

Via Composer

``` bash
$ composer require alistairshaw/name-the-color:0.1.*
```

## Usage

```php
require 'vendor/autoload.php';

use AlistairShaw\NameTheColor\ColorMaker;

// You can get a Color object from a hex code. It will find the closest named color to your hex.
$color = ColorMaker::fromHex('#FF0000');

// or from the name of the color
$color = ColorMaker::fromString('Red');

// once you have the color object you can get the resulting color like so:
echo $color->getName() . ' - ' . $color->getHex() . ' (' . $color->getOriginalHex() . ')';

```

## Contributing

Contributions are very welcome and will be fully credited, just please make sure to add tests.


## Credits

- [Alistair Shaw](https://github.com/alistairshaw)
- [All Contributors](https://github.com/alistairshaw/name-the-color/contributors)


## License

The MIT License (MIT).