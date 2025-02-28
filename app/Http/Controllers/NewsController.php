<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function featured()
    {
        $featuredNews = News::where('is_featured', true)->latest()->get();
        return NewsResource::collection($featuredNews);
    }
}
