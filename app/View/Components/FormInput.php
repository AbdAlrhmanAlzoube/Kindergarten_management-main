<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInput extends Component
{   
    public $name;
    public $class;
    public $placeholder;
    public $ariaPlaceholder;
    public $value;

    public function __construct($name, $class = null, $placeholder = null, $ariaPlaceholder = null, $value = null)
    {
        $this->name = $name;
        $this->class = $class;
        $this->placeholder = $placeholder;
        $this->ariaPlaceholder = $ariaPlaceholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input');
    }
}
