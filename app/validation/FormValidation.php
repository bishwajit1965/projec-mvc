<?php

/**
 * The class is meant for .....
 *
 * Display name <username@example.com>
 *
 * Display category
 *
 * @date --/--/20
 */
class FormValidation
{
    public $currentValue;
    public $values = [];
    public $errors = [];
    public function __construct()
    {
    }
    public function post($key)
    {
        $this->values[$key] =  trim($_POST[$key]);
        $this->currentValue = $key;
        return $this;
    }
    public function empty()
    {
        if (empty($this->values[$this->currentValue])) {
            $this->errors[$this->currentValue]['empty'] = " field must not be empty.";
        }
        return $this;
    }
    public function length($min=0, $max)
    {
        if (strlen($this->values[$this->currentValue]) < $min  or strlen($this->values[$this->currentValue]) > $max) {
            $this->errors[$this->currentValue]['length'] = " minimum string length should be " . $min . " and maximum length should be " . $max . " characters.";
        }
        return $this;
    }
    public function submit()
    {
        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }
}