<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('welcome');
    }
    public function search(Request $request): Factory|View|Application
    {
        $searchQuery = $request->query('q');

        $client = new Client();
        $url = config('app.url').'api/search';


        $request = $client->post($url, [
            'query' => $searchQuery,
        ]);
        $response = $request.send();

        dd($response);


        return view('search', ['query' => $searchQuery]);
    }
}
