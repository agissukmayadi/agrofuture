<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'email' => strtolower($this->email),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->route()->named('admin.user.update')) {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->id],
                'role' => ['required', 'in:admin,customer'],
            ];
            if ($this->password !== null) {
                $rules["password"] = ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()->mixedCase()];
                $rules["password_confirmation"] = ['required'];
            }
            return $rules;
        }
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()->mixedCase()],
            'password_confirmation' => ['required'],
            'role' => ['required', 'in:admin,customer'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = redirect($this->getRedirectUrl())
            ->withInput() // Memastikan input yang sebelumnya dikirimkan dikembalikan
            ->withErrors($validator->errors(), $this->errorBag); // Menyimpan error ke dalam session

        if ($this->route()->named('admin.user.store')) {
            $response->with('error_store', true);
        } elseif ($this->route()->named('admin.user.update')) {
            $response->with('error_update', true)->with('user-edit-id', $this->id);
        }
        throw new ValidationException($validator, $response);
    }
}