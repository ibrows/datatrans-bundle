<?php

namespace Ibrows\DataTransBundle\Validator;

use Symfony\Component\Validator\Validation;

class ValidatorFactory
{
    public static function getValidator()
    {
        return Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator()
        ;
    }
}
