<?php

use App\Http\Controllers\admin\EnterpriseController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserMedicamentoController;
use Illuminate\Support\Facades\Route;

//Rotas do Usuário
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->can('administrator');
Route::get('/users', [UserController::class, 'index'])->name('users.index')->can('administrator');

//Rotas Medicamentos X Usuários
Route::get('/usersmedicamentos/create', [UserMedicamentoController::class, 'create'])->name('usersmedicamentos.create');
Route::delete('/usersmedicamentos/{usermedicamento}/destroy', [UserMedicamentoController::class, 'destroy'])->name('usersmedicamentos.destroy');
Route::get('/usersmedicamentos/{usermedicamento}', [UserMedicamentoController::class, 'show'])->name('usersmedicamentos.show');
Route::put('/usersmedicamentos/{usermedicamento}', [UserMedicamentoController::class, 'update'])->name('usersmedicamentos.update');
Route::get('/usersmedicamentos/{usermedicamento}/edit', [UserMedicamentoController::class, 'edit'])->name('usersmedicamentos.edit');
Route::post('/usersmedicamentos', [UserMedicamentoController::class, 'store'])->name('usersmedicamentos.store')->can('administrator');
Route::get('/usersmedicamentos', [UserMedicamentoController::class, 'index'])->name('usersmedicamentos.index')->can('administrator');

//Rotas Medicamentos
Route::get('/medicamentos/create', [MedicamentoController::class, 'create'])->name('medicamentos.create');
Route::delete('/medicamentos/{medicamento}/destroy', [MedicamentoController::class, 'destroy'])->name('medicamentos.destroy');
Route::get('/medicamentos/{medicamento}', [MedicamentoController::class, 'show'])->name('medicamentos.show');
Route::put('/medicamentos/{medicamento}', [MedicamentoController::class, 'update'])->name('medicamentos.update');
Route::get('/medicamentos/{medicamento}/edit', [MedicamentoController::class, 'edit'])->name('medicamentos.edit');
Route::post('/medicamentos', [MedicamentoController::class, 'store'])->name('medicamentos.store')->can('administrator');
Route::get('/medicamentos', [MedicamentoController::class, 'index'])->name('medicamentos.index')->can('administrator');

//Rotas das Empresas
Route::post('/enterprises', [EnterpriseController::class, 'store'])->name('enterprises.store');
Route::get('/enterprises/create', [EnterpriseController::class, 'create'])->name('enterprises.create');
Route::get('/enterprises', [EnterpriseController::class, 'index'])->name('enterprises.index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
