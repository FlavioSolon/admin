<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\AboutTeam;
use App\Http\Resources\About\AboutTeamResource;


// About
Route::get('/about/about-team', function () {
    return AboutTeamResource::collection(AboutTeam::all());
});




Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
