<?php

namespace App\Http\Livewire\ProfailPbt;

use App\Models\Pbt;
use App\Models\TapakPelupusanSampahs as ModelTapakPelupusanSampahs;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TabTapakPelupusanSampah extends Component
{
    public $pbt;

    public function mount($pbt)
    {
        $this->pbt = $pbt;
    }
    
    public function render()
    {
        $tapaks = $this->pbt->tapakPelupusanSampahs()->get();
        return view('livewire.profail-pbt.tab-tapak-pelupusan-sampah', ['tapaks'=> $tapaks]);
    }

    public function save() 
    {

    }
}
