<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; 

class StoreAssuranceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nom' => 'required|string|max:55',
            'description' => 'required|string|max:55',
            'image' => 'required|string|max:55',
            'taux' => 'required|integer'
        ];
    }
}