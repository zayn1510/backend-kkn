<?php

namespace App\Http\Requests\master;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class DplRequest extends FormRequest
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

        if($this->method()==="POST"){
           $data=[
                "nidn"=>["string","required","max:20","unique:tbl_dpl,nidn"],
                "nama_dosen"=>["string","required","max:50"],
                "email"=>["string","unique:tbl_dpl,email","max:50"],
                "gelar_depan"=>["string","max:10"],
                "gelar_belakang"=>["string","max:10"],
                "nomor_hp"=>["string","max:12"],
                "id_periode_kkn"=>["integer"]
            ];
        }else if($this->method()==="PUT"){
            $data=[
                "nidn"=>["string","required","max:20"],
                "nama_dosen"=>["string","required","max:50"],
                "email"=>["string"],
                "gelar_depan"=>["string","max:10"],
                "gelar_belakang"=>["string","max:10"],
                "nomor_hp"=>["string","max:12"],
                "id_periode_kkn"=>["integer"]
            ];
        }

        return $data;

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
