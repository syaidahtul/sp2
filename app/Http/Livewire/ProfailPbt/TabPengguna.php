<?php

namespace App\Http\Livewire\ProfailPbt;

use App\Models\Pbt;
use Livewire\Component;

class TabPengguna extends Component
{
    public Pbt $pbt;
    
    public function mount($pbt)
    {
        $this->pbt = $pbt;
    }

    public function render()
    {
        return view('livewire.profail-pbt.tab-pengguna');
    }

}
