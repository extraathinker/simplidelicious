<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Inputform extends Component
{
    public $type;
    public $name;
    public $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label,$type,$name)
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputform');
    }
}
