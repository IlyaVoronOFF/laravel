<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $news;
    protected array $categories;

    protected function getNews()
    {
        $faker = Factory::create('ru_RU');

        for ($i = 0; $i < 5; $i++) {
            $j = $i + 1;
            $this->news[] = [
                'id_category' => $j,
                'title' => "Новость " . $j,
                'description' => $faker->text(100)
            ];
        }
        return $this->news;
    }

    protected function getNewsCategory(int $id)
    {
        $arr = $this->getNews();
        $categoryNews = [];
        foreach ($arr as $v) {
            if ($v['id_category'] == $id) {
                $categoryNews[] = $v;
            }
        }
        return $categoryNews;
    }

    protected function getCategories()
    {

        for ($i = 0; $i < 5; $i++) {
            $j = $i + 1;
            $this->categories[] = [
                'title' => "Категория " . $j,
            ];
        }
        return $this->categories;
    }
}