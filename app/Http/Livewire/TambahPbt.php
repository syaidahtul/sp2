<?php

namespace App\Http\Livewire;

use App\Models\PbtTapakPelupusanSampahs;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class TambahPbt extends Component
{
    public $pbts;
    public $selectedPbt;
    public $modelName, $modelId;

    public $rules = [
        'selectedPbt.*.kod_pbt' => 'required'
    ];

    public function mount($modelName = null, $modelId = null)
    {
        $this->modelName = $modelName;
        $this->modelId = $modelId;
        $this->selectedPbt = [];
    }

    public function render()
    {
        if ($this->modelName) {
            $re = PbtTapakPelupusanSampahs::where('tapak_pelupusan_sampah_id', $this->modelId->id)->get();
            $this->selectedPbt = $re;

            info($this->selectedPbt);
        }
        $this->pbts = Cache::get('pbts');
        return view('livewire.tambah-pbt');
    }

    public function addPbt()
    {
        info('addPbt');
        $this->selectedPbt[] = [];
        info($this->selectedPbt);
    }

    public function updated()
    {
        info($this->selectedPbt);
    }

    public function deletePbt($index)
    {
        // info($index);
        // info($this->selectedPbt);
        unset($this->selectedPbt[$index]);
        $this->selectedPbt = array_values($this->selectedPbt);
        // info($this->selectedPbt);
    }

    public function updatePbt($index)
    {

    }

}
