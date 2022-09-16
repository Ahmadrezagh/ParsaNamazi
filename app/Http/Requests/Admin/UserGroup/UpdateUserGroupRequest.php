<?php

namespace App\Http\Requests\Admin\UserGroup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserGroupRequest extends FormRequest
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
            'name' => ['required'],
            'from' => ['nullable'],
            'to' => ['nullable'],
            'percentage' => ['required'],
            'priority' => ['required',Rule::unique('user_groups','priority')->ignore($this->priority,'priority')],
        ];
    }
}
