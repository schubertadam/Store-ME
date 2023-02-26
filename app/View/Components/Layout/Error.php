<?php

namespace App\View\Components\Layout;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Error extends AbstractBaseLayout
{
    public function __construct(string $title = '')
    {
        parent::__construct($title);
    }

    public function render(): View
    {
        return view('components.layout.error');
    }
}
