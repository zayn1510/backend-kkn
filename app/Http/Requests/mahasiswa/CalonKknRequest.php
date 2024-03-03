<?php

namespace App\Http\Requests\mahasiswa;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalonKknRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "id_mhs"=>["required","integer"],
            "kode_calon_kkn"=>["required","string","max:50"],
            "email"=>["required","string","max:50"],
            "nomor_hp"=>["required","string","max:12"],
            "ukuran_baju"=>["required","string","max:2"],
            "kabupaten"=>["string","max:30"],
            "kecamatan"=>["string","max:30"],
            "desa"=>["string","max:30"],
            "id_berkas_calon"=>["integer","max:11"],
            "tgl_daftar"=>["date"]
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
