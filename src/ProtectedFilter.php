<?php

namespace nochso\SamiTheme;

use Sami\Parser\Filter\FilterInterface;
use Sami\Reflection\ClassReflection;
use Sami\Reflection\MethodReflection;
use Sami\Reflection\PropertyReflection;

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
