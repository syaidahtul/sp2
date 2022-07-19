<?php

namespace App\Http\Livewire\ProfailPbt;

use App\Models\JenisKawasans as ModelJenisKawasans;
use App\Models\JenisOperasi as ModelsJenisOperasi;
use App\Models\Lokasi as ModelsLokasi;
use App\Models\Pbt;
use App\Services\JenisOperasiService;
use App\Traits\WithCachedRows;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TabLokasi extends Component
{
    use WithPagination, WithCachedRows;

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
            'editing.kod_jenis_kawasan' => 'nullable',
        ];
    }

    public function mount($pbt)
    {
        $this->pbt = $pbt;
        $this->jenisOperasis = (new JenisOperasiService)->getDropdown();
        $this->jenisKawasans = ModelJenisKawasans::all();
        $this->editing = $this->makeBlankLokasi();
    }

    public function render()
    {
        $lokasis = ModelsLokasi::lokasiPbt($this->pbt->kod)
            ->with('jenisOperasi')
            ->when($this->namaLokasi, function($query) {
                    $query->where('nama_lokasi', 'LIKE', '%'.$this->namaLokasi.'%');
                })
            ->when($this->jenisOperasi, function($query) {
                    $query->where('kod_jenis_operasi', $this->jenisOperasi);
                })
            ->when($this->jenisKawasan, function($query) {
                    $query->where('kod_jenis_kawasan', $this->jenisKawasan);
                })
            ->paginate(15);

        return view('livewire.profail-pbt.tab-lokasi', [ 'lokasis' => $lokasis ] );
    }

    public function makeBlankLokasi()
    {
        return ModelsLokasi::make(['kod_pbt' => Auth::user()->current_pbt ]);
    }

    public function resetFilters()
    {
    
    }

    public function edit(ModelsLokasi $lokasi)
    {
        $this->editing = $lokasi;

        $this->useCachedRows();

        $this->showEditModal = true;
    }

    public function delete(ModelsLokasi $lokasi)
    {
        $this->editing = $lokasi;
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->useCachedRows();
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
