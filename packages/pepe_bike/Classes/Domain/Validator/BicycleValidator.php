<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Domain\Validator;

use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

class BicycleValidator extends AbstractValidator
{
    // protected $supportedOptions = [
    //     'minimum' => [
    //         10,
    //         'Minimum number of character',
    //         'integer',
    //     ],
    // ];

    public function isValid($value): void
    {
        $minimum = intval($this->options['minimum']);
        if (!is_int($value) || $value <= $minimum) {
            $this->addError('Number must be larger than ' . $minimum, 1548653067);
        }
    }
}
