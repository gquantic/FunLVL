<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $errors;

    public $success;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($success, $errors)
    {
        $this->errors = $errors->messages();
        $this->success = $success;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
