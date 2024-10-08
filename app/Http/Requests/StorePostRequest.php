<?php

namespace App\Http\Requests;

use App\Rules\TitleNoPost;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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

    public function rules(): array
    {

        return [
            'title' => ['required','unique:posts','min:3',  new TitleNoPost(),],
           'description' => 'required|min:10',
           'user_id' => 'required',
           'image' => 'image|mimes:jpeg,png,jpg'
        ];
    }
}
