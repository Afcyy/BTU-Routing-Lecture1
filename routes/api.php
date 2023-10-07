<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/name', function () {
    return 'Vazha Aptsiauri';
});

Route::get('/age', function () {
    return 21;
});

Route::get('/hobby', function () {
    return 'Video Games';
});

Route::get('/siblings', function () {
    return 4;
});

Route::get('/siblings', function () {
    return 4;
});

Route::get('/status', function () {
    return 'Student';
});

Route::post('/store', function () {
    return response()->json([
        'success' => true,
        'message' => 'წარმატებით განახლდა',
    ]);
});

Route::put('/edit', function () {
    return response()->json([
        'success' => true,
        'message' => 'წარმატებით დაემატა',
    ]);
});

Route::delete('/delete', function () {
    return response()->json([
        'success' => true,
        'message' => 'წარმატებით წაიშალა',
    ]);
});
