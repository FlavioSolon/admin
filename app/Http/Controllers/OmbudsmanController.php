<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inbox\OmbudsmanRequest;
use App\Http\Resources\Inbox\OmbudsmanResource;
use App\Models\Ombudsman;
use Illuminate\Http\JsonResponse;

class OmbudsmanController extends Controller
{
    public function store(OmbudsmanRequest $request): JsonResponse
    {
        $ombudsman = Ombudsman::create($request->validated());

        return response()->json([
            'message' => 'Ombudsman entry created successfully!',
            'data' => new OmbudsmanResource($ombudsman),
        ], 201);
    }
}
