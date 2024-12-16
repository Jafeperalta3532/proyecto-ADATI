<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SwitchController;
use App\Http\Controllers\DireccionesipController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\PiezasController;





Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard/menu',[AuthController::class, 'showDashboard'])->name('menu');

Route::get('switch/index', [SwitchController::class, 'indexSwitch'])->name('switch.index');

Route::get('switch/create', [SwitchController::class, 'createSwitch'])->name('switch.create');

Route::post('switch/store', [SwitchController::class, 'storeSwitch'])->name('switch.store');

Route::get('switch/showIp', [SwitchController::class, 'showIP'])->name('addip.index');

Route::delete('/switch/{switch}/destroy',[SwitchController::class, 'destroySwitch'])->name('switch.destroy');

Route::get('addip/index/{switchId}', [DireccionesipController::class, 'indexDireccionesIp'])->name('addip.index');

Route::get('addip/create/{switchId}', [DireccionesipController::class, 'createDireccionesIp'])->name('addip.create');

Route::post('addip/store/{switchId}', [DireccionesipController::class, 'storeDireccionesIp'])->name('addip.store');

Route::delete('addip/destroy/{switchId}/{direccionesIp}', [DireccionesipController::class, 'destroyDireccionesIp'])->name('addip.destroy');

Route::resource('marcas', MarcasController::class);

Route::get('/refacciones/index/{marca_id}', [PiezasController::class, 'index'])->name('refacciones.index');

Route::get('/refacciones/create/{marca_id}', [PiezasController::class, 'create'])->name('refacciones.create');

Route::post('/refacciones/store/{marca_id}', [PiezasController::class, 'store'])->name('refacciones.store');

Route::delete('/refacciones/destroy/{id}/{marca_id}', [PiezasController::class, 'destroy'])->name('refacciones.destroy');

Route::put('/refacciones/upgrade/{id}/{marca_id}', [PiezasController::class, 'update'])->name('refacciones.upgrade');
