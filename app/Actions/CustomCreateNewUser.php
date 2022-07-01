<?php

namespace App\Actions;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CustomCreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {        
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'identity_no' => ['required', 'min:12', 'max:14', 'unique:users'],
            'password' => $this->passwordRules(),
            'current_pbt' => ['required'],
            'role' =>  ['required'],
        ], [], 
        [
            'name' => 'Nama Pengguna',
            'email' => 'Alamat Email',
            'identity_no' => 'No Kad Pengenalan',
            'password' => 'Kata Laluan',
            'current_pbt' => 'Kementerian/PBT',
            'role' => 'Peranan',
        ])->validate();

        DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'identity_no' => $input['identity_no'],
                'password' => Hash::make($input['password']),
                'current_pbt' => $input['current_pbt'],
            ])->assignRole( $input['role'])
            );
        });

        return redirect(route('usermgmt.user.index'));
    }
}
