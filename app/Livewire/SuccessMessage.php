<?php

namespace App\Livewire;

use Livewire\Component;

class SuccessMessage extends Component
{
    public $title;
    public $message;

    public function __construct($title, $message)
    {
        $this->title = $title;
        $this->message = $message;
    }

    public function render()
    {
        return view('components.success-message');
    }
}
