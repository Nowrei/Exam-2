<?php

class formulaire extends form {

    protected function surround($html){

        return "<div class=\login-form\>{$html}</div>";
    
    }

    public function input($name){

        return $this->surround(
            '<label>' . $name . '</label>' . '<input type="text" name="' . $name . '" value="' . $this->getValue($name) .'" class="form-control">');
    }
}