<?php

namespace Core\HTML;

class Form{

    protected $fields;

    /**
     * Form constructor.
     * @param $fields
     */
    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @param $name
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [])
    {
        $value = isset($this->fields['username'])? 'value="' . $this->fields['username'] . '"' : '';
        $type = isset($options['type']) ? $options['type'] : 'text';
        $in = "<input name=\"{$name}\" type=\"{$type}\" {$value} />";
        $in = "<label>{$label}" . $in . '</label>';
        return $this->wrap($in);
    }

    /**
     * @param $text
     * @param string $wrapper
     * @return string
     */
    public function wrap($text, $wrapper='p'){
        return '<' . $wrapper . '>' . $text . '</' . $wrapper . '>';
    }
}