<?php

namespace J4Wx\SimpleValidation;

use J4Wx\SimpleValidation\Rules\Define;

class Validator
{
    public static function validate(array $object, array $conditions, Define $def = null)
    {
        if (is_null($def)) {
            $def = new Define();
        }

        $tests = $def->getRules();
        $validTests = array_keys($tests);
        $failures = [];

        foreach ($conditions as $key => $rules) {
            if (isset($object[$key])) {
                $v = $object[$key];
            } else {
                $v = false;
            }

            $rules = explode('|', $conditions[$key]);

            foreach ($rules as $rule) {
                $args = explode("+", explode(':', $rule)[1] ?? "");
                $rule = explode(":", $rule)[0];

                if (in_array($rule, $validTests)) {
                    $r = $tests[$rule];
                    $r->setArguments($args, $object);
                    if (!$r->validate($v)) {
                        $failures[$key][] = $r->getMessage();
                    }
                } else {
                    // TODO: Throw something here?
                }
            }
        }
        if (empty($failures)) {
            return true;
        } else {
            return $failures;
        }
    }
}
