<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inbox\ContactRequest;
use App\Http\Resources\Inbox\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function store(ContactRequest $request): JsonResponse
    {
        $contact = Contact::create($request->validated());

        return response()->json([
            'message' => 'Contact created successfully!',
            'data' => new ContactResource($contact),
        ], 201);
    }
}
