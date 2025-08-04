<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMembershipRequest extends FormRequest
{    
    public function authorize()
    {
        return true;
    }    
    public function rules(): array
    {
        return [
            'club_id' => 'required|exists:clubs,id',
            'student_id' => 'required|exists:students,id',
        ];
    }
}
