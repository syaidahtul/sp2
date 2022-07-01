<?php

namespace App\Http\Livewire\Operasi;

use App\Models\JenisOperasi as ModelsJenisOperasi;
use App\Models\OperasiPbt;
use App\Models\Pbt;
use App\Traits\WithBulkActions;
use App\Traits\WithCachedRows;
use App\Traits\WithPerPagePagination;
use App\Traits\WithSorting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JadualOperasi extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;
    
    public $pbts;
    public $upload;

    public $filters = [
        'kod_pbt' => '',
        'lokasi_id'  => '',
        'jenis_operasi' => '',
        'bulan' => null,
        'status' => '',
        'peratus_kemajuan' => '',
        'catatan' => ''
    ];

    public function rules() {
        return [

        ];
    }

    public function mount()
    {
        $this->pbts = Pbt::notKktp()->get();
        $this->filters['jenis_operasi'] = "RUMPUT";
        $this->filters['bulan'] = Carbon::parse()->format('m-Y');
    }

    public function render()
    {

        info('-----');
        info($this->rows);
        info('-----');
        return view('livewire.operasi.jadual-operasi', [
            'rows' => $this->rows,
        ]);
    }

    public function save()
    {
        $this->emit('saved');
    }

    public function updatedFilters() { 
        info($this->filters['bulan']);
        $this->resetPage(); 
    }
    public function resetFilters() { 
        $this->reset('filters'); 
    }

    public function getRowsQueryProperty()
    {
        info($this->filters['bulan']);
        $dateMonthArray = explode('-', $this->filters['bulan']);
        
        $month = $dateMonthArray[0];
        $year = $dateMonthArray[1];

        $start = Carbon::createFromDate($year, $month)->startOfMonth();;
        $end = Carbon::createFromDate($year, $month)->endOfMonth();
        

        $kod_pbt = Auth::user()->current_pbt;
        if (Auth::user()->current_pbt === 'KKTP') {
            $kod_pbt = $this->filters['kod_pbt'];
        }

        info($this->filters['jenis_operasi']);

        $query = OperasiPbt::query()
            ->rightjoin('lokasis', function ($join) {
                $join->on('lokasis.id', '=', 'operasi_pbts.lokasi_id');
            })
            ->when($this->filters['kod_pbt'], fn($query, $kod_pbt) => $query->where('operasi_pbts.kod_pbt', $kod_pbt))
            ->when($this->filters['bulan'], fn($query) => $query->whereBetween('tarikh_operasi_mula', [$start, $end]))
            ->when($this->filters['jenis_operasi'], fn($query, $jenis_operasi) => $query->where('jenis_operasi', $jenis_operasi));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }
}
