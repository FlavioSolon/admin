<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inbox\ContactRequest;
use App\Http\Resources\Inbox\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Criação (store) - POST /contacts
    public function store(ContactRequest $request): JsonResponse
    {
        // Criação do contato
        $contact = Contact::create($request->validated());

        return response()->json([
            'message' => 'Parabéns! Você criou um novo contato com sucesso.',
            'description' => 'Os dados do contato foram adicionados à base de dados.',
            'data' => new ContactResource($contact), // Retorna o contato criado
        ], 201);
    }

    // Leitura (index) - GET /contacts
    public function index(): JsonResponse
    {
        // Busca todos os contatos
        $contacts = Contact::all();

        return response()->json([
            'message' => 'Ótimo! Estes são todos os contatos disponíveis.',
            'description' => 'Os dados abaixo representam a lista completa de contatos cadastrados no sistema.',
            'data' => ContactResource::collection($contacts), // Retorna todos os contatos em formato de recurso (collection)
        ]);
    }

    // Exibição específica (show) - GET /contacts/{contact}
    public function show(Contact $contact): JsonResponse
    {
        return response()->json([
            'message' => 'Aqui estão os detalhes do contato solicitado.',
            'description' => 'Os dados abaixo correspondem ao contato que você buscou.',
            'data' => new ContactResource($contact), // Retorna o contato solicitado
        ]);
    }

    // Atualização (update) - PUT /contacts/{contact}
    public function update(ContactRequest $request, Contact $contact): JsonResponse
    {
        // Atualização do contato
        $contact->update($request->validated());

        return response()->json([
            'message' => 'O contato foi atualizado com sucesso!',
            'description' => 'As informações enviadas substituíram os dados antigos do contato.',
            'data' => new ContactResource($contact), // Retorna o contato atualizado
        ]);
    }

    // Deleção (destroy) - DELETE /contacts/{contact}
    public function destroy(Contact $contact): JsonResponse
    {
        // Deletando o contato
        $contact->delete();

        return response()->json([
            'message' => 'O contato foi deletado com sucesso!',
            'description' => 'O contato com ID ' . $contact->id . ' foi permanentemente removido do sistema.',
        ]);
    }
}
