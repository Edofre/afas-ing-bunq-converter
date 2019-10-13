<?php

namespace App\Http\Requests;


/**
 * Class ProcessRequest
 * @package App\Http\Requests
 */
class ProcessRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        $rules = [
            'ing-file' => [
                'required',
                'file',
                'mimes:csv,txt',
            ],
        ];

        return $rules;
    }
}
