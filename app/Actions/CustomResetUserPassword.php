<?php

namespace App\Actions;

use App\Actions\Fortify\PasswordValidationRules;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomResetUserPassword
{
    use PasswordValidationRules;

    public function reset($user, array $input)
    {
        $user->forceFill([
            'password' => Hash::make($input['password']),
            'last_password_change' => Carbon::now()
        ])->save();
    }
}
