<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'files'  => 'required|max:50240|mimes:jpeg,png,pdf,doc,docx,mp4,mov',
            'categories' => 'required|exists:categories,id',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errorString = implode(",",$validator->messages()->all());
        //write your bussiness logic here otherwise it will give same old JSON response
        throw new HttpResponseException(response()->json(['success' => false, 'message' => $errorString], 200));
    }
}
