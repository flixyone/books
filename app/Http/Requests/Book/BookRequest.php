<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'name' => ['required', 'string'],
			'description' => ['required', 'string'],
			'stock' => ['required', 'numeric'],
			'author_id' => ['required', 'exists:authors,id'],
			'category_id' => ['required', 'exists:categories,id'],
		];
	}

	public function messages()
	{
		return [
			'name.required' => 'El titulo es requerido.',
			'name.string' => 'El nombre debe de ser valido.',
			'description.required' => 'La descripcion es requerida.',
			'description.string' => 'La descripcion debe de ser valida.',
			'stock.required' => 'La cantidad es requerida.',
			'stock.numeric' => 'La cantidad debe de ser un numero valido.',
			'author_id.required' => 'El autor es requerido.',
			'author_id.exists' => 'El autor no existe.',
			'category_id.required' => 'La categoria es requerida.',
			'category_id.exists' => 'La categoria no existe.',
		];
	}
}
