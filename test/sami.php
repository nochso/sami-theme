<?php

/**
 * @copyright Copyright (c) 2015 Marcel Voigt
 */
use Sami\Parser\Filter\FilterInterface;
use Sami\Reflection\ClassReflection;
use Sami\Reflection\MethodReflection;
use Sami\Reflection\PropertyReflection;
use Sami\Sami;
use Symfony\Component\Finder\Finder;

$finder = Finder::create()
    ->files()
    ->name('*.php')
//    ->in(__DIR__.'/../vendor')
    ->in(__DIR__.'/../vendor/symfony/finder')
//    ->in(__DIR__.'/../../cmdli/vendor')
//    ->in(__DIR__.'/../vendor/twig')
;

$config = array(
    'theme' => 'nochso',
    'title' => 'Symfony Finder API using nochso/sami theme',
    'build_dir' => __DIR__.'/build',
    'cache_dir' => __DIR__.'/cache',
    'template_dirs' => array(__DIR__.'/..'),
);

$sami = new Sami($finder, $config);
$sami['filter'] = function () {
    return new ProtectedFilter();
};
$fileGetFunction = new Twig_SimpleFunction('file_get_contents', 'file_get_contents');
$sami['twig']->addFunction($fileGetFunction);

class ProtectedFilter implements FilterInterface
{
    public function acceptClass(ClassReflection $class)
    {
        return true;
    }

    public function acceptMethod(MethodReflection $method)
    {
        return $method->isPublic() || $method->isProtected();
    }

    public function acceptProperty(PropertyReflection $property)
    {
        return $property->isPublic() || $property->isProtected();
    }
}

return $sami;
