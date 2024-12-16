<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inbox\SacRequest;
use App\Http\Resources\Inbox\SacResource;
use App\Models\Sac;
use Illuminate\Http\JsonResponse;

class SacController extends Controller
{
    public function store(SacRequest $request): JsonResponse
    {
        $sac = Sac::create($request->validated());

        return response()->json([
            'message' => 'SAC entry created successfully!',
            'data' => new SacResource($sac),
        ], 201);
    }
}
