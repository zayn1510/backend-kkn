<?php

namespace App\Http\Requests\akademik;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BeritaRequest extends FormRequest
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
            "id_berita" =>["integer"],
            "judul"     => ["required","string","max:100"],
            "thumbnail" => ["required","string","max:50"],
            "author"    => ["required","string","max:30"],
            "konten"    => ["required","string"],
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json(
            [
               "success" => false,
               "message" => "Validation Errors",
               "data"    => $validator->errors()
            ]
        ));
    }
}
