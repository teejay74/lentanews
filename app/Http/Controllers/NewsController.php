<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index() {
        return News::all();
    }

    public function getFavoritesNews() {
        return News::all()->where('favorites', 1);
    }

    public function getNewsCard(Request $request) {
        return News::all()->where('id', $request->id)->first();
    }
}
