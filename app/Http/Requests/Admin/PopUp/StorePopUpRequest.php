<?php

namespace App\Http\Requests\Admin\PopUp;

use Illuminate\Foundation\Http\FormRequest;

class StorePopUpRequest extends FormRequest
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
            'count_limit' => ['required'],
            'cash' => ['required'],
            'credit' => ['required'],
            'referral_cash' => ['required'],
            'referral_credit' => ['required'],
            'expire_after' => ['required']
        ];
    }
}
