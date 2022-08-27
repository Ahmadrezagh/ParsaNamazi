<?php

namespace App\Http\Requests\User\Withdrawal;

use Illuminate\Foundation\Http\FormRequest;

class UserWithdrawalRequest extends FormRequest
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
        $user = auth()->user();
        return [
            'amount' => ['required','numeric','min:'.intval(setting('withdrawal_min')),'max:'.$user->cash],
            'wallet_address' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'amount.max' => 'Your cash is not enough',
            'amount.min' => 'Minimum amount for withdrawal is: $'.intval(setting('withdrawal_min')),
        ];
    }
}
