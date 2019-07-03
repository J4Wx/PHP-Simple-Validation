<?php

namespace J4Wx\SimpleValidation\Rules\Lib;

use J4Wx\SimpleValidation\Rules\RuleInterface;

class MinLength implements RuleInterface
{
    private $arguments;

    public function getName()
    {
        return 'minlength';
    }

    public function setArguments($args, $context)
    {
        $this->arguments = $args;
    }

    public function validate($value)
    {
        return strlen($value) >= $this->arguments[0];
    }

    public function getMessage()
    {
        return "Must be at least "  . $this->arguments[0] . ' characters long.';
    }
}
