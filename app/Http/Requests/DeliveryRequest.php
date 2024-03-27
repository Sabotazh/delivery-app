<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'delivery_service'   => ['required', 'string', 'min:3', 'max:255'], //NovaPoshta, Ukrposhta
            'sender'             => ['required', 'string', 'min:3', 'max:255'],
            'recipient'          => ['required', 'string', 'min:3', 'max:255'],
            'parcel_information' => ['required', 'string', 'min:3', 'max:255'],
            'attachment'         => ['sometimes', 'mimes:jpeg,png,jpg,pdf,xls,xlsx']
        ];
    }
}
