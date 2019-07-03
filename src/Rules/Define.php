<?php

namespace J4Wx\SimpleValidation\Rules;

use J4Wx\SimpleValidation\Rules\Lib\MinLength;
use J4Wx\SimpleValidation\Rules\Lib\MaxLength;
use J4Wx\SimpleValidation\Rules\Lib\Required;
use J4Wx\SimpleValidation\Rules\Lib\Confirms;

class Define
{
    private $rules = [];

    public function __construct(bool $loadDefaults = true)
    {
        if ($loadDefaults) {
            $this->loadDefaults();
        }
    }

    public function addRule(RuleInterface $rule)
    {
        $this->rules[$rule->getName()] = $rule;
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function loadDefaults()
    {
        $this->addRule(new MinLength);
        $this->addRule(new MaxLength);
        $this->addRule(new Required);
        $this->addRule(new Confirms);
    }
}
