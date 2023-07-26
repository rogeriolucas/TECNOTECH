<?php


use App\Http\Controllers\AssociadoController;

Route::post('/associados', [AssociadoController::class, 'cadastrarAssociado']);
Route::get('/associados/em-dia', [AssociadoController::class, 'listarAssociadosEmDia']);
Route::get('/associados/em-atraso', [AssociadoController::class, 'listarAssociadosEmAtraso']);
Route::patch('/associados/{associado}/pagamento', [AssociadoController::class,'listarAssociadospagamentos']);

