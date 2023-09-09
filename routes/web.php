<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Establecer chat con usuario especifico
    Route::get('/chat/with/{user}', [ChatController::class, 'chatWith'])->name('chat.with');
    
    // Mostrar chat de id especifico
    Route::get('/chat/{chat}', [ChatController::class, 'show'])->name('chat.show');

    // Usuarios de un chat
    Route::get('/chat/{chat}/get_users', [ChatController::class, 'getUsers'] )->name('chat.getusers');

    // Mensajes de un chat
    Route::get('/chat/{chat}/get_messages', [ChatController::class, 'getMessages'] )->name('chat.getmessages');

    // Para saber los datos del usuariologueado
    Route::get('auth/user', function(){
        
        if(auth()->check()){
        
            return response()->json([
                'authUser' => auth()->user()
            ]);
        
        }        
        
        return null;
    });

    Route::post('/message/sent', [MessageController::class, 'sent'])->name('message.sent');
});
