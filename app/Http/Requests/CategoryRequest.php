<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->route()->named('admin.category.store')) {
            return [
                "name" => [
                    "required",
                    "string",
                    Rule::unique('categories', 'name')->whereNull('deleted_at'),
                    "max:255"
                ]
            ];
        } elseif ($this->route()->named('admin.category.update')) {
            return [
                "name" => [
                    "required",
                    "string",
                    Rule::unique('categories', 'name')->ignore($this->id)->whereNull('deleted_at'),
                    "max:255"
                ]
            ];
        }
    }

    protected function failedValidation(Validator $validator)
    {
        $response = redirect($this->getRedirectUrl())
            ->withInput() // Memastikan input yang sebelumnya dikirimkan dikembalikan
            ->withErrors($validator->errors(), $this->errorBag); // Menyimpan error ke dalam session
        if ($this->route()->named('admin.category.store')) {
            $response->with('error_store', true);
        } elseif ($this->route()->named('admin.category.update')) {
            $response->with('error_update', true)->with('category-edit-id', $this->id);
        }
        throw new ValidationException($validator, $response);
    }

}