<?php

namespace J4Wx\SimpleValidation\Rules\Lib;

use J4Wx\SimpleValidation\Rules\RuleInterface;

class Required implements RuleInterface
{
    private $arguments;

    public function getName()
    {
        return 'required';
    }

    public function setArguments($args, $context)
    {
    }

    public function validate($value)
    {
        return ($value !== false);
    }

    public function getMessage()
    {
        return 'Is required.';
    }
}
