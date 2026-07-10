<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::livewire('/', 'pages::main')->name('main');
Route::livewire('/tect-stack', 'pages::tech-stack')->name('tech-stack');
Route::livewire('/certificates', 'pages::certificates')->name('certificates');
Route::livewire('/experiences', 'pages::experiences')->name('experiences');

Route::middleware(['guest'])->group(function () {
    Route::livewire('/nigol', 'pages::login')->name('login');
});

Route::middleware(['auth'])->group(function() {
    Route::livewire('/edit', 'pages::edit')->name('edit');
    Route::livewire('/experience/edit/{experience}', 'pages::experience-edit')->name('experience-edit');
    
    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route('main');
    })->name('logout');
});
