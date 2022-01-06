<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
    public function rules($roll_no)
    {
        return [
            'roll_no' => ['required', 'unique:students,roll_no,except,' . $roll_no],
            'name' => ['required', 'exists:students,name'],
            'dept' => ['required', 'exists:students,dept']
        ];
    }
}
