<?php

namespace nochso\SamiTheme;

use nochso\HtmlCompressTwig\Extension;
use Sami\Reflection\ConstantReflection;
use Sami\Sami;
use Twig_SimpleFunction;

class Theme
{
    /**
     * @param Sami $sami
     *
     * @return Sami
     */
    public static function prepare(Sami $sami)
    {
        $sami['filter'] = function () {
            return new ProtectedFilter();
        };
        $fileGetFunction = new Twig_SimpleFunction('file_get_contents', 'file_get_contents');
        $constantSource = new Twig_SimpleFunction('constant_source', array(self::class, 'getConstantSource'));
        $sami['twig']->addFunction($fileGetFunction);
        $sami['twig']->addFunction($constantSource);
        $sami['twig']->addExtension(new Extension());
        $sami['theme'] = 'nochso';
        $sami['template_dirs'] = array_merge($sami['template_dirs'], array(__DIR__.'/..'));

        return $sami;
    }

    /**
     * @param ConstantReflection $constant
     *
     * @return string
     */
    public static function getConstantSource($constant)
    {
        $map = $constant->toArray();
        $lineNo = $map['line'];
        $filePath = $constant->getClass()->getFile();
        $sourceLines = file($filePath, FILE_IGNORE_NEW_LINES);
        $line = $sourceLines[$lineNo - 1];
        $pattern = '/'.preg_quote($map['name']).'\s*=(\s*.*)/';
        if (!preg_match($pattern, $line, $matches)) {
            return '';
        }

        return $matches[1];
    }
}
