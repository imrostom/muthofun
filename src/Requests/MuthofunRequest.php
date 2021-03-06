<?php

namespace Imrostom\Muthofun\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MuthofunRequest extends FormRequest
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
            'name'    => ['required', 'string', 'max:60'],
            'subject' => ['required', 'string', 'max:60'],
            'mobile'  => ['required', 'string', 'max:20'],
            'message' => ['required', 'string', 'max:200'],
        ];
    }
}
