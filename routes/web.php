<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::main')->name('main');
Route::livewire('/tect-stack', 'pages::tech-stack')->name('tech-stack');
Route::livewire('/certificates', 'pages::certificates')->name('certificates');
