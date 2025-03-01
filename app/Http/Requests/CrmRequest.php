<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrmRequest extends FormRequest
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
            'uhid' => 'required',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:Male,Female',
            'phone_number' => 'required|string|min:8|max:15|',
            'alternate_phone' => 'required|string|min:8|max:15',
            'division' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'thana' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'department_id' => 'required',
            'agent' => 'required|string|max:255',
        ];
    }
}
