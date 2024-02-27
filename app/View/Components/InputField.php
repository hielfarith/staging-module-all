<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    public $type;
    public $label;
    public $name;
    public $required;
    public $placeholder;

    /**
     * Create a new component instance.
     */
    public function __construct($type, $label, $name,  $required, $placeholder)
    {
        $this->type = $type;
        $this->label = $label;
        $this->name = $name;
        $this->required = $required;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field');
    }
}
