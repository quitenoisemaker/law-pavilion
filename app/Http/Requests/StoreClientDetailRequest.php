<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientDetailRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'firstname' => 'required',
            'lastname' => 'required',
            'profile_image' => 'nullable|mimes:jpeg,png,jpg',
            'email' => 'required|string|email|max:255|unique:client_details',
            'date_of_birth' => 'required|date',
            'case_detail' => 'required',
            'primary_legal_counsel' => 'required'
        ];
    }
}
