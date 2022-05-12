<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\Description_FormationControllers;
use App\Http\Controllers\pages\Parents_etudiantControllers;
use App\Http\Controllers\pages\FormationControllers;
use App\Http\Controllers\pages\BatimentControllers;
use App\Http\Controllers\pages\FormateurControllers;
use App\Http\Controllers\pages\EtudiantControllers;
use App\Http\Controllers\pages\MatiereControllers;
use App\Http\Controllers\pages\GroupeControllers;
use App\Http\Controllers\pages\PayementControllers;
use App\Http\Controllers\pages\FactureControllers;
use App\Http\Controllers\pages\SalleControllers;
use App\Http\Controllers\pages\UserControllers;
use App\Http\Controllers\pages\AcceuilControllers;

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
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',[AcceuilControllers::class, 'index']);

Route::group(['prefix'=>'Admin', 'middleware'=>['auth']],function(){
    Route::get('Formation',[FormationControllers::class, 'index'])->name('Formation');
    Route::post('Formation',[FormationControllers::class, 'store'])->name('Formation.store');
    Route::get('Formation/edit',[FormationControllers::class, 'edit'])->name('Formation.edit');
    Route::get('Formation/fetch',[FormationControllers::class, 'fetchAll'])->name('Formation.fetchAll');
    Route::post('Formation/update',[FormationControllers::class, 'update'])->name('Formation.update');
    Route::post('Formation/delete',[FormationControllers::class, 'destroy'])->name('Formation.destroy');

});

Route::group(['prefix'=>'Rh', 'middleware'=>[ 'auth']],function(){

});
//////////Formation route ///////////////////
Route::get('Formation',[FormationControllers::class, 'index'])->name('Formation');
Route::post('Formation',[FormationControllers::class, 'store'])->name('Formation.store');
Route::get('Formation/edit',[FormationControllers::class, 'edit'])->name('Formation.edit');
Route::get('Formation/fetch',[FormationControllers::class, 'fetchAll'])->name('Formation.fetchAll');
Route::post('Formation/update',[FormationControllers::class, 'update'])->name('Formation.update');
Route::post('Formation/delete',[FormationControllers::class, 'destroy'])->name('Formation.destroy');
////////// end formation route /////////////

//////////Formation route ///////////////////
Route::resource('Detaille',Description_FormationControllers::class)->except([
    'create', 'edit', 'update','store'
]);
Route::post('Detaille',[Description_FormationControllers::class, 'store'])->name('Detaille.store');
Route::put('Detaille/update',[Description_FormationControllers::class, 'update'])->name('Detaille.update');
////////// end formation route /////////////

//////////// Parent Etudiant Route ///////////////
Route::resource('Matiere',MatiereControllers::class)->except([
    'create', 'edit', 'update','store'
]);
Route::post('Matiere',[MatiereControllers::class, 'store'])->name('Matiere.store');
Route::put('Matiere/update',[MatiereControllers::class, 'update'])->name('Matiere.update');
//////////// end Parent etudiant route ////////////

//////////// Employee Route ///////////////
Route::get('Employee',[UserControllers::class, 'index'])->name('Employee');
Route::post('Employee',[UserControllers::class, 'store'])->name('Employee.store');
Route::get('Employee/edit',[UserControllers::class, 'edit'])->name('Employee.edit');
Route::get('Employee/fetch',[UserControllers::class, 'fetchAll'])->name('Employee.fetchAll');
Route::post('Employee/update',[UserControllers::class, 'update'])->name('Employee.update');
Route::post('Employee/delete',[UserControllers::class, 'destroy'])->name('Employee.destroy');
//////////// end employee route ////////////

//////////// Employee Route ///////////////
Route::get('Batiment',[BatimentControllers::class, 'index'])->name('Batiment');
Route::post('Batiment',[BatimentControllers::class, 'store'])->name('Batiment.store');
Route::get('Batiment/edit',[BatimentControllers::class, 'edit'])->name('Batiment.edit');
Route::get('Batiment/fetch',[BatimentControllers::class, 'fetchAll'])->name('Batiment.fetchAll');
Route::post('Batiment/update',[BatimentControllers::class, 'update'])->name('Batiment.update');
Route::post('Batiment/delete',[BatimentControllers::class, 'destroy'])->name('Batiment.destroy');
//////////// end employee route ////////////

//////////// Etudiant Route ///////////////
Route::resource('Etudiant',EtudiantControllers::class)->except([
    'create', 'edit', 'update','store'
]);
Route::post('Etudiant',[EtudiantControllers::class, 'store'])->name('Etudiant.store');
Route::put('Etudiant/update',[EtudiantControllers::class, 'update'])->name('Etudiant.update');
//////////// end etudiant route ////////////

//////////// Formateur Route ///////////////
Route::resource('Formateur',FormateurControllers::class)->except([
    'create', 'edit', 'update','store'
]);
Route::post('Formateur',[FormateurControllers::class, 'store'])->name('Formateur.store');
Route::put('Formateur',[FormateurControllers::class, 'update'])->name('Formateur.update');
//////////// end Formateur route ////////////

//////////// Groupe Etudiant Route ///////////////
Route::resource('Groupe',GroupeControllers::class)->except([
    'create', 'edit', 'update','store'
]);
Route::post('Groupe',[GroupeControllers::class, 'store'])->name('Groupe.store');
Route::put('Groupe/update',[GroupeControllers::class, 'update'])->name('Groupe.update');
//////////// end Groupe etudiant route ////////////

//////////// Payement Route ///////////////
Route::resource('Payement',PayementControllers::class)->except([
    'create', 'edit', 'update','store'
]);
Route::post('Payement',[PayementControllers::class, 'store'])->name('Payement.store');
Route::put('Payement/update',[PayementControllers::class, 'update'])->name('Payement.update');
//////////// end Payement route ////////////

//////////// Salle Route ///////////////
Route::resource('Salle',SalleControllers::class)->except([
    'create', 'edit', 'update','store'
]);
Route::post('Salle',[SalleControllers::class, 'store'])->name('Salle.store');
Route::put('Salle/update',[SalleControllers::class, 'update'])->name('Salle.update');
//////////// end Salle route ////////////

//////////// Facture Etudiant Route ///////////////
/*Route::resource('Facture',FactureControllers::class)->except([
    'create', 'edit', 'update','store'
]);*/
Route::get('Facture{id}',[FactureControllers::class, 'index']);

//////////// end Facture etudiant route ////////////

//////////// Parent Etudiant Route ///////////////
Route::resource('Parent_Etudiant',Parents_etudiantControllers::class)->except([
    'create', 'edit', 'update','store'
]);
Route::post('Parent_Etudiant',[Parents_etudiantControllers::class, 'store'])->name('Parent_Etudiant.store');
Route::put('Parent_Etudiant/update',[Parents_etudiantControllers::class, 'update'])->name('Parent_Etudiant.update');
//////////// end Parent etudiant route ////////////

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
