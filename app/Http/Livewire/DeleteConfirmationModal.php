<?php

namespace App\Http\Livewire;

use App\Models\Pbt;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class DeleteConfirmationModal extends Component
{

    public $data;
    public $dataForUser;
    public $modelType;
    public $modelKeyType;
    public $modelKey;
    public $confirmationmodal = false;
    public $child = [];

    protected $listeners = ['delete-confirmation-modal' => 'showModal'];

    public function showModal($modelType, $modelKeyType, $modelKey, $child, $modelForUser)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->confirmationmodal = true;
        $this->modelType = $modelType;
        $this->modelKeyType = $modelKeyType;
        $this->modelKey = $modelKey;
        $this->child = $child;
        $this->dataForUser = $modelForUser;

    }

    /**
     * TODO: There must be more elegance way to do this.
     */
    public function destroyRecord()
    {
        try {
            
            $this->data = $this->modelType::where($this->modelKeyType, '=', $this->modelKey)->first();
            info($this->data);

            if(!empty($this->child)) {
                foreach($this->child as $orphaned) {
                    foreach($this->data->$orphaned as $child) {
                        $child->deleted_at = Carbon::now()->format('Y-m-d H:i:s');
                        $child->deleted_by = Auth::user()->id;
                        $child->save();
                    }
                }
            };
            
            $this->data->deleted_at = Carbon::now()->format('Y-m-d H:i:s');
            $this->data->deleted_by = Auth::user()->id;
            $this->data->save();

            $this->dispatchBrowserEvent('closeDeleteModal');
            return redirect(request()->header('Referer'))->with('successMsg', 'Rekod telah dipadam.');
        } catch (Exception $e) {
            Log::error($e);
            $this->dispatchBrowserEvent('closeDeleteModal');
            return redirect(request()->header('Referer'))->with('errorMsg', 'Record used somewhere else. Please contact system admin.');
        }
    }

    public function render()
    {
        return view('livewire.delete-confirmation-modal');
    }
}
