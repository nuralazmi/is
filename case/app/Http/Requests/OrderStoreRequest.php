<?php

namespace App\Http\Requests;

use App\Rules\OrderProductStockControl;
use App\Rules\OrderUniqueItems;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class OrderStoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'items' => ['required', 'array', new OrderUniqueItems()],
            'items.*.product_id' => ['bail', 'required', 'exists:products,id', new OrderProductStockControl()],
            'items.*.quantity' => 'bail|required|integer|min:1',
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
