<?php

namespace App\Http\Requests;

use App\Models\Orders\OrderDto;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'phone' => ['required', 'string', 'min:5', 'max:15'],
            'message' => ['required', 'string', 'min:1', 'max:255'],
        ];
    }

    public function getDto(): OrderDto
    {
        return OrderDto::create($this->all());
    }
}
