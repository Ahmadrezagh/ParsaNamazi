<?php

namespace App\Http\Requests\Admin\CountDown;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountDownRequest extends FormRequest
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
            'description' => ['required'],
            'start_at' => ['required'],
            'expire_at' => ['required'],
            'user_groups' => ['required']
        ];
    }
}
