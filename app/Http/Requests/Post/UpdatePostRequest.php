<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $user = auth()->user();
        return [
            'id' => ['required', 'exists:App\Models\Post,id'],
            'title' => ['required', Rule::unique('posts')->where(function ($query) use ($user) {
                return $query->where('user_id', $user->id);
            })->ignore($this->id), 'min:5'],
            'content' => ['required', 'max:255']
        ];
    }
}
