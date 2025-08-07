<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

use App\Models\Orders;
use App\Models\Stocks;


class OrdersController extends Controller
{
    //
    // 
    public function show(Request $request){
        $validated = $request->validate([
            'page' => 'numeric',
            'limit' => 'numeric'
        ]);

        $currentDate = Carbon::now()->format('Y-m-d');

        $page = $request->page;

        $response = Http::get('http://109.73.206.144:6969/api/stocks?dateFrom='.$currentDate.'&dateTo=2025-01-01&page=2&key=E6kUTYrYwZq2tN4QEtyzsbEBk3ie&limit=100');

        $data = $response->body();

        $phpObject = json_decode($data);

        

        /*foreach($phpObject->data as $data){
            $insertable_data = (array) $data;
            //DB::table('your_table_name')->insert($dataArray);
            Stocks::firstOrCreate(['sc_code' => $insertable_data['sc_code'], 
                                    'nm_id' => $insertable_data['nm_id'],
                                    'date' => $insertable_data['date'],
                                    'warehouse_name' => $insertable_data['warehouse_name'],
                                    'supplier_article' => $insertable_data['supplier_article'] 
                                ], $insertable_data);
        }*/


        return response()->json([
            "data" => $phpObject->data,
            "request" => $request->page
        ], 201);
    }

}
