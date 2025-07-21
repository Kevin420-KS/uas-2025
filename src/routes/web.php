<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    $path = resource_path('frontend/index.html');
    if (!File::exists($path)) {
        abort(404);
    }

    $content = File::get($path);
    return Response::make($content, 200)
        ->header("Content-Type", "text/html");
});