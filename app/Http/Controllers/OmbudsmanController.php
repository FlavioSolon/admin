<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inbox\OmbudsmanRequest;
use App\Http\Resources\Inbox\OmbudsmanResource;
use App\Models\Ombudsman;
use Illuminate\Http\JsonResponse;

class OmbudsmanController extends Controller
{
    // Criação (store) - POST /ombudsmen/store
    public function store(OmbudsmanRequest $request): JsonResponse
    {
        $ombudsman = Ombudsman::create($request->validated());

        return response()->json([
            'message' => 'Parabéns! Sua solicitação à ouvidoria foi registrada com sucesso.',
            'description' => 'Os dados foram adicionados ao sistema de ouvidoria.',
            'data' => new OmbudsmanResource($ombudsman),
        ], 201);
    }

    // Leitura (index) - GET /ombudsmen
    public function index(): JsonResponse
    {
        $ombudsmen = Ombudsman::all();

        return response()->json([
            'message' => 'Ótimo! Estas são todas as solicitações à ouvidoria disponíveis.',
            'description' => 'A lista abaixo contém todas as solicitações registradas no sistema.',
            'data' => OmbudsmanResource::collection($ombudsmen),
        ]);
    }

    // Exibição específica (show) - GET /ombudsmen/{ombudsman}
    public function show(Ombudsman $ombudsman): JsonResponse
    {
        return response()->json([
            'message' => 'Aqui estão os detalhes da solicitação à ouvidoria solicitada.',
            'description' => 'Os dados abaixo correspondem à solicitação que você buscou.',
            'data' => new OmbudsmanResource($ombudsman),
        ]);
    }

    // Atualização (update) - PUT /ombudsmen/{ombudsman}
    public function update(OmbudsmanRequest $request, Ombudsman $ombudsman): JsonResponse
    {
        $ombudsman->update($request->validated());

        return response()->json([
            'message' => 'A solicitação à ouvidoria foi atualizada com sucesso!',
            'description' => 'As informações enviadas substituíram os dados antigos da solicitação.',
            'data' => new OmbudsmanResource($ombudsman),
        ]);
    }

    // Deleção (destroy) - DELETE /ombudsmen/{ombudsman}
    public function destroy(Ombudsman $ombudsman): JsonResponse
    {
        $ombudsman->delete();

        return response()->json([
            'message' => 'A solicitação à ouvidoria foi deletada com sucesso!',
            'description' => 'A solicitação com ID ' . $ombudsman->id . ' foi permanentemente removida do sistema.',
        ]);
    }
}
