<?php

namespace App\Http\Livewire\ProfailPbt;

use App\Models\Pbt;
use Livewire\Component;

class TabProfail extends Component
{
    public Pbt $pbt;

    protected $rules = [
        'pbt.kod' => 'required',
        'pbt.nama_pbt' => 'required',
        'pbt.alamat' => 'nullable',
        'pbt.poskod' => 'required',
        'pbt.region' => 'required',
        'pbt.state' => 'required',
        'pbt.no_tel' => 'nullable|sometimes|min:6',
        'pbt.no_fax' => 'nullable',
        'pbt.longitude' => 'nullable',
        'pbt.latitude' => 'nullable',
    ];

    public function mount($pbt)
    {
        $this->pbt = $pbt;
    }

    public function render()
    {

        return view('livewire.profail-pbt.tab-profail');
    }

    public function updatePbtProfail()
    {
        $this->validate();

        $this->pbt->forceFill([
            'alamat' => $this->pbt->alamat,
            'no_tel' => $this->pbt->no_tel,
            'no_fax' => $this->pbt->no_fax,
        ])->save();

        $this->emit('saved');
    }
}
