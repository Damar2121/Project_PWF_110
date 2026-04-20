<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteButton extends Component
{
    public string $url;
    public string $name;
    public string $confirm;

    public function __construct(string $url, string $name = 'Delete', string $confirm = 'Are you sure you want to delete this?')
    {
        $this->url = $url;
        $this->name = $name;
        $this->confirm = $confirm;
    }

    public function render(): View|Closure|string
    {
        return view('components.delete-button');
    }
}
