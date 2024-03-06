<?php

namespace App\Http\Requests\Seller;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class SellerApplyRequest extends FormRequest
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

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->shop_name),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => 'required|string',
            'shop_name' => 'required|string',
            'address'   => 'required|string',
            'email'     => 'required|email',
            'phone'     => 'required|string',
            'password'  => 'required|confirmed',
            'terms'     => 'required|in:on',
        ];
    }
}
