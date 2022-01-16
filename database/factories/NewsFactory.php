<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $textNews = $this->faker->text(500);

        return [
            'title' => $this->faker->text(10),
            'poster' => "/assets/images/image-news.jpg",
            'description' => mb_substr($textNews, 0, 50),
            'text_news' => $textNews,
            'date_news' => date('d-m-Y H:i'),
            'region' => function () {
                $regions = array('0', '74', '99');
                $index = array_rand($regions, 1);
                return $regions[$index];
            },
            'tags' => function () {
                $tags = array('it', 'politics', 'weather', 'sport');
                $index = array_rand($tags, 1);
                return $tags[$index];
            },
            'favorites' => true,
        ];
    }
}

