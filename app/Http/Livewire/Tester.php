<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tester extends Component
{
    public $name ='';

    public function render()
    {
        return view('livewire.tester');
    }
}
