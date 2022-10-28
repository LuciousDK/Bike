<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Domain\Validator;

use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

class BicycleValidator extends AbstractValidator
{
    public function isValid($value)
    {
        $minimum = 0;
        if (!is_int($value) || $value <= $minimum) {
            $this->addError('Number must be larger than ' . $minimum, 1548653067);
        }
    }
}
