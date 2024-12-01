<?php

use App\Models\listing;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latesting Listings',
        'listings' => listing::all()
    ]);
})->name('listings.index');
Route::get('/listings /{id}', function ($id) {
    return view('single_listing', ['listings' => listing::find($id)]);
})->name('listings.show');
