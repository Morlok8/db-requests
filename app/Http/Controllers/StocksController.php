<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;


use App\Models\Stocks;

class StocksController extends Controller
{
    // 
    public function show(Request $request){
        $validated = $request->validate([
            'page' => 'numeric',
            'limit' => 'numeric|max:500',
            'dateTo' => 'required|date_format:Y-m-d',
        ]);

        $currentDate = Carbon::now()->format('Y-m-d');

        $page = $request->page;

        $limit = $request->limit;

        $date_to = $request->dateTo;

        $response = Http::get('http://109.73.206.144:6969/api/stocks?dateFrom='.$currentDate.'&dateTo='.$date_to.'&page='.$page.'&key=E6kUTYrYwZq2tN4QEtyzsbEBk3ie&limit='.$limit);

        $data = $response->body();

        $phpObject = json_decode($data);

        $new_data = array_map(function($item) {
            return (array)$item; 
        }, $phpObject->data);

        Stocks::upsert($new_data, ['sc_code', 'nm_id', 'date', 'warehouse_name', 'supplier_article']);

        return response()->json([
            "data" => $phpObject->data,
            "request" => $request->page
        ], 201);
    }
}
