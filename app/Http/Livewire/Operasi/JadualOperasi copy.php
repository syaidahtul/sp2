<?php

namespace App\Http\Livewire\Operasi;

use App\Models\JenisKawasans as ModelJenisKawasans;
use App\Models\JenisOperasi as ModelsJenisOperasi;
use App\Models\Lokasi as ModelsLokasi;
use App\Models\OperasiPbt;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class JadualOperasi extends Component
{

    public $generateNewModal = false;
    public $bulanBaru;
    public $jenisOperasiBaru;
    
    public $month;
    public $namaLokasi;
    public $jenisOperasi;
    public $jenisOperasis;
    public $jenisKawasan;
    public $jenisKawasans;

    public function mount()
    {
        $this->jenisOperasi='RUMPUT';
        $this->jenisOperasis = ModelsJenisOperasi::aktif()->get();
        $this->jenisKawasans = ModelJenisKawasans::all();
    }

    public function render()
    {
        if (empty($this->month))
        {
            $this->month = Carbon::now();
        }

        $operasis = OperasiPbt::rightjoin('lokasis', function ($join)  {
                $join->on('lokasis.id', '=', 'operasi_pbts.lokasi_id')
                ->where('lokasis.kod_pbt', '=', Auth::user()->current_pbt );
            })
            ->when($this->namaLokasi, function($query) {
                $query->where('nama_lokasi', 'LIKE', '%'.$this->namaLokasi.'%');
                })
            ->when($this->jenisOperasi, function($query) {
                    $query->where('kod_jenis_operasi', $this->jenisOperasi);
                }, 
                function ($query) {
                    $query->where('kod_jenis_operasi', 'SAMPAH');
                })
            ->when($this->jenisKawasan, function($query) {
                $query->where('kod_jenis_kawasan', $this->jenisKawasan);
                })
            ->paginate(10);
        return view('livewire.operasi.jadual-operasi', [ 'operasis' => $operasis]);
    }

    public function create()
    {
        $this->generateNewModal = true;
    }

    public function janaTemplateLaporan()
    {
        $parseBulan = Carbon::parse($this->bulanBaru);
        try {
            DB::statement(
                "insert into operasi_pbts (kod_pbt, lokasi_id, jenis_operasi, tarikh_laporan) select :pbt, id, :operasi, :bulan from lokasis where lokasis.kod_pbt = :pbtkod and lokasis.kod_jenis_operasi = :jenoperasi", 
                array('pbt' => Auth::user()->current_pbt, 'operasi' => $this->jenisOperasiBaru, 'bulan' => $parseBulan, 'pbtkod' => Auth::user()->current_pbt, 'jenoperasi' => $this->jenisOperasiBaru ) );
        } catch (Exception $e) {
            dd($e);
        }
        $this->generateNewModal = false;
    }

    public function edit(OperasiPbt $operasi)
    {

    }
}
