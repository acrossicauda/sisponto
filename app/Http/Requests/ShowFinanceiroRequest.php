<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowFinanceiroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'number',
            'titulo' => 'required|string|max:100',
            'descricao' => 'string|max:1000',
            'cor' => 'string|max:7',
            'pagamento_data' => 'required|date',
            'pagamento_hora' => 'string|max:191|min:1',
            'notification_data' => 'date',
            'notification_hora' => 'string|max:191|min:1',
            'status' => 'string',
            'recorrencia' => 'string',
        ];
    }

}
