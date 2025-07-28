<?php

use App\Http\Middleware\CheckRecipeLimit;
use App\Http\Middleware\GenerateSessionData;
use App\Http\Middleware\RedirectToStep;
use App\Livewire\Account\PremiumActivation;
use App\Livewire\Pages\Home;
use App\Livewire\Support\RecipeLimit;
use App\Livewire\Support\RecipeNotFound;
use App\Livewire\Support\SharedRecipe;
use App\Livewire\Wizard\Intro;
use App\Livewire\Wizard\Recipe;
use App\Livewire\Wizard\Steps\StepAge;
use App\Livewire\Wizard\Steps\StepContext;
use App\Livewire\Wizard\Steps\StepDetails;
use App\Livewire\Wizard\Steps\StepSummary;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/invalidate', function () {
    session()->invalidate();

    return redirect()->to('/');
})->name('invalidate');

Route::prefix('wizard')
    ->name('wizard.')
    ->group(function () {
        Route::middleware([RedirectToStep::class, CheckRecipeLimit::class])
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
            });

        Route::prefix('recipe')
            ->name('recipe.')
            ->group(function () {
                Route::get('/', Recipe::class)
                    ->name('index');

                Route::get('/limit-reached', RecipeLimit::class)
                    ->name('limit-reached');
            });
    });

Route::prefix('recipe')
    ->name('recipe.')
    ->group(function () {
        Route::get('/not-found', RecipeNotFound::class)
            ->name('not-found');

        Route::get('/{token}', SharedRecipe::class)
            ->name('share');
    });

Route::prefix('account')
    ->name('account.')
    ->group(function () {
        Route::get('/activate/{token}', PremiumActivation::class)
            ->name('activate');
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
