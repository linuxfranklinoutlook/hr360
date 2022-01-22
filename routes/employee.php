<?php

use Illuminate\Support\Facades\Route;

Route::get('employee', function () {
    return "welcome to employees route";
})->middleware('signed');
