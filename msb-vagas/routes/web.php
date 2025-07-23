<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Adminstracao\Vagas;
use App\Livewire\Adminstracao\Dashboard;
use App\Livewire\Publico\Candidatos;
use App\Livewire\Publico\Vagaslistar;
use App\Livewire\Publico\VagaUnica;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/vagas', Vagas::class)->name('vagas');


//rotas public
Route::get('/candidatura', Candidatos::class)->name('candidatura');
Route::get('/todas-as-vagas', Vagaslistar::class)->name('todas-as-vagas');
Route::get('/todas-as-vagas/{vaga}', VagaUnica::class)->name('todas-as-vagas');
