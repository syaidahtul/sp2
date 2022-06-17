<?php

namespace App\Http\Livewire\ProfailPbt;

use App\Models\Kontraktor as ModelsKontraktor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Kontraktor extends Component
{
    public $pbt;

    public function mount($pbt)
    {
        $this->pbt = $pbt;
    }

    public function render()
    {
        $kontraktors = ModelsKontraktor::byPbt(Auth::user()->current_pbt)->get();
        return view('livewire.profail-pbt.kontraktor', ['kontraktors' => $kontraktors]);
    }
}
