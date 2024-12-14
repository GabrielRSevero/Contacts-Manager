<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ConfirmModal extends Component
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        return view('components.confirm-modal');
    }
}
