<?php

namespace App\Http\Livewire\ProfailPbt;

use App\Models\Documents;
use App\Models\JenisJenteras;
use App\Models\Jentera as ModelsJentera;
use App\Traits\WithBulkActions;
use App\Traits\WithCachedRows;
use App\Traits\WithPerPagePagination;
use App\Traits\WithSorting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class TabJentera extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows, WithFileUploads;

    public $showDeleteModal = false;
    public $showEditModal = false;
    public $showFilters = false;
    
    public $filters = [
        'search' => '',
        'status' => '',
        'no_pendaftaran' => '',
        'jenis_jentera' => '',
    ];

    public ModelsJentera $editing;

    protected $queryString = ['sorts'];

    protected $listeners = ['refreshJenteras' => '$refresh'];

    public function rules() { return [
        'editing.kod_pbt' => 'required',
        'editing.kod_jenis_jentera' => 'required',
        'editing.no_pendaftaran' => 'required|min:3',
        'editing.status' => 'required|in:'.collect(ModelsJentera::STATUSES)->keys()->implode(','),
        'editing.catatan' => 'nullable',
    ]; }

    public function mount() { $this->editing = $this->makeBlankTransaction(); }
    public function updatedFilters() { $this->resetPage(); }

    public function exportSelected()
    {
        return response()->streamDownload(function () {
            echo $this->selectedRowsQuery->toCsv();
        }, 'jenteras.csv');
    }

    public function deleteSelected()
    {
        $deleteCount = $this->selectedRowsQuery->count();

        $this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

        $this->notify($deleteCount.' jentera telah dipadam.');
    }

    public function makeBlankTransaction()
    {
        return ModelsJentera::make(['kod_pbt' => Auth::user()->current_pbt, 'status' => 'aktif']);
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = ! $this->showFilters;
    }

    public function create()
    {
        $this->useCachedRows();

        if ($this->editing->getKey()) $this->editing = $this->makeBlankTransaction();

        $this->showEditModal = true;
    }

    public function edit(ModelsJentera $transaction)
    {
        $this->useCachedRows();

        if ($this->editing->isNot($transaction)) $this->editing = $transaction;

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->save();

        $this->showEditModal = false;
    }

    public function resetFilters() { $this->reset('filters'); }

    public function getRowsQueryProperty()
    {
        $query = ModelsJentera::query()
            ->when($this->filters['status'], fn($query, $status) => $query->where('status', $status))
            ->when($this->filters['no_pendaftaran'], fn($query, $no_pendaftaran) => $query->where('nama', 'like', '%'.$no_pendaftaran.'%'))
            ->when($this->filters['jenis_jentera'], fn($query, $jenis_jentera) => $query->where('jenis_jentera', $jenis_jentera));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function render()
    {
        return view('livewire.profail-pbt.tab-jentera', ['jenteras' => $this->rows]);
    }

}
