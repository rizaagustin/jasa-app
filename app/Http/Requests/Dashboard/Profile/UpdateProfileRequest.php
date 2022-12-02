<?php

namespace App\Http\Requests\Dashboard\Profile;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
// use Facade\Auth;
class UpdateProfileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
            ],
            'email' => [
                'required', 'string', 'max:255','email', Rule::unique('users')->where('id','<>',Auth::user()->id),
            ],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // harus true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

}
