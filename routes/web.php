<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api', function () {
    $result = Http::get('https://jsonplaceholder.typicode.com/posts');
    $test_collection = collect($result->json());


    // dd($test_collection->map(function($item) {
    //     return  ucfirst($item['title']);
    // }));

    $test2 = [];
    foreach ($test_collection as $post) {
        array_push($test2, $post);
    }

    dd(array_filter($test2, function($item) {
        return $item['id'] == 1;
    }));
});
