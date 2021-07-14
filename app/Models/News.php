<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
   protected $table = 'news';

   public function getNews()
   {
      return DB::table($this->table)->select(['id', 'title', 'description', 'author', 'created_at'])->get();
   }

   public function getNewsById(int $id)
   {
      return DB::table($this->table)->find($id);
   }
}
