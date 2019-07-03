<?php

namespace J4Wx\SimpleValidation\Rules\Lib;

use J4Wx\SimpleValidation\Rules\RuleInterface;

class MaxLength implements RuleInterface
{
    private $arguments;

    public function getName()
    {
        return 'maxlength';
    }

    public function setArguments($args, $context)
    {
        $this->arguments = $args;
    }

    public function validate($value)
    {
        return strlen($value) <= $this->arguments[0];
    }

    public function getMessage()
    {
        return "Must be at most "  . $this->arguments[0] . ' characters long.';
    }
}
