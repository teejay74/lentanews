<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index() {
        return DB::table('news')
                ->orderBy('date_news', 'desc')
                ->get();
    }

    public function getFavoritesNews() {
        //Возвращаем избранные новости
        return DB::table('news')
                ->where('favorites', 1)
                ->orderBy('date_news', 'desc')
                ->get();
    }

    public function saveFavoritesStatus(Request $request) {
        $currentNews = News::all()->where('id',$request->id)->first();
        $currentNews->favorites = $request->favoritesStatus;
        try {
            $currentNews->save();
            return 'Saved successfully';
        } catch (Exception $e) {
            return $e;
        }
        //Возвращаем избранные новости
        //return News::all()->where('favorites', 1);
    }

    public function getNewsCard(Request $request) {
        $currentNews = News::all()->where('id', $request->id)->first();
        //Ищем похожые новости по значению tag кроме текущего id и добавляем в объект response
        $currentNews->related = $this->getRelatedNews($currentNews->id, $currentNews->tags);
        return $currentNews;
    }

    public function getRelatedNews($curId, $tag) {
        return  News::all()->where('tags', $tag)->except($curId);
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

    public function getRegionNews(Request $request) {
        //Ищем новости в текущем регионе и все новости
        return DB::table('news')
            ->where('region', '0')
            ->orWhere('region', $request->region)
            ->orderBy('date_news', 'desc')
            ->get();
        //return News::all()->whereIn('region', ['0', $request->region]);
    }
}
