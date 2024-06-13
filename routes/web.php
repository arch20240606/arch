<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FileController;

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

Route::group([ 'prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function() {

    // Роуты обычных юзеров 
    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/qrcode', [App\Http\Controllers\HomeController::class, 'qrcode'])->name('qrcode');

    Route::get('/psp', [App\Http\Controllers\HomeController::class, 'psp'])->name('psp');


    Route::get('/pdf', [App\Http\Controllers\HomeController::class, 'pdf'])->name('pdf');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('/ask', function () { return view('questions.ask'); })->name('ask');
    Route::get('/questions', function () { return view('questions.index'); })->name('questions');
    Route::get('/calculator', function () { return view('calculator.index'); })->name('calculator');
    Route::get('/terms', function () { return view('terms.index'); })->name('terms');
    

    Route::get('/download-file/{files_id}', [FileController::class, 'downloadFile']);


    Route::get('/etalon', [App\Http\Controllers\WelcomeController::class, 'etalon'])->name('etalon');
    Route::post('/etalon/getinfo', [App\Http\Controllers\WelcomeController::class, 'getinfo'])->name('etalon.getinfo');
    Route::get('infosys/iscgo', [App\Http\Controllers\WelcomeController::class, 'iscgo'])->name('infosys.iscgo');
    Route::get('infosys/ircgo', [App\Http\Controllers\WelcomeController::class, 'ircgo'])->name('infosys.ircgo');
    Route::get('infosys/ikcgo', [App\Http\Controllers\WelcomeController::class, 'ikcgo'])->name('infosys.ikcgo');
    Route::get('infosys/ismio', [App\Http\Controllers\WelcomeController::class, 'ismio'])->name('infosys.ismio');
    Route::get('infosys/irmio', [App\Http\Controllers\WelcomeController::class, 'irmio'])->name('infosys.irmio');
    Route::get('infosys/ikmio', [App\Http\Controllers\WelcomeController::class, 'ikmio'])->name('infosys.ikmio');
    Route::get('infosys/isfirst', [App\Http\Controllers\WelcomeController::class, 'isfirst'])->name('infosys.isfirst');
    Route::get('infosys/issecond', [App\Http\Controllers\WelcomeController::class, 'issecond'])->name('infosys.issecond');
    Route::get('infosys/isthird', [App\Http\Controllers\WelcomeController::class, 'isthird'])->name('infosys.isthird');
    Route::get('infosys/info/{id}', [App\Http\Controllers\WelcomeController::class, 'info'])->name('infosys.info');
    Route::get('infosys/search', [App\Http\Controllers\WelcomeController::class, 'search'])->name('infosys.search');
   

    Route::get('/budget', [App\Http\Controllers\BudgetController::class, 'index'])->name('budget.index');
    Route::get('/view/{id}', [App\Http\Controllers\BudgetController::class, 'show'])->name('budget.show');
    
    Route::get('/accounting/information', [App\Http\Controllers\HomeController::class, 'accounting'])->name('accounting.information');
    
    Route::get('accounting/iss', [App\Http\Controllers\AccountingController::class, 'iss'])->name('accounting.iss');
    Route::get('/accounting/iss/search', [App\Http\Controllers\AccountingController::class, 'search'])->name('accounting.search');
    Route::get('accounting/inbox', [App\Http\Controllers\AccountingController::class, 'inbox'])->name('accounting.inbox');
    Route::get('accounting/outbox', [App\Http\Controllers\AccountingController::class, 'outbox'])->name('accounting.outbox');
    Route::get('accounting/draft', [App\Http\Controllers\AccountingController::class, 'draft'])->name('accounting.draft');
    Route::resource('accounting', App\Http\Controllers\AccountingController::class);


    Route::get('onlineResources', [App\Http\Controllers\OnlineResourcesController::class, 'index'])->name('onlineResources.index');
    Route::get('onlineResources/search', [App\Http\Controllers\OnlineResourcesController::class, 'search'])->name('onlineResources.search');
    Route::resource('onlineResources', App\Http\Controllers\OnlineResourcesController::class);


    Route::get('icService', [App\Http\Controllers\icServiceController::class, 'index'])->name('icService.index');
    Route::get('icService/search', [App\Http\Controllers\icServiceController::class, 'search'])->name('icService.search');
    Route::resource('icService', App\Http\Controllers\icServiceController::class);

    Route::get('itProject', [App\Http\Controllers\itProjectController::class, 'index'])->name('itProject.index');
    Route::get('itProject/search', [App\Http\Controllers\itProjectController::class, 'search'])->name('itProject.search');
    Route::resource('itProject', App\Http\Controllers\itProjectController::class);

    Route::get('archiveIss', [App\Http\Controllers\ArchiveIssController::class, 'index'])->name('archiveIss.index');
    Route::get('archiveIss/search', [App\Http\Controllers\ArchiveIssController::class, 'search'])->name('archiveIss.search');
    Route::resource('archiveIss', App\Http\Controllers\ArchiveIssController::class);

    Route::get('archiveOnlineResources', [App\Http\Controllers\ArchiveOnlineResourcesController::class, 'index'])->name('archiveOnlineResources.index');
    Route::get('archiveOnlineResources/search', [App\Http\Controllers\ArchiveOnlineResourcesController::class, 'search'])->name('archiveOnlineResources.search');
    Route::resource('archiveOnlineResources', App\Http\Controllers\ArchiveOnlineResourcesController::class);

    Route::get('bussinessObject', [App\Http\Controllers\PublishedIssController::class, 'index'])->name('bussinessObject.index');
    Route::get('bussinessObject/search', [App\Http\Controllers\PublishedIssController::class, 'search'])->name('bussinessObject.search');
    Route::resource('bussinessObject', App\Http\Controllers\PublishedIssController::class);

    Route::get('contract', [App\Http\Controllers\ContractController::class, 'index'])->name('contract.index');
    Route::get('contract/search', [App\Http\Controllers\ContractController::class, 'search'])->name('contract.search');
    Route::resource('contract', App\Http\Controllers\ContractController::class);
    
    Route::get('integration', [App\Http\Controllers\IntegrationController::class, 'index'])->name('integration.index');
    Route::get('integration/search', [App\Http\Controllers\IntegrationController::class, 'search'])->name('integration.search');
    Route::resource('integration', App\Http\Controllers\IntegrationController::class);
    
    Route::get('equipment', [App\Http\Controllers\EquipmentController::class, 'index'])->name('equipment.index');
    Route::get('equipment/search', [App\Http\Controllers\EquipmentController::class, 'search'])->name('equipment.search');
    Route::resource('equipment', App\Http\Controllers\EquipmentController::class);

    Route::get('informationResources', [App\Http\Controllers\InformationResourcesController::class, 'index'])->name('informationResources.index');
    Route::get('informationResources/search', [App\Http\Controllers\InformationResourcesController::class, 'search'])->name('informationResources.search');
    Route::resource('informationResources', App\Http\Controllers\InformationResourcesController::class);

    Route::get('license', [App\Http\Controllers\LicenseController::class, 'index'])->name('license.index');
    Route::get('license/search', [App\Http\Controllers\LicenseController::class, 'search'])->name('license.search');
    Route::resource('license', App\Http\Controllers\LicenseController::class);


    Route::post('/datacatalog/getis', [App\Http\Controllers\DataCatalogController::class, 'getis'])->name('datacatalog.getis');
    Route::get('/datacatalog/draft', [App\Http\Controllers\DataCatalogController::class, 'draft'])->name('datacatalog.draft');
    Route::get('/datacatalog/outbox', [App\Http\Controllers\DataCatalogController::class, 'outbox'])->name('datacatalog.outbox');
    Route::get('/datacatalog/signing/{id}/edit', [App\Http\Controllers\DataCatalogController::class, 'signingedit'])->name('datacatalog.signingedit');
    Route::get('/datacatalog/signing', [App\Http\Controllers\DataCatalogController::class, 'signing'])->name('datacatalog.signing');
    Route::get('/datacatalog/agreement/{id}/edit', [App\Http\Controllers\DataCatalogController::class, 'agreementedit'])->name('datacatalog.agreementedit');
    Route::get('/datacatalog/agreement', [App\Http\Controllers\DataCatalogController::class, 'agreement'])->name('datacatalog.agreement');
    Route::resource('datacatalog', App\Http\Controllers\DataCatalogController::class);


    Route::get('/administrator/search', [App\Http\Controllers\AdministratorController::class, 'search'])->name('administrator.user.search');
    Route::get('/administrator/passport', [App\Http\Controllers\AdministratorController::class, 'passport'])->name('administrator.passport');
    Route::get('/administrator/uchet', [App\Http\Controllers\AdministratorController::class, 'uchet'])->name('administrator.uchet');
    Route::get('/administrator/uchet/{id}', [App\Http\Controllers\AdministratorController::class, 'uchet_edit'])->name('administrator.uchet_edit');
    Route::resource('administrator', App\Http\Controllers\AdministratorController::class);

    Route::resource('profile', App\Http\Controllers\ProfileController::class);

    Route::resource('reestr', App\Http\Controllers\ReestrController::class);

    Route::get('businessprocess/edit_bp/{id}', [App\Http\Controllers\BusinessProcessController::class, 'edit_bp'])->name('businessprocess.edit_bp');
    Route::get('businessprocess/create_bp/{id}', [App\Http\Controllers\BusinessProcessController::class, 'create_bp'])->name('businessprocess.create_bp');
    Route::get('businessprocess/roadmaps', [App\Http\Controllers\BusinessProcessController::class, 'roadmaps'])->name('businessprocess.roadmaps');
    Route::resource('businessprocess', App\Http\Controllers\BusinessProcessController::class);
    
    Route::get('expertise/outbox', [App\Http\Controllers\ExpertisesController::class, 'outbox'])->name('expertise.outbox');
    // Route::get('expertise/approve/info/{id}', [App\Http\Controllers\ExpertisesController::class, 'approve_info'])->name('expertise.approve.info');
    Route::get('expertise/approve/info/{id}/{version_id?}', [App\Http\Controllers\ExpertisesController::class, 'approve_info'])->name('expertise.approve.info');
    // Route::get('/export-passport', [App\Http\Controllers\ExpertisesController::class, 'exportPassport'])->name('export.passport');


    // Route::get('expertise/approve/info/{id}/{version_id}', [App\Http\Controllers\ExpertisesController::class, 'approve_info'])->name('expertise.approve.info');

    Route::post('expertise/approve/signecp', [App\Http\Controllers\ExpertisesController::class, 'approve_signecp'])->name('expertise.approve.signecp');
    Route::post('expertise/approve/approve_go', [App\Http\Controllers\ExpertisesController::class, 'approve_go'])->name('expertise.approve.approve_go');
    Route::post('expertise/approve/approve_si_reviewer', [App\Http\Controllers\ExpertisesController::class, 'approve_si_reviewer'])->name('expertise.approve.approve_si_reviewer');
    Route::post('expertise/approve/send_uo_reviewer', [App\Http\Controllers\ExpertisesController::class, 'send_uo_reviewer'])->name('expertise.approve.send_uo_reviewer');
    Route::post('expertise/approve/accept_uo_reviewer', [App\Http\Controllers\ExpertisesController::class, 'accept_uo_reviewer'])->name('expertise.approve.accept_uo_reviewer');
    Route::post('expertise/approve/sendToConfirmers', [App\Http\Controllers\ExpertisesController::class, 'sendToConfirmers'])->name('expertise.approve.sendToConfirmers');
    Route::post('expertise/approve/accept_si_confirmer_first', [App\Http\Controllers\ExpertisesController::class, 'accept_si_confirmer_first'])->name('expertise.approve.accept_si_confirmer_first');
    Route::post('expertise/approve/accept_si_confirmer_second', [App\Http\Controllers\ExpertisesController::class, 'accept_si_confirmer_second'])->name('expertise.approve.accept_si_confirmer_second');
    Route::post('expertise/approve/accept_gts_reviewer', [App\Http\Controllers\ExpertisesController::class, 'accept_gts_reviewer'])->name('expertise.approve.accept_gts_reviewer');
    Route::post('expertise/approve/accept_gts_confirmer', [App\Http\Controllers\ExpertisesController::class, 'accept_gts_confirmer'])->name('expertise.approve.accept_gts_confirmer');
    Route::post('expertise/approve/accept_si_signer', [App\Http\Controllers\ExpertisesController::class, 'accept_si_signer'])->name('expertise.approve.accept_si_signer');
    Route::post('expertise/approve/accept_gts_signer', [App\Http\Controllers\ExpertisesController::class, 'accept_gts_signer'])->name('expertise.approve.accept_gts_signer');
    Route::post('expertise/approve/accept_uo_reviewer_concl', [App\Http\Controllers\ExpertisesController::class, 'accept_uo_reviewer_concl'])->name('expertise.approve.accept_uo_reviewer_concl');
    Route::post('expertise/approve/accept_uo_confirmer', [App\Http\Controllers\ExpertisesController::class, 'accept_uo_confirmer'])->name('expertise.approve.accept_uo_confirmer');
    Route::post('expertise/approve/accept_uo_confirm', [App\Http\Controllers\ExpertisesController::class, 'accept_uo_confirm'])->name('expertise.approve.accept_uo_confirm');
    Route::post('expertise/approve/accept_uo_signer', [App\Http\Controllers\ExpertisesController::class, 'accept_uo_signer'])->name('expertise.approve.accept_uo_signer');

    Route::get('expertise/approve', [App\Http\Controllers\ExpertisesController::class, 'approve'])->name('expertise.approve');
    Route::get('expertise/draft', [App\Http\Controllers\ExpertisesController::class, 'draft'])->name('expertise.draft');
    Route::get('expertise/got_job', [App\Http\Controllers\ExpertisesController::class, 'got_job'])->name('expertise.got_job');
    Route::get('expertise/in_work', [App\Http\Controllers\ExpertisesController::class, 'in_work'])->name('expertise.in_work');
    Route::get('expertise/approve_confirmers', [App\Http\Controllers\ExpertisesController::class, 'approve_confirmers'])->name('expertise.approve_confirmers');
    Route::get('expertise/executor', [App\Http\Controllers\ExpertisesController::class, 'executor'])->name('expertise.executor');
    Route::get('expertise/goExecutor', [App\Http\Controllers\ExpertisesController::class, 'goExecutor'])->name('expertise.goExecutor');
    Route::get('expertise/signer_outbox', [App\Http\Controllers\ExpertisesController::class, 'signer_outbox'])->name('expertise.signer_outbox');
    Route::post('expertise/signing/export', [App\Http\Controllers\ExpertisesController::class, 'export'])->name('expertise.signing.export');
    Route::post('expertise/signing/signecp', [App\Http\Controllers\ExpertisesController::class, 'signecp'])->name('expertise.signing.signecp');
    Route::get('expertise/signing/info/{id}', [App\Http\Controllers\ExpertisesController::class, 'info'])->name('expertise.signing.info');
    Route::get('expertise/signing', [App\Http\Controllers\ExpertisesController::class, 'signing'])->name('expertise.signing');
    Route::get('expertise/create_it_project', [App\Http\Controllers\ExpertisesController::class, 'create_it_project'])->name('expertise.create_it_project');
    Route::get('/expertise/create_version/{expertise}', [App\Http\Controllers\ExpertisesController::class, 'createVersion'])->name('expertise.create_version');
    Route::get('/expertise/create_new_version/{expertise}', [App\Http\Controllers\ExpertisesController::class, 'createNewVersion'])->name('expertise.create_new_version');
    Route::get('/export-expertise/{type}', [App\Http\Controllers\ExpertisesController::class, 'exportExpertise'])->name('export.expertise');
    

    Route::resource('expertise', App\Http\Controllers\ExpertisesController::class);

    Route::get('reports/search', [App\Http\Controllers\ReportsController::class, 'search'])->name('reports.search');
    Route::resource('reports', App\Http\Controllers\ReportsController::class);

    Route::resource('grades', App\Http\Controllers\GradesController::class);

    Route::post('etalondatas/signing/signecp', [App\Http\Controllers\EtalonDatasController::class, 'signecp'])->name('etalondatas.signing.signecp');
    Route::get('etalondatas/signing', [App\Http\Controllers\EtalonDatasController::class, 'signing'])->name('etalondatas.signing');
    Route::post('etalondatas/agreement/signecpgo', [App\Http\Controllers\EtalonDatasController::class, 'signecpgo'])->name('etalondatas.agreement.signecpgo');
    Route::get('etalondatas/agreement', [App\Http\Controllers\EtalonDatasController::class, 'agreement'])->name('etalondatas.agreement');
    Route::post('etalondatas/getinfogo', [App\Http\Controllers\EtalonDatasController::class, 'getinfogo'])->name('etalondatas.getinfogo');
    Route::post('etalondatas/getinfo', [App\Http\Controllers\EtalonDatasController::class, 'getinfo'])->name('etalondatas.getinfo');
    Route::get('etalondatas/build', [App\Http\Controllers\EtalonDatasController::class, 'build'])->name('etalondatas.build');
    Route::resource('etalondatas', App\Http\Controllers\EtalonDatasController::class);


    Route::get('api/infosys', [App\Http\Controllers\GradesController::class, 'infosys'])->name('api.infosys');




    // Роуты для операторов
    Route::middleware(['role:operator'])->group( function () {

    });

});