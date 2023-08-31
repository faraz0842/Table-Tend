<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMailRequest extends FormRequest
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
            'mail_host' => 'required',
            'mail_username' => 'required',
            'mail_port' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_transport' => 'required',
            'mail_from' => 'required',
        ];
    }
}
