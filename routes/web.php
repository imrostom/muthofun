<?php

use Imrostom\Muthofun\Controllers\MuthofunController;

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('muthofun', [MuthofunController::class, 'index']);
	Route::post('muthofun', [MuthofunController::class, 'send']);
});
