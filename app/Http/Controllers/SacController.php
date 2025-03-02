<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inbox\SacRequest;
use App\Http\Resources\Inbox\SacResource;
use App\Models\Sac;
use Illuminate\Http\JsonResponse;

class SacController extends Controller
{
    // Criação (store) - POST /sacs/store
    public function store(SacRequest $request): JsonResponse
    {
        $sac = Sac::create($request->validated());

        return response()->json([
            'message' => 'Parabéns! Sua solicitação ao SAC foi registrada com sucesso.',
            'description' => 'Os dados foram adicionados ao sistema de atendimento ao cliente.',
            'data' => new SacResource($sac),
        ], 201);
    }

    // Leitura (index) - GET /sacs
    public function index(): JsonResponse
    {
        $sacs = Sac::all();

        return response()->json([
            'message' => 'Ótimo! Estas são todas as solicitações ao SAC disponíveis.',
            'description' => 'A lista abaixo contém todas as solicitações registradas no sistema.',
            'data' => SacResource::collection($sacs),
        ]);
    }

    // Exibição específica (show) - GET /sacs/{sac}
    public function show(Sac $sac): JsonResponse
    {
        return response()->json([
            'message' => 'Aqui estão os detalhes da solicitação ao SAC solicitada.',
            'description' => 'Os dados abaixo correspondem à solicitação que você buscou.',
            'data' => new SacResource($sac),
        ]);
    }

    // Atualização (update) - PUT /sacs/{sac}
    public function update(SacRequest $request, Sac $sac): JsonResponse
    {
        $sac->update($request->validated());

        return response()->json([
            'message' => 'A solicitação ao SAC foi atualizada com sucesso!',
            'description' => 'As informações enviadas substituíram os dados antigos da solicitação.',
            'data' => new SacResource($sac),
        ]);
    }

    // Deleção (destroy) - DELETE /sacs/{sac}
    public function destroy(Sac $sac): JsonResponse
    {
        $sac->delete();

        return response()->json([
            'message' => 'A solicitação ao SAC foi deletada com sucesso!',
            'description' => 'A solicitação com ID ' . $sac->id . ' foi permanentemente removida do sistema.',
        ]);
    }
}
