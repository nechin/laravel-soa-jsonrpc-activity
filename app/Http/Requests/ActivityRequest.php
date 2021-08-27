<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
            'landing_id' => 'required|numeric',
            'url' => 'sometimes|required|string|url',
            'visit_date' => 'sometimes|required|date',
            'page' => 'sometimes|required|numeric',
        ];
    }
}
