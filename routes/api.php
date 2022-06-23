<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('search', function (Request $request){

    $query = $request->query();

    if(!$query){
        return [
            'success' => false,
            'message' => 'no query sent !'
        ];
    }


    if(!$query['query']){
        return [
            'success' => false,
            'message' => 'empty query !'
        ];
    }



    $result = DB::table('products')
        ->where('barcode',$query)
        ->orWhere('name','LIKE','%'.implode($query).'%')
        ->take(10)
        ->get();

    if(!$result){
        return [
            'success' => false,
            'message' => 'query not found in the db !'
        ];
    }

    return [
        'success' => true,
        'data' => $result,
        'query' => $query['query'],
    ];
});
