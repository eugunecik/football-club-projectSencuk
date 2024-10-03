<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\FootballMatchController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\SponsorController;

Route::get('/', function () {
    return view('home');
});

Route::resource('teams', TeamController::class);
Route::resource('players', PlayerController::class);
Route::resource('coaches', CoachController::class);
Route::resource('matches', FootballMatchController::class);
Route::resource('stadiums', StadiumController::class);
Route::resource('sponsors', SponsorController::class);