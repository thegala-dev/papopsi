<?php

use App\Http\Middleware\GenerateSessionData;
use App\Http\Middleware\RedirectToStep;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Recipe;
use App\Livewire\Wizard\Intro;
use App\Livewire\Wizard\Steps\StepAge;
use App\Livewire\Wizard\Steps\StepContext;
use App\Livewire\Wizard\Steps\StepDetails;
use App\Livewire\Wizard\Steps\StepSummary;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::prefix('wizard')
    ->middleware(RedirectToStep::class)
    ->name('wizard.')
    ->group(function () {
        Route::get('/', Intro::class)
            ->middleware(GenerateSessionData::class)
            ->name('intro');

        Route::prefix('steps')
            ->name('steps.')
            ->group(function () {
                Route::get('/age', StepAge::class)
                    ->name('age');
                Route::get('/context', StepContext::class)
                    ->name('context');
                Route::get('/summary', StepSummary::class)
                    ->name('summary');
                Route::get('/details', StepDetails::class)
                    ->name('details');
            });

        Route::get('/recipe', Recipe::class)
            ->name('recipe');

    });

// Route::view('dashboard', 'dashboard')
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');
//
// Route::middleware(['auth'])->group(function () {
//    Route::redirect('settings', 'settings/profile');
//
//    Route::get('settings/profile', Profile::class)->name('settings.profile');
//    Route::get('settings/password', Password::class)->name('settings.password');
//    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
// });
//
// require __DIR__.'/auth.php';
