<?php

use Illuminate\Support\Facades\Route;

Route::get('/{vue?}', static function () {
    return view('main');
})->where('vue', '[\/\w\.-]*');
