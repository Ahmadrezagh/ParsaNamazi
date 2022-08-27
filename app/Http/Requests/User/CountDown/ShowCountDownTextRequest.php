<?php

namespace App\Http\Requests\User\CountDown;

use Illuminate\Foundation\Http\FormRequest;

class ShowCountDownTextRequest extends FormRequest
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
            'count_down_id' => ['required']
        ];
    }
}
