<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\AboutTeam;
use App\Http\Resources\About\AboutTeamResource;
use App\Models\AboutFirstSession;
use App\Http\Resources\About\AboutFirstSessionResource;
use App\Models\AboutSecondSession;
use App\Http\Resources\About\AboutSecondSessionResource;
use App\Models\AboutThirdSession;
use App\Http\Resources\About\AboutThirdSessionResource;

use App\Http\Resources\NewsResource;
use App\Models\News;

use App\Http\Resources\Product\ExpertOpinionResource;
use App\Models\ExpertOpinion;
use App\Http\Resources\Product\RecipeResource;
use App\Models\Recipe;
use App\Models\OurProducts;
use App\Http\Resources\Product\OurProductsResource;
use App\Http\Resources\Product\PartnerCreationsResource;
use App\Models\PartnerCreations;


use App\Http\Resources\Impact\InitialImpactResource;
use App\Models\InitialImpact;
use App\Http\Resources\Impact\OurStoryEventsResource;
use App\Models\OurStoryEvents;
use App\Http\Resources\Impact\OurStoryResource;
use App\Models\OurStory;
use App\Http\Resources\Impact\PartnerFarmersResource;
use App\Models\PartnerFarmers;

use App\Http\Resources\Home\SlideResource;
use App\Models\Slide;
use App\Http\Resources\Home\ProductResource;
use App\Models\Product;
use App\Http\Resources\Home\ProductFeatureResource;
use App\Models\ProductFeature;
use App\Models\Innovation;
use App\Http\Resources\Home\InnovationResource;
use App\Models\Award;
use App\Http\Resources\Home\AwardResource;

//Home

//Impact
Route::get('/impact/initial-impact', function () {
    return InitialImpactResource::collection(InitialImpact::all());
});

Route::get('/impact/our-story-events', function () {
    return OurStoryEventsResource::collection(OurStoryEvents::all());
});

Route::get('/impact/our-story', function () {
    return OurStoryResource::collection(OurStory::all());
});

Route::get('/impact/our-story-events', function () {
    return PartnerFarmersResource::collection(PartnerFarmers::all());
});



// Product
Route::get('/product/expert-opinion', function () {
    return ExpertOpinionResource::collection(ExpertOpinion::all());
});

Route::get('/product/recipe', function () {
    return RecipeResource::collection(Recipe::all());
});

Route::get('/product/our-products', function () {
    return OurProductsResource::collection(OurProducts::all());
});

Route::get('/product/partner-creations', function () {
    return PartnerCreationsResource::collection(PartnerCreations::all());
});


// Lista todas as notícias
Route::get('/news', function () {
    return NewsResource::collection(News::all());
});

// Exibe uma única notícia por ID
Route::get('/news/{id}', function ($id) {
    $news = News::findOrFail($id);
    return new NewsResource($news);
});

// About
Route::get('/about/about-team', function () {
    return AboutTeamResource::collection(AboutTeam::all());
});

Route::get('/about/about-first-session', function () {
    return AboutFirstSessionResource::collection(AboutFirstSession::all());
});

Route::get('/about/about-first-session', function () {
    return AboutSecondSessionResource::collection(AboutSecondSession::all());
});

Route::get('/about/about-first-session', function () {
    return AboutSecondSessionResource::collection(AboutSecondSession::all());
});

Route::get('/about/about-first-session', function () {
    return AboutThirdSessionResource::collection(AboutThirdSession::all());
});



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
