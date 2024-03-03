<?php

namespace App\Http\Requests\akademik;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class PeriodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()

    {
        return [
            'tahun_akademik' => ["required","string","max:10"],
            "angkatan"=>["required","string","max:10"],
            "status"=>["required",Rule::in([0,1])],
            "tgl_akademik"=>["required"]
        ];
    }



    public function failedValidation(Validator $validator)

    {
        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));

    }
}


