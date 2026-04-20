<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditButton extends Component
{
    public string $url;
    public string $name;

    public function __construct(string $url, string $name = 'Edit')
    {
        $this->url = $url;
        $this->name = $name;
    }

    public function render(): View|Closure|string
    {
        return view('components.edit-button');
    }
}
