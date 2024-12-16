<?php

namespace App\Http\Requests\Inbox;

use Illuminate\Foundation\Http\FormRequest;

use App\Enums\ContactReason;
use App\Enums\ContactSector;
use Illuminate\Validation\Rules\Enum;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sector' => ['required', new Enum(ContactSector::class)],
            'reason' => ['required', new Enum(ContactReason::class)],
            'message' => 'required|string',
        ];
    }
}
