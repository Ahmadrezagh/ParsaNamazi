<?php

namespace App\Http\Requests\Admin\Chests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChestRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'required_online_days' => ['required'],
            'active' => ['required'],
            'gifts' => ['required']
        ];
    }
}
