<?php

use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\LeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/projects', [ApiController::class, 'index']);
Route::get('/types', [ApiController::class, 'getType']);
Route::get('/technologies', [ApiController::class, 'getTechnologie']);
Route::get('/get-detail-slug/{slug}', [ApiController::class, 'getDetailbySlug']);
Route::post('/form-message', [LeadController::class, 'store']);
