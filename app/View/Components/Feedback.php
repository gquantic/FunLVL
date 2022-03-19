<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Feedback extends Component
{
    public  $feedback;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(\App\Models\FeedBack $feedback)
    {
        $this->feedback  = $feedback;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.feedback');
    }
}
