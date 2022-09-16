<?php

namespace App\Http\Requests\Admin\ChestGifts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreChestGiftRequest extends FormRequest
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
            'type' => ['required'],
            'years' => ['required','numeric','min:0'],
            'months' => ['required','numeric','min:0','max:11'],
            'days' => ['required','numeric','min:0','max:29'],
            'percentage' => ['nullable','numeric','min:0','max:100'],
            'percentage_on' => ['nullable'],
            'user_group_id' => ['nullable',Rule::exists('user_groups','id')],
            'active' => ['required','numeric','min:0','max:1']
        ];
    }
}
