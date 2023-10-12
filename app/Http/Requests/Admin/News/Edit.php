<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class Edit extends FormRequest
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
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => ['required', 'string', 'min:3', 'max:150'],
            // 'category_id' => ['required', 'integer', "exist: {$tableNameCategory},id"],
            'author' => ['required', 'string', 'min:2', 'max:100'],
            // 'status' => ['required', 'string', 'min:2', 'max:100'],
            'description' => ['nullable', 'string'],
        ];
    }
    public function attributes(): array {
        return [
            'title' => 'заголовок',
            'author' => 'автор',
            'description' => 'описание',
        ];
    }
}
