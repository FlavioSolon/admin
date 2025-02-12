<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inbox\ContactRequest;
use App\Http\Resources\Inbox\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Criação (store)
    public function store(ContactRequest $request): JsonResponse
    {
        $contact = Contact::create($request->validated());

        return response()->json([
            'message' => 'Contact created successfully!',
            'data' => new ContactResource($contact),
        ], 201);
    }

    // Leitura (index)
    public function index(): JsonResponse
    {
        $contacts = Contact::all();

        return response()->json([
            'message' => 'Contacts retrieved successfully!',
            'data' => ContactResource::collection($contacts),
        ]);
    }

    // Exibição específica (show)
    public function show(Contact $contact): JsonResponse
    {
        return response()->json([
            'message' => 'Contact retrieved successfully!',
            'data' => new ContactResource($contact),
        ]);
    }

    // Atualização (update)
    public function update(ContactRequest $request, Contact $contact): JsonResponse
    {
        $contact->update($request->validated());

        return response()->json([
            'message' => 'Contact updated successfully!',
            'data' => new ContactResource($contact),
        ]);
    }

    // Deleção (destroy)
    public function destroy(Contact $contact): JsonResponse
    {
        $contact->delete();

        return response()->json([
            'message' => 'Contact deleted successfully!',
        ]);
    }
}
