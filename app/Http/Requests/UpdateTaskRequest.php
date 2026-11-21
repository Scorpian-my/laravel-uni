<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'origin' => ['nullable', 'string', 'max:255'],
            'destination' => ['nullable', 'string', 'max:255'],
            'departure_at' => ['nullable', 'date'],
            'arrival_at' => ['nullable', 'date', 'after_or_equal:departure_at'],
            'flight_number' => ['nullable', 'string', 'max:50'],
            'price' => ['sometimes', 'numeric', 'min:0'],
            'stock' => ['sometimes', 'integer', 'min:0'],
            'image' => ['nullable', 'string', 'max:2048'],
            'description' => ['nullable', 'string'],
            'category_id' => [
                'sometimes',
                'required',
                Rule::exists('categories', 'id')->where('user_id', $this->user()->id),
            ],
            'is_done' => ['sometimes', 'boolean'],
        ];
    }
}
