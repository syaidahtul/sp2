<?php

namespace App\Http\Livewire\ProfailPbt;

use App\Models\Pbt;
use Livewire\Component;

class Profail extends Component
{
    public Pbt $pbt;

    protected $rules = [
        'pbt.kod' => 'required',
        'pbt.nama_pbt' => 'required',
        'pbt.alamat_line1' => 'nullable',
        'pbt.no_tel' => 'nullable|sometimes|min:6',
        'pbt.no_fax' => 'nullable',
    ];

    public function mount($pbt)
    {
        $this->pbt = $pbt;
    }

    public function render()
    {
        return view('livewire.profail-pbt.profail');
    }

    public function updatePbtProfail()
    {
        $this->validate();

        $this->pbt->forceFill([
            'alamat_line1' => $this->pbt->alamat_line1,
            'no_tel' => $this->pbt->no_tel,
            'no_fax' => $this->pbt->no_fax,
        ])->save();

        $this->emit('saved');
    }
}
