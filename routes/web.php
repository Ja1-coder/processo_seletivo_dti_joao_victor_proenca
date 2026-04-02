<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::middleware('guest')->group(function () {
    
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');

    Route::get('cadastro-usuario', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'storeRegister'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    
    // Rota para deslogar
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard Principal (Listagem e Formulário que você criou)
    Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
    
    // Rota para salvar a nova task
    Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
    
    // Rota específica para mudar o status (Concluir/Abrir)
    Route::patch('tasks/{task}/status', [TaskController::class, 'toggleStatus'])->name('tasks.status');
    
    // Rota para deletar
    Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

});