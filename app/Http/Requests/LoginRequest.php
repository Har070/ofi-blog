<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests
 */
class LoginRequest extends FormRequest
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
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ];
    }

    /**
     * @return \string[][]
     */
    public function message()
    {
        return [
            'email' => [
                'required'   => 'The email field is required.',
                'email'      => 'Email is not valid.'
            ],
            'password' => [
                'required' => 'The password field is required.',
                'min:6'    => 'The password may be minimum 6 characters. '
            ]
        ];
    }
}
