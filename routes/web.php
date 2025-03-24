<?php

use App\Livewire\NewsComponent;
use App\Livewire\NewsCreateComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', NewsComponent::class)->name('news');
Route::get('/news/create', NewsCreateComponent::class)->name('news.create');
