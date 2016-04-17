# nochso/sami-theme Theme for the Sami API doc generator

[![Latest Stable Version](https://poser.pugx.org/nochso/sami-theme/v/stable)](https://packagist.org/packages/nochso/sami-theme)
[![License](https://poser.pugx.org/nochso/sami-theme/license)](LICENSE)

This is a theme for the [Sami] API documentation generator with some added features:

- The complete file source is included at the end.
- Source code highlighting with [prismjs](http://prismjs.com/).
- Show the value / assignment of class constants.
- HTML is minified using [wyrihaximus/html-compress][html-compress].

An an example take a look at the [API docs](http://nochso.github.io/Benchmark/docs/) for the [nochso/Benchmark](https://github.com/nochso/Benchmark/) library.

## Installation

If you haven't used [Sami] before, please read up on its installation and basic usage first.

When you're ready, require the theme in your project:

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

This looks for PHP files in `src/` and saves the resulting documentation in `build/`.

These results are now ready for you to upload and share!

## History

### 0.2.0 - 2016-04-17
#### Changed
- Bump nochso/html-compress-twig to 1.0.0

### 0.1.1 - 2015-10-05
#### Changed
- Use [nochso/html-compress-twig](https://github.com/nochso/html-compress-twig) as Twig extension around [wyrihaximus/html-compress][html-compress].

### 0.1.0 - 2015-09-26
First public release.

## Contributing

1. [Open an issue](https://github.com/nochso/sami-theme/issues/new) if it's worth discussing.
2. Fork this project on Github.
3. Clone your fork: `git clone git@github.com:yourname/sami-theme.git`
4. Don't forget to `composer update`
4. Create your feature branch: `git checkout -b my-new-feature`
5. Commit your changes: `git commit -am 'Add some feature'`
6. Push to the branch: `git push origin my-new-feature`
7. Submit a pull request on Github :)

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

[Sami]: https://github.com/FriendsOfPHP/Sami
[html-compress]: https://github.com/WyriHaximus/HtmlCompress
[benchmark-docs]: http://nochso.github.io/Benchmark/docs/index.html
