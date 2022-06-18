<?php

namespace App\Http\Livewire\ProfailPbt;

use App\Models\Documents;
use App\Models\JenisJenteras;
use App\Models\Jentera as ModelsJentera;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Jentera extends Component
{
    use WithFileUploads;

    public $pbt;
    public $jenisjenteras;
    
    public ModelsJentera $editing;
    
    public $documents;

    public $showEditModal = false;

    public function rules() 
    {
        return [
            'documents' => 'nullable|sometimes|mimes:pdf,jpeg,jpg,png|max:2000'
        ]; 
    }

    public function mount($pbt)
    {
        $this->pbt = $pbt;
    }

    public function render()
    {
        $this->jenisjenteras = JenisJenteras::all();
        $jenteras = ModelsJentera::byPbt(Auth::user()->current_pbt)->get();
        return view('livewire.profail-pbt.jentera', ['jenteras' => $jenteras]);
    }

    public function create() 
    {
        $this->showEditModal = true;
    }

    public function save()
    {
        if($this->documents) {
            $filename = $this->documents->store('documents', 'public');
            $documents = new Documents([
                'document_name' => $this->documents->getClientOriginalName(),
                'document_path' => $filename,
                'document_remark' => 'Penyata bank',
            ]);
            $delete->documents()->save($documents);
        }
    }

}
