# nochso/sami-theme Theme for the Sami API doc generator

[![Latest Stable Version](https://poser.pugx.org/nochso/sami-theme/v/stable)](https://packagist.org/packages/nochso/sami-theme)
[![License](https://poser.pugx.org/nochso/sami-theme/license)](LICENSE)

This is a theme for the [Sami](https://github.com/FriendsOfPHP/Sami) API documentation generator with some added features:

- The complete file source is included at the end.
- Source code highlighting with [prismjs](http://prismjs.com/).
- Show the value / assignment of class constants.
- HTML is minified using [wyrihaximus/html-compress](https://github.com/WyriHaximus/HtmlCompress).

## Installation

If you haven't already installed Sami, use this to install it and the theme:

```sh
$ composer require sami/sami nochso/sami-theme
```

Otherwise use this:

```sh
$ composer require nochso/sami-theme
```

## Usage

In your [Sami configuration file](https://github.com/FriendsOfPHP/Sami#configuration) simply call `Theme::prepare` to
inject the theme into your Sami instance right before returning it:

```php
return \nochso\SamiTheme\Theme::prepare($sami);
```

e.g.
```php
<?php

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$finder = Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__.'/src');

$config = array(
    'title' => 'Project documentation title',
    'build_dir' => __DIR__.'/build',
    'cache_dir' => __DIR__.'/cache',
);

$sami = new Sami($finder, $config);
$sami = \nochso\SamiTheme\Theme::prepare($sami);
return $sami;
```

This will create the documentation for the files in `src/` using this theme.

## Contributing

1. [Open an issue](https://github.com/nochso/sami-theme/issues/new) if it's worth discussing.
2. Fork this project on Github.
3. Clone your fork: `git clone git@github.com:yourname/sami-theme.git`
4. Don't forget to `composer update`
4. Create your feature branch: `git checkout -b my-new-feature`
5. Commit your changes: `git commit -am 'Add some feature'`
6. Push to the branch: `git push origin my-new-feature`
7. Submit a pull request on Github :)

## History

### 0.1.0 - 2015-09-26
First public release.

## Credits

- [Marcel Voigt](https://github.com/nochso)

## License
This project is licensed under the ISC license which is MIT/GPL compatible and FSF/OSI approved:

```
Copyright (c) 2015, Marcel Voigt <mv@noch.so>

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted, provided that the above
copyright notice and this permission notice appear in all copies.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
```
