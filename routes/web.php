<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Ensi\LaravelServeSwagger\Controllers\SwaggerController;

Route::get('/', function () {
    return ('welcome');
});
