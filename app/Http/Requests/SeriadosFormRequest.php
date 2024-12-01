<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriadosFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:3|max:255',
            'numero_temporadas' => 'required|integer|min:1',
            'episodio_por_temporada' => 'required|integer|min:1',
            'capa' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome pode ter no máximo 255 caracteres.',
            'numero_temporadas.required' => 'O número de temporadas é obrigatório.',
            'numero_temporadas.integer' => 'O número de temporadas deve ser um número inteiro.',
            'numero_temporadas.min' => 'O número de temporadas deve ser no mínimo 1.',
            'episodio_por_temporada.required' => 'O número de episódios por temporada é obrigatório.',
            'episodio_por_temporada.integer' => 'O número de episódios por temporada deve ser um número inteiro.',
            'episodio_por_temporada.min' => 'O número de episódios por temporada deve ser no mínimo 1.',
            'capa.image' => 'O arquivo enviado no campo capa deve ser uma imagem.',
            'capa.mimes' => 'O campo capa aceita apenas imagens nos formatos: jpeg, png, jpg, gif ou svg.',
            'capa.max' => 'O campo capa deve ter no máximo 2048 KB.',
        ];
    }
}
