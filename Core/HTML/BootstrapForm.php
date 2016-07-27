<?php

namespace Core\HTML;

class BootstrapForm extends Form{

    /**
     * @param $name
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [])
    {
        $opts = [];
        $type = isset($options['type']) ? $options['type'] : 'text';
        foreach ($options as $k => $v) {
            $opts[] = $k . '=' .'"' . $v . '"';
        }
        $opts = implode(' ', $opts);

        if(is_object($this->fields)){
            $value = ( $type != 'password' && isset($this->fields->$name))? 'value="' . $this->fields->$name . '"' : '';
            $text = isset($this->fields->$name)?$this->fields->$name:'';
        }
        else{
            $value = ( $type != 'password' && isset($this->fields[$name]))? 'value="' . $this->fields[$name] . '"' : '';
            $text = isset($this->fields[$name])?$this->fields[$name]:'';
        }
        $lab = "<label for=\"label" . ucfirst($name) . "\">{$label}</label>";

        if($type === 'textarea')
        {
            $in = "<textarea name=\"{$name}\" id=\"label" . ucfirst($name) ."\" class=\"form-control\">{$text}</textarea>";
        }
        else
        {
            $in = "<input {$opts} name=\"{$name}\" id=\"label" . ucfirst($name) ."\" class=\"form-control\" {$value} /> ";
        }

        return $this->wrap($lab . $in);
    }

    /**
     * @param $text
     * @param string $wrapper
     * @return string
     */
    public function wrap($text, $wrapper='div'){
        return '<' . $wrapper . ' class="form-group">' . $text . '</' . $wrapper . '>';
    }
}