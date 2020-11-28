<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IkanRequest extends FormRequest
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
            "ukuran_edit" => "required",
            "gender_edit" => "required",
            "breeder_edit" => "required",
            "nama_handling" => "required",
            "kota_handling" => "required",
            "nama_pemilik" => "required",
            "kota_pemilik" => "required"
        ];
    }
}
