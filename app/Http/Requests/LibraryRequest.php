<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LibraryRequest extends FormRequest
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
            'nation' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'library' => 'required|string|max:255',
            'lat' => 'required|string|max:10',
            'lng' => 'required|string|max:10',
            'quantity' => 'required|string',
            'website' => 'required|active_url|max:255',
            'copyright' => 'required|string|max:255',
            'notes' => 'nullable|max:255',
            'iiif' => 'required|boolean',
            'is_free_cultural_works_license' => 'required|boolean',
            'has_post' => 'required|boolean',
            'post_url' => 'nullable|active_url',
            'library_name_slug' => ['required', 'max:255', Rule::unique('libraries')->ignore($this->route('id'))],
            'is_part_of_project_name' => 'nullable|max:255',
            'is_part_of' => 'nullable|max:255',
            'is_part_of_url' => 'nullable|active_url',
            'is_disabled' => 'required|boolean',
            'last_edited' => 'required|date_format:Y-m-d|after_or_equal:today',
        ];
    }
}
