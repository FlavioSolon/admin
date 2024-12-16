<?php

namespace App\Http\Requests\Inbox;

use App\Enums\OmbudsmanChannel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class OmbudsmanRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'channel' => ['required', new Enum(OmbudsmanChannel::class)],
            'message' => 'required|string',
        ];
    }
}
