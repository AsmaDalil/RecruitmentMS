<?php

use App\Http\Controllers\AnonceController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StageaireController;
use App\Models\stageaire;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Client Routes
Route::get('/',[AnonceController::class,'indexStageaire'])->name('anonce.indexStageaire');
Route::any('/Recrutement',[AnonceController::class,'indexRecrutement'])->name('anonce.indexRecrutement');

Route::any('/inscription', [StageaireController::class, 'index'])->name('stageaire.store');
Route::any('/condidatur-sp', [StageaireController::class, 'indexCondidatureSP'])->name('stageaire.indexSP');
Route::post('/condidatur-sp/checkCIN', [StageaireController::class, 'checkCIN'])->name('stageaire.checkCIN');

Route::any('/storeStage', [StageaireController::class, 'storeStage'])->name('stageaire.storeStage');

// Admine Routes:
Route::get('/dashboard',[AnonceController::class,'tst'])->name('anonce.tst');
Route::post('/store-annonce',[AnonceController::class,'store'])->name('anonce.store');
    //Recrutement:
Route::get('/dashboard/liste-annonce',[AnonceController::class,'getAllAnonce'])->name('anonce.getAllAnonce');
Route::post('/dashboard/liste-annonce-filter',[AnonceController::class,'getAllAnonceFiltrer'])->name('anonce.getAllAnonceFiltrer');
//Route::get('/dashboard/liste-annonce-edit/{idAnonce}',[AnonceController::class,'edit'])->name('anonce.edit');
Route::post('/dashboard/liste-annonce-cv/{id}',[AnonceController::class,'getCvByAnonce'])->name('anonce.getCvByAnonce');
//Route::post('/dashboard/update-Etat',[AnonceController::class,'updateEtat'])->name('anonce.updateEtat');
    //CVs:
Route::get('/dashboard/liste-cv',[StageaireController::class,'listCv'])->name('stageaire.listCv');

Route::get('/dashboard/creeRecrutement',[AnonceController::class,'indexR'])->name('createRecrutement.indexR');
Route::get('/dashboard/creeStage',[AnonceController::class,'indexS'])->name('createStage.indexS');

    //mail:
Route::get('/dashboard/mailCondidat/{idCondidat}',[StageaireController::class,'MailCondidat'])->name('stagaire.MailCondidat');
Route::get('/dashboard/getMAil',[MailController::class,'index'])->name('mail.index');
Route::any('/dashboard/buildMail',[MailController::class,'storMail'])->name('mail.storMail');
Route::get('/dashboard/getMail',[MailController::class,'getMail'])->name('mail.getMail');

