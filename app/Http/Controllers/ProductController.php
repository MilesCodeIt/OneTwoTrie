<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('welcome');
    }

    private function searchInDb($query): array
    {
        if(!$query){
            return [
                'success' => false,
                'message' => 'empty query !',
                'error_code' => 400
            ];
        }


        $result = DB::table('products')
            ->where('barcode',$query)
            ->orWhere('name','LIKE','%'.$query.'%')
            ->take(10)
            ->get()
            ->toArray();



        if(!$result){
            return [
                'success' => false,
                'message' => 'no result found',
                'error_code' => 404
            ];
        }

        return [
            'success' => true,
            'data' => $result,
        ];
    }

    public function search(Request $request): Factory|View|Application
    {


        $query = $request->query('q');

        $result = $this->searchInDb($query);

        if(!$result['success']){
            return view('search',
                [
                    'success' => false,
                    'error_code' => $result['error_code']
                ]
            );
        }


        return view('search',
            [
                'success' => true,
                'result' => $result['data']
            ]
        );
    }
}
