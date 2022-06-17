<?php

namespace App\Http\Livewire\UserManagement;

use App\Models\Pbt;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CustomUpdateUser extends Component
{
    public User $user;
    public $name, $identity_no, $email, $current_pbt, $role;

    public function mount($user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->identity_no = $user->identity_no;
        $this->current_pbt = $user->current_pbt;
        $this->role = $user->roles->first()->id;
    }

    public function updateProfileInformation()
    {
       $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'identity_no' => ['required', 'numeric', 'digits:12', Rule::unique('users')->ignore($this->user->id)],
            'current_pbt' => ['required'],
            'role' =>  ['required'],
        ]);

        $this->user->forceFill([
            'name' => $this->name,
            'email' => $this->email,
            'identity_no' => $this->identity_no,
            'current_pbt' => $this->current_pbt
        ])->save();

        $this->user->assignRole($this->role);

        $this->emit('saved');
    }

    public function render()
    {
        $roles = Roles::all();
        $pbts = Pbt::all();
        return view('livewire.user-management.custom-update-user', ['pbts' => $pbts, 'roles' => $roles]);
    }
}
