<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClubRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules(): array
    {
        $clubId = $this->route('club')->id ?? $this->club;
        return [
            'name'          => 'required|string|max:255',
            'type'          => 'required|string|max:100',
            'president_name'=> 'nullable|string|max:255',
            'members_count' => 'nullable|integer|min:0',
            'description'   => 'nullable|string|max:1000',
        ];
    }
}
