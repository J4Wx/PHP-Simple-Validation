<?php

namespace J4Wx\SimpleValidation\Rules\Lib;

use J4Wx\SimpleValidation\Rules\RuleInterface;

class Confirms implements RuleInterface
{
    private $context;

    public function getName()
    {
        return 'confirms';
    }

    public function setArguments($args, $context)
    {
        $this->args = $args;
        $this->context = $context;
    }

    public function validate($value)
    {
        $confirms = false;

        if (isset($this->context[$this->args[0]])) {
            $confirms = $this->context[$this->args[0]];
        }
        return ($value === $confirms);
    }

    public function getMessage()
    {
        return 'Must confirm ' . $this->args[0] . '.';
    }
}
