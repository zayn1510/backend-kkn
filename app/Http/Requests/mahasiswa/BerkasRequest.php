<?php

namespace App\Http\Requests\mahasiswa;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BerkasRequest extends FormRequest
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
            "foto"=>["string","max:255"],
            "surat_izin_atasan"=>["string","max:255"],
            "surat_izin_ortu"=>["string","max:255"],
            "sertifikat_vaksin"=>["string","max:255"],
            "krs_terakhir"=>["string","max:200"],
            "transkip_nilai"=>["string","max:200"],
            "slip_pembayaran"=>["string","max:200"]
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
