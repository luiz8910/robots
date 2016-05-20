<?php

namespace Admin\Http\Requests;

use Admin\Http\Requests\Request;

class ClienteRequest extends Request
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
        //$rules = ["imagem" => "required|array|min:1"];

        //$img = $this->file("imagem")->getClientOriginalExtension();

        //if($img == "png" || $img == "jpeg" || $img == "jpg")
        //{

        //}

        return [
            "nome" => "required",
            "site" => "required",
            "imagem" => "required|image"
        ];
    }
}
