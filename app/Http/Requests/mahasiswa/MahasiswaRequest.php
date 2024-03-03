<?php

namespace App\Http\Requests\mahasiswa;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class MahasiswaRequest extends FormRequest
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
            "nim_mhs"=>["required","string","max:12"],
            "nama_mhs"=>["required","string","max:50"],
            "tempat_lahir_mhs"=>["required","string","max:30"],
            "tgl_lahir_mhs"=>["required","date"],
            "angkatan_mhs"=>["required","string","max:6"],
            "foto_mhs"=>["required","string","max:255"],
            "id_fakultas"=>["required","integer","max:11"],
            "id_jurusan"=>["required","integer","max:11"]
        ];
    }




    /**
     * Summary of failedValidation
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     * @return never
     */
    public function failedValidation(Validator $validator)

    {
        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));

    }
}
