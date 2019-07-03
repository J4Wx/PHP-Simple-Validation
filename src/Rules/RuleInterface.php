<?php

namespace J4Wx\SimpleValidation\Rules;

interface RuleInterface
{
    public function getName();

    public function setArguments($args, $context);

    public function validate($value);
}