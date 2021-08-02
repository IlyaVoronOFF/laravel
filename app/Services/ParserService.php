<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ParserContract;
use Database\Seeders\NewsSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements ParserContract
{
   public function getParsedList(string $url): array
   {
      $xml = XmlParser::load($url);
      $data = $xml->parse([
         'title' => [
            'uses' => 'channel.item.title'
         ],
         'description' => [
            'uses' => 'channel.item.description'
         ],
         'created_at' => [
            'uses' => 'channel.item.pubDate'
         ]
      ]);

      return $data;
   }

   //в файлы
   public function saveNewsInFile(string $url): void
   {
      $parsedList = $this->getParsedList($url);
      $serialize  = json_encode($parsedList);
      $explode = explode("/", $url);
      $fileName = end($explode);

      Storage::append('/news/' . $fileName, $serialize);
   }

   public function saveNewsInBase(string $url): void
   {
      $parsedList = $this->getParsedList($url);

      DB::table('news')->insert([
         'title' => $parsedList['title'],
         'description' => $parsedList['description'],
         'created_at' => $parsedList['created_at'],
      ]);
   }
}