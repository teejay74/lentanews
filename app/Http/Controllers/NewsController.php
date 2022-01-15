<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;

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

    public function searchNews(Request $request) {
        $error = ['error' => 'No results found.'];

        // Удостоверимся, что поисковая строка есть
        if($request->has('q')) {
            $validator = Validator::make($request->all(), [
                'q' => 'required'
            ]);
            if($validator->fails()) {
                return $validator->errors();
            }
            // Используем синтаксис Laravel Scout для поиска по таблице products.
            $news = News::search($request->get('q'))->get();

            // Если есть результат есть, вернем его, если нет  - вернем сообщение об ошибке.
            return $news->count() ? $news : $error;

        }

        // Вернем сообщение об ошибке, если нет поискового запроса
        return $error;
    }
}
