<?php

namespace App\Http\Requests\Auth;

use App\Repositories\UserRepository;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LoginRequest extends FormRequest
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
            'password' => 'required',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    $user_repository = app(UserRepository::class);
                    $user = $user_repository->getByEmail($this->input('email'));
                    if (!$user || !Hash::check($this->input('password'), $user->password))
                        $fail(trans('response.login_failed'));
                },
            ],
        ];
    }

    /**
     * @param Validator|\Illuminate\Contracts\Validation\Validator $validator
     * @return mixed
     */
    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator): mixed
    {
        throw new HttpResponseException(response()->json([
            'message' => trans('response.validation_error'),
            'errors' => $validator->errors()->first(),
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }


}
