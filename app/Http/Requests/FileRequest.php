<?php

namespace portal\Http\Requests;

use portal\Http\Requests\Request;

use Illuminate\Http\Response;

class FileRequest extends Request
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
        'file' => 'max:2000|mimes:pdf|required'
        ];
    }

    public function messages()
    {
        return [
        'required' => 'O :attribute não pode ser vazio.',
        'size'    => 'O tamanho do :attribute deve ter no maxímo 2MB',
        ];
    }

}
