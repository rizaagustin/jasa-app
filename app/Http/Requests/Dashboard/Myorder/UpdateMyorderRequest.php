<?php

namespace App\Http\Requests\Dashboard\Myorder;

use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMyorderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'buyer_id' => [
                'nullable', 'integer',
            ],
            'freelacer_id' => [
                'nullable', 'integer',
            ],
            'file' => [
                'required', 'mimes:zip', 'max:1024',
            ],
            'note' => [
                'required', 'string', 'max:1000',
            ],
            'expired' => [
                'nullable', 'date',
            ],
            'order_status_id' => [
                'nullable', 'integer'
            ],
        ];
    }
}
