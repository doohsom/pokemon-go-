<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePokemonRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'identifier' => 'required|string',
            'species_id' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'base_experience' => 'required|numeric',
            'order' => 'required|numeric',
            'is_default' => 'required'
        ];
    }
}
