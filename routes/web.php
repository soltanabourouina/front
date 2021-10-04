<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\MainController;
use App\Http\Controllers\StructureDefinitionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CorrespondanceLigneBudgetaireController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FileVariantController;
use App\Http\Controllers\SimulationController;
use App\Http\Controllers\ScenariiController;
use App\Http\Controllers\CodeRegroupementPrincipalController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
//Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('contacts','ContactController');
Route::resource('zones','ZoneController');
Route::resource('pays','PaysController');
Route::resource('regions','RegionController');
Route::resource('departements','DepartementsController');
Route::resource('etablissements','EtablissementsController');
Route::resource('categories_professionnel','Categories_professionnelController');
Route::resource('filieres_metiers','Filieres_MetierController');

Route::resource('postesdepense','PostedepenseController');

Route::resource('scenarii','ScenariiController');
Route :: resource('CodeRegroupementPrincipal','CodeRegroupementPrincipalController');

Route::get('/scenarii/{id}', [ScenariiController::class, 'show'])->name('scenarii.show');
Route :: post('/scenarii/saved', [ScenariiController::class, 'store_ev'])->name('scenarii.store_ev');
/*debut interfaces integrations*/
//Route::get('/home', [MainController::class, 'home'])->name('home');
//SRoute::get('/test', [MainController::class, 'testGET'])->name('testGET');

Route::get('/uploadFile', [FileUploadController::class, 'uploadFilesGET'])->name('uploadFilesGET');
Route::post('/uploadFile', [FileUploadController::class, 'uploadFilesPOST'])->name('uploadFilesPOST');

Route::get('/spreadsheetStructure', [StructureDefinitionController::class, 'reviewGET'])->name('spreadsheetColumnStructureReviewGET');
Route::get('/defineSpreadsheetStructure', [StructureDefinitionController::class, 'uploadSpreadsheetColumnStructureGET'])->name('uploadSpreadsheetColumnStructureGET');
Route::post('/defineSpreadsheetStructure', [StructureDefinitionController::class, 'uploadSpreadsheetColumnStructurePOST'])->name('uploadSpreadsheetColumnStructurePOST');
Route::post('/saveSpreadsheetStructure', [StructureDefinitionController::class, 'saveSpreadsheetColumnStructureDefinitionPOST'])->name('saveSpreadsheetColumnStructureDefinition');

Route::get('/transactions', [TransactionController::class, 'transactionsGET'])->name('transactionsGET');
Route::get('/transactions/{id}/cancel', [TransactionController::class, 'cancelTransactionGET'])->name('cancelTransactionGET');

Route::get('/budgetCodes/upload', [CorrespondanceLigneBudgetaireController::class, 'codesBudgetairesFileUploadGET'])->name('codesBudgetairesFileUploadGET');
Route::post('/budgetCodes/define', [CorrespondanceLigneBudgetaireController::class, 'codesBudgetairesDefinePOST'])->name('codesBudgetairesDefinePOST');
Route::get('/budgetCodes', [CorrespondanceLigneBudgetaireController::class, 'budgetCodesGET'])->name('budgetCodesGET');
Route::post('/budgetCodes/save', [CorrespondanceLigneBudgetaireController::class, 'saveCodesBudgetairesPOST'])->name('saveCodesBudgetairesPOST');

Route::get('/events', [EventController::class, 'eventsGET'])->name('eventsGET');
Route::get('/events/{id}/cancel', [EventController::class, 'cancelEventGET'])->name('cancelEventGET');

Route::get('/simulations', [SimulationController::class, 'simulationsGET'])->name('simulationsGET');
Route::get('/simulations/create', [SimulationController::class, 'createSimulationGET'])->name('createSimulationGET');
Route::post('/simulations/create', [SimulationController::class, 'createSimulationPOST'])->name('createSimulationPOST');
Route::get('/simulations/{id}', [SimulationController::class, 'readSimulationGET'])->name('readSimulationGET');
Route::get('/simulations/{id}/edit', [SimulationController::class, 'editSimulationGET'])->name('editSimulationGET');
Route::get('/simulations/{id}/confirm', [SimulationController::class, 'confirmSimulationGET'])->name('confirmSimulationGET');
Route::get('/simulations/{id}/delete', [SimulationController::class, 'deleteSimulationGET'])->name('deleteSimulationGET');
Route::get('/simulations/{id}/events/create', [SimulationController::class, 'createSimulationEventGET'])->name('createSimulationEventGET');
Route::post('/simulations/{id}/events/create', [SimulationController::class, 'createSimulationEventPOST'])->name('createSimulationEventPOST');


Route::get('/file-variants', [FileVariantController::class, "browse"])->name("browseFileVariantsGET");
Route::get('/file-variants/add', [FileVariantController::class, "addGET"])->name("addFileVariantGET");
Route::post('/file-variants/add', [FileVariantController::class, "addPOST"])->name("addFileVariantPOST");
Route::get('/file-variants/{id}', [FileVariantController::class, "read"])->name("readFileVariantGET");
Route::get('/file-variants/{id}/edit', [FileVariantController::class, "editGET"])->name("editFileVariantGET");
Route::post('/file-variants/{id}/edit', [FileVariantController::class, "editPOST"])->name("editFileVariantPOST");
Route::get('/file-variants/{id}/delete', [FileVariantController::class, "delete"])->name("deleteFileVariantGET");

/*fin interfaces integrations*/

Route::group(['middleware' => ['auth']], function() {
    
Route::resource('roles','RoleController');

Route::resource('users','UserController');

});

Route::get('customers_report', 'Customers_Report@index')->name("customers_report");

Route::post('Search_customers', 'Customers_Report@Search_customers');

Route::get('/{page}', 'AdminController@index');



