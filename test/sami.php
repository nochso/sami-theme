<?php

/**
 * @copyright Copyright (c) 2015 Marcel Voigt
 */
use Sami\Sami;
use Symfony\Component\Finder\Finder;

$finder = Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__.'/../vendor/symfony/finder')
;

$config = array(
    'theme' => 'nochso',
    'title' => 'Symfony Finder API using nochso/sami theme',
    'build_dir' => __DIR__.'/build',
    'cache_dir' => __DIR__.'/cache',
    'template_dirs' => array(__DIR__.'/..'),
);

$sami = new Sami($finder, $config);
$sami = \nochso\SamiTheme\Theme::prepare($sami);
return $sami;
