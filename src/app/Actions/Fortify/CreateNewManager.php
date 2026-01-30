<?php

namespace App\Actions\Fortify;

use App\Models\Manager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewManagers;

class CreateNewUser implements CreatesNewManagers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Manager::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return Manager::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
