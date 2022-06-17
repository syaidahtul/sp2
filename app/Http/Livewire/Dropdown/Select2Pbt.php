<?php

namespace App\Http\Livewire\Dropdown;

use App\Models\Pbt;
use Livewire\Component;

class Select2Pbt extends Component
{

    public $selectedPbt = '';

    public function render()
    {
        $pbts = Pbt::notKKTP()->get();;
        return view('livewire.dropdown.select2-pbt', ['pbts' => $pbts]);
    }

}
