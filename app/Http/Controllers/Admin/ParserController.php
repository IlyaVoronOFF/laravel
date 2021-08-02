<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\NewsJob;
use App\Services\ParserService;
use Illuminate\Support\Facades\DB;

class ParserController extends Controller
{
    public function __invoke(Request $request, ParserService $parser)
    {
        $start = date('c');
        $data = DB::table('resourses')->get();

        foreach ($data as $url) {
            dispatch(new NewsJob($url->url));
        }

        return 'Парсинг успешно завершён! Новости добавлены в очередь.' . '<br>' . "Время начала: $start" . '<br>' . 'Время завершения:' . date('c');
    }
}