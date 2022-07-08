<?php

namespace App\Http\Livewire\ProfailPbt;

use App\Models\Kontraktor as ModelsKontraktor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TabKontraktor extends Component
{
    public $pbt;

    public function mount($pbt)
    {
        $this->pbt = $pbt;
    }

    public function render()
    {
        // $kontraktors = ModelsKontraktor::whereHas('pbts', fn($query) => $query->where('kod_pbt', '=', $this->pbt->kod ) )->get();
        $kontraktors = $this->pbt->kontraktors;
        return view('livewire.profail-pbt.tab-kontraktor', ['kontraktors' => $kontraktors]);
    }
}
