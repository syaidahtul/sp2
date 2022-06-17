<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class DeleteConfirmationModal extends Component
{

    public $modelType;
    public $modelKeyType;
    public $modelKey;
    public $child = [];

    protected $listeners = ['delete-confirmation-modal' => 'showModal'];

    public function showModal($modelType, $modelKeyType, $modelKey, $child)
    {
        info('DA');
        $this->modelType = $modelType;
        $this->modelKeyType = $modelKeyType;
        $this->modelKey = $modelKey;
        $this->child = $child;
    }

    /**
     * TODO: There must be more elegance way to do this.
     */
    public function destroy()
    {
        info('sini');
        try {
            $data = $this->modelType::where($this->modelKeyType, '=', $this->modelKey)->first();

            if(!empty($this->child)) {
                foreach($this->child as $orphaned) {
                    foreach($data->$orphaned as $cd) {
                        info($cd);
                        $cd->deleted_at = Carbon::now()->format('Y-m-d H:i:s');
                        $cd->deleted_by = Auth::user()->id;
                        $cd->save();
                    }
                }
            };

            $data->deleted_by = Auth::user()->id;
            $data->save();
            $data->delete();

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
