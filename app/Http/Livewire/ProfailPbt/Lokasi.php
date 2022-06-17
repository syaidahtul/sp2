<?php

namespace App\Http\Livewire\ProfailPbt;

use App\Models\JenisKawasans as ModelJenisKawasans;
use App\Models\JenisOperasi as ModelsJenisOperasi;
use App\Models\Lokasi as ModelsLokasi;
use App\Models\Pbt;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Lokasi extends Component
{
    use WithPagination;

    public Pbt $pbt;
    public $namaLokasi;
    public $jenisOperasi;
    public $jenisOperasis;
    public $jenisKawasan;
    public $jenisKawasans;

    public $showEditModal = false;
    public ModelsLokasi $editing;

    public function rules()
    {
        return [
            'editing.nama_lokasi' => 'required',
            'editing.kod_pbt' => 'required',
            'editing.kod_jenis_operasi' => 'required',
            'editing.kod_jenis_kawasan' => 'required',
        ];
    }

    public function mount($pbt)
    {
        $this->jenisOperasis = ModelsJenisOperasi::active()->get();
        $this->jenisKawasans = ModelJenisKawasans::all();
        $this->pbt = $pbt;
        $this->editing = $this->makeBlankLokasi();
    }

    public function render()
    {
        sleep(1);
        
        $lokasis = ModelsLokasi::lokasiPbt($this->pbt->kod)
            ->when($this->namaLokasi, function($query) {
                $query->where('nama_lokasi', 'LIKE', '%'.$this->namaLokasi.'%');
                })
            ->when($this->jenisOperasi, function($query) {
                $query->where('kod_jenis_operasi', $this->jenisOperasi);
                })
            ->when($this->jenisKawasan, function($query) {
                $query->where('kod_jenis_kawasan', $this->jenisKawasan);
                })
            ->paginate(10);
        return view('livewire.profail-pbt.lokasi', [ 'lokasis' => $lokasis ] );
    }

    public function makeBlankLokasi()
    {
        return ModelsLokasi::make(['kod_pbt' => Auth::user()->current_pbt ]);
    }

    public function edit(ModelsLokasi $lokasi)
    {
        $this->editing = $lokasi;
        $this->showEditModal = true;
    }

    public function delete(ModelsLokasi $lokasi)
    {
        $this->editing = $lokasi;
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = $this->makeBlankLokasi();
        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->save();

        $this->showEditModal = false;
    }
}
