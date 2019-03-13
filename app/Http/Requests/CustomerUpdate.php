<?php

namespace App\Http\Requests;

use App\Rules\Lowercase;
use App\Rules\Repetitions;
use App\Rules\Sequences;
use App\Rules\SpecialCharacters;
use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdate extends FormRequest
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
            'password'=> [ 
                'required',
                'confirmed',
                'min:8', 
                'max:30', 
                new Lowercase, 
                new Repetitions, 
                new Sequences, 
                new SpecialCharacters,
                new Uppercase
            ],
        ];
    }
}
