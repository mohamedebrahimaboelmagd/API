<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;


class MessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        if($this->is('api/*'))
        {
            $response = ApiResponse::success(422,'Ooops somthing wrong', $validator->messages()->all());
            throw new ValidationException($validator, $response);
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|string'
        ];
    }
}
