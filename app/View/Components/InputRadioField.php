<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputRadioField extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $label;
    public $name;
    public $required;

    public function __construct($label, $name, $required)
    {
        $this->label = $label;
        $this->name = $name;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-radio-field');
    }
}
