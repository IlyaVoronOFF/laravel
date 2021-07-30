<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\ParserContract;
use App\Http\Controllers\Controller;

use App\Services\ParserService;

class ParserController extends Controller
{
    public function __invoke(Request $request, ParserContract $parser)
    {
        dd($parser->getParsedList('https://news.yandex.ru/army.rss'));
    }
}
