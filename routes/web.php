<?php
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\FormSubmissionController;
use App\Http\Controllers\InstrumenController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PengumumanController;
// use App\Http\Controllers\PengurusanProfilPenggunaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Integration\IdmeController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('test-ts', [App\Http\Controllers\TestController::class, 'updateTimesheet']);
// Route::get('test-chart', [FinanceController::class, 'manpowerChart']);

// Route::get('/', function () {
//     return redirect()->route('login');
// });


Route::get('/', [LandingPageController::class, 'index'])->name('landing_page');
// Route::post('checkdaerah', [LandingPageController::class, 'checkDaerah'])->name('admin.internal.checkdaerah');
// Route::get('pengguna-baru', [LandingPageController::class, 'viewForm'])->name('admin.internal.penggunaform');
Route::post('simpan-pengguna', [LandingPageController::class, 'savePengguna'])->name('penggunasave');
// Route::get('senarai-pengguna', [LandingPageController::class, 'listPengguna'])->name('admin.internal.penggunalist');
// Route::post('lihat-pengguna/{id}/{type}', [LandingPageController::class, 'viewPengguna'])->name('admin.internal.viewpengguna');
// Route::get('penilai-baru', [LandingPageController::class, 'viewFormPenilai'])->name('admin.internal.penilaiform');
Route::post('simpan-penilai', [LandingPageController::class, 'savePenilai'])->name('penilaisave');
// Route::get('senarai-penilai', [LandingPageController::class, 'listPenilai'])->name('admin.internal.penilailist');
// Route::post('lihat-penilai/{id}/{type}', [LandingPageController::class, 'viewPenilai'])->name('admin.internal.viewpenilai');
// Route::get('create-agensi', [LandingPageController::class, 'viewFormAgensi'])->name('admin.internal.agensiform');
 Route::post('saveagensi', [LandingPageController::class, 'saveAgensi'])->name('agensisave');
// Route::get('senarai-agensi', [LandingPageController::class, 'listAgensi'])->name('admin.internal.agensilist');
// Route::post('viewagensi/{id}/{type}', [LandingPageController::class, 'viewAgensi'])->name('admin.internal.viewagensi');
// Route::get('create-jawatankuasa', [LandingPageController::class, 'viewFormJawatankuasa'])->name('admin.internal.jawatankuasaform');
 Route::post('savejawatankuasa', [LandingPageController::class, 'saveJawatankuasa'])->name('jawatankuasasave');
// Route::get('senarai-jawatankuasa', [LandingPageController::class, 'listJawatankuasa'])->name('admin.internal.jawatankuasalist');
// Route::post('viewjawatankuasa/{id}/{type}', [LandingPageController::class, 'viewJawatankuasa'])->name('admin.internal.viewjawatankuasa');
// Route::get('create-jawatankuasatertinggi', [LandingPageController::class, 'viewFormJawatankuasatertinggi'])->name('admin.internal.jawatankuasatertinggiform');
 Route::post('savejawatankuasatertinggi', [LandingPageController::class, 'saveJawatankuasatertinggi'])->name('jawatankuasatertinggisave');
// Route::get('senarai-jawatankuasatertinggi', [LandingPageController::class, 'listJawatankuasatertinggi'])->name('admin.internal.jawatankuasatertinggilist');
// Route::post('viewjawatankuasatertinggi/{id}/{type}', [LandingPageController::class, 'viewJawatankuasatertinggi'])->name('admin.internal.viewjawatankuasatertinggi');
// Route::get('create-pengetua', [LandingPageController::class, 'viewFormPengetua'])->name('admin.internal.pengetuaform');
// Route::post('savepengetua', [LandingPageController::class, 'savePengetua'])->name('admin.internal.pengetuasave');
// Route::get('senarai-pengetua', [LandingPageController::class, 'listPengetua'])->name('admin.internal.pengetualist');
// Route::post('viewpengetua/{id}/{type}', [LandingPageController::class, 'viewPengetua'])->name('admin.internal.viewpengetua');
// Route::get('create-jurulatih', [LandingPageController::class, 'viewFormJurulatih'])->name('admin.internal.jurulatihform');
Route::post('savejurulatih', [LandingPageController::class, 'saveJurulatih'])->name('jurulatihsave');
// Route::get('senarai-jurulatih', [LandingPageController::class, 'listJurulatih'])->name('admin.internal.jurulatihlist');
// Route::post('viewjurulatih/{id}/{type}', [LandingPageController::class, 'viewJurulatih'])->name('admin.internal.viewjurulatih');
// Route::get('download/{id}/{name}', [LandingPageController::class, 'download'])->name('jurulatih-download');



Route::get('emptyresponse', function () {
    return response()->json(['title' => ' ']);
})->name('emptyResponse');

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Auth::routes();
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout.get');

Route::prefix('profile')->group(function () {
    Route::get('view', [App\Http\Controllers\ProfileController::class, 'view'])->name('profile-view');
    Route::post('update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile-update');
});

Route::controller(UserProfileController::class)->group(function () {
    Route::prefix('user-profile')->group(function () {
        Route::get('user_profile', 'viewUserProfile')->name('user_profile');
    });
});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::prefix('profile')->group(function () {
        Route::post('update', 'update')->name('update_password');
    });
});

Route::prefix('admin')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('client', ClientController::class);
    Route::post('/project-updateReportTypes', [ProjectController::class, 'updateReportTypes'])->name('project.updateReportTypes');

    Route::controller(UserController::class)->group(function () {
        Route::get('internalUser', 'index')->name('admin.internalUser');
        Route::get('externalUser', 'index')->name('admin.externalUser');
        Route::get('getUser/{userId}', 'getUser')->name('user.getUser');
    });

    Route::get('edit/{roleId}', [RoleController::class, 'getRole'])->name('role.edit');
    Route::get('role/get-sub-modul/{type}', [RoleController::class, 'getSubModul'])->name('role.get-sub-modul');
    Route::get('role/get-peranan/{type}', [RoleController::class, 'getPeranan'])->name('role.get-peranan');

    Route::prefix('settings')->group(function () {
        Route::controller(SettingsController::class)->group(function () {
            Route::get('/', 'index')->name('settings.index');
            Route::post('/', 'update')->name('admin.settings');
            Route::post('picture/{filename}', 'picture')->name('settings.picture');

            Route::prefix('save')->group(function () {
                Route::post('/', 'settings_save')->name('admin.settings.save');
            });

            Route::prefix('checkemail')->group(function () {
                Route::post('/', 'checkEmail')->name('admin.settings.checkemail');
            });
        });
    });

    Route::prefix('log')->group(function () {
        Route::controller(SettingsController::class)->group(function () {
            Route::get('index', 'index')->name('admin-log-index');
            Route::get('view/{logID}', 'view')->name('admin-log-view');
        });
    });
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// update the routes later
Route::controller(FormSubmissionController::class)->group(function () {
    Route::prefix('dynamic')->group(function () {
        Route::get('form', 'index')->name('create-form');
        Route::get('fillform', 'fillform')->name('fillform');
        Route::get('listfillform', 'listFillForm')->name('listfillform');
        Route::post('viewform/{id}', 'viewform')->name('viewform');
        Route::get('download/{id}/{name}', 'download')->name('download');

        Route::post('choose-form', 'chooseForm')->name('choose-form');
        Route::post('form-submit', 'formSubmit')->name('form-submit');
        Route::post('input-field', 'inputdata')->name('input-field');
        Route::post('saveform', 'saveform')->name('saveform');
        Route::post('checkname', 'checkname')->name('checkname');
    });
});

//Cron View
Route::prefix('cron_view')->group(function () {
    Route::get('CronView', [CronViewController::class, 'index'])->name('admin.cron_view.CronView');
});
Route::prefix('master_data')->group(function () {
    Route::get('parameter', [MasterDataController::class, 'parameter'])->name('admin.master_data.parameter');
    Route::get('Runningnumber', [MasterDataController::class, 'RunningNoList'])->name('admin.master_data.Runningnumber');
});

// update the routes later
Route::prefix('dynamic')->middleware(['web'])->group(function () {
    Route::get('/form', [FormSubmissionController::class, 'index'])->name('create-form');

    Route::get('form/list', [FormSubmissionController::class, 'showDynamicFormList'])->name('dynamic-form-list');
    Route::post('viewFormInput/{id}', [FormSubmissionController::class, 'viewFormInput'])->name('view-form-input');

    Route::get('fillform', [FormSubmissionController::class, 'fillform'])->name('fillform');
    Route::get('listfillform', [FormSubmissionController::class, 'listFillForm'])->name('listfillform');
    Route::post('viewform/{id}', [FormSubmissionController::class, 'viewform'])->name('viewform');
    Route::get('/download/{id}/{name}', [FormSubmissionController::class, 'download'])->name('download');

    Route::post('choose-form', [FormSubmissionController::class, 'chooseForm'])->name('choose-form');
    Route::post('form-submit', [FormSubmissionController::class, 'formSubmit'])->name('form-submit');
    Route::post('input-field', [FormSubmissionController::class, 'inputdata'])->name('input-field');
    Route::post('saveform', [FormSubmissionController::class, 'saveform'])->name('saveform');
    Route::post('checkname', [FormSubmissionController::class, 'checkname'])->name('checkname');
    Route::post('verify', [FormSubmissionController::class, 'verify'])->name('verify');
    Route::post('preview-form', [FormSubmissionController::class, 'previewForm'])->name('preview-form');
});

include 'sppip.php';
include 'ikeps.php';
include 'skips.php';
include 'skpak.php';
include 'spks.php';

Route::controller(ModuleController::class)->prefix('module')->middleware(['web'])->group(function () {

    Route::get('', 'index')->name('module.index');
    Route::get('create', 'create')->name('module.create');
    Route::get('edit/{id}', 'edit')->name('module.edit');
    Route::post('update/{id}', 'update')->name('module.update');
    Route::delete('destroy/{id}', 'destroy')->name('module.destroy');

    Route::get('refreshModuleRoleTable/{module}', 'refreshModuleRoleTable')->name('module.refreshModuleRoleTable');
    Route::get('getModuleRole/{moduleRole?}', 'getModuleRole')->name('module.getModuleRole');
    Route::post('updateRoleForm', 'updateRoleForm')->name('module.updateRoleForm');
    Route::post('deleteRole', 'deleteRole')->name('module.deleteRole');

    Route::get('refreshModuleTab2/{module}', 'refreshModuleTab2')->name('module.refreshModuleTab2');
    Route::get('refreshModuleStatusTable/{module}', 'refreshModuleStatusTable')->name('module.refreshModuleStatusTable');
    Route::get('getModuleStatus/{moduleStatus?}', 'getModuleStatus')->name('module.getModuleStatus');
    Route::post('updateStatusForm', 'updateStatusForm')->name('module.updateStatusForm');
    Route::post('deleteStatus', 'deleteStatus')->name('module.deleteStatus');

    Route::get('refreshModulePermissionTable/{module}', 'refreshModulePermissionTable')->name('module.refreshModulePermissionTable');
    Route::get('getModulePermission/{modulePermission?}', 'getModulePermission')->name('module.getModulePermission');
    Route::post('updatePermissionForm', 'updatePermissionForm')->name('module.updatePermissionForm');
    Route::post('deletePermission', 'deletePermission')->name('module.deletePermission');

    Route::get('getModuleTaskForm/{moduleRole?}', 'getModuleTaskForm')->name('module.getModuleTaskForm');
    Route::post('updateTaskForm', 'updateTaskForm')->name('module.updateTaskForm');

    Route::get('refreshModuleTab3/{module}', 'refreshModuleTab3')->name('module.refreshModuleTab3');
    Route::get('refreshFlowManagementTable/{module}', 'refreshFlowManagementTable')->name('module.refreshFlowManagementTable');
    Route::post('updateFlowManagement', 'updateFlowManagement')->name('module.updateFlowManagement');
    Route::post('deleteFlowManagement', 'deleteFlowManagement')->name('module.deleteFlowManagement');
    Route::post('viewModuleTypes', 'viewModuleTypes')->name('module.viewModuleTypes');

});
/*
//pengurusan controller
Route::controller(PengurusanProfilPenggunaController::class)->prefix('pengguna-dalaman')->middleware(['web'])->group(function () {
    Route::post('checkdaerah', 'checkDaerah')->name('admin.internal.checkdaerah');

    Route::get('pengguna-baru', 'viewForm')->name('admin.internal.penggunaform');
    Route::post('simpan-pengguna', 'savePengguna')->name('admin.internal.penggunasave');
    Route::get('senarai-pengguna', 'listPengguna')->name('admin.internal.penggunalist');
    Route::post('lihat-pengguna/{id}/{type}', 'viewPengguna')->name('admin.internal.viewpengguna');

    Route::get('penilai-baru', 'viewFormPenilai')->name('admin.internal.penilaiform');
    Route::post('simpan-penilai', 'savePenilai')->name('admin.internal.penilaisave');
    Route::get('senarai-penilai', 'listPenilai')->name('admin.internal.penilailist');
    Route::post('lihat-penilai/{id}/{type}', 'viewPenilai')->name('admin.internal.viewpenilai');
    // Route::post('viewpenilai/{id}/{type}','viewPenilai')->name('admin.internal.viewpenilai');

    Route::get('create-agensi', 'viewFormAgensi')->name('admin.internal.agensiform');
    Route::post('saveagensi', 'saveAgensi')->name('admin.internal.agensisave');
    Route::get('senarai-agensi', 'listAgensi')->name('admin.internal.agensilist');
    Route::post('viewagensi/{id}/{type}', 'viewAgensi')->name('admin.internal.viewagensi');

    Route::get('create-jawatankuasa', 'viewFormJawatankuasa')->name('admin.internal.jawatankuasaform');
    Route::post('savejawatankuasa', 'saveJawatankuasa')->name('admin.internal.jawatankuasasave');
    Route::get('senarai-jawatankuasa', 'listJawatankuasa')->name('admin.internal.jawatankuasalist');
    Route::post('viewjawatankuasa/{id}/{type}', 'viewJawatankuasa')->name('admin.internal.viewjawatankuasa');

    Route::get('create-jawatankuasatertinggi', 'viewFormJawatankuasatertinggi')->name('admin.internal.jawatankuasatertinggiform');
    Route::post('savejawatankuasatertinggi', 'saveJawatankuasatertinggi')->name('admin.internal.jawatankuasatertinggisave');
    Route::get('senarai-jawatankuasatertinggi', 'listJawatankuasatertinggi')->name('admin.internal.jawatankuasatertinggilist');
    Route::post('viewjawatankuasatertinggi/{id}/{type}', 'viewJawatankuasatertinggi')->name('admin.internal.viewjawatankuasatertinggi');

    Route::get('create-pengetua', 'viewFormPengetua')->name('admin.internal.pengetuaform');
    Route::post('savepengetua', 'savePengetua')->name('admin.internal.pengetuasave');
    Route::get('senarai-pengetua', 'listPengetua')->name('admin.internal.pengetualist');
    Route::post('viewpengetua/{id}/{type}', 'viewPengetua')->name('admin.internal.viewpengetua');

    Route::get('create-jurulatih', 'viewFormJurulatih')->name('admin.internal.jurulatihform');
    Route::post('savejurulatih', 'saveJurulatih')->name('admin.internal.jurulatihsave');
    Route::get('senarai-jurulatih', 'listJurulatih')->name('admin.internal.jurulatihlist');
    Route::post('viewjurulatih/{id}/{type}', 'viewJurulatih')->name('admin.internal.viewjurulatih');

    Route::get('download/{id}/{name}', 'download')->name('jurulatih-download');

});
*/



// Define routes without prefix and middleware
/*
Route::prefix('admin/internal')->group(function () {
    

    Route::post('checkdaerah', [PengurusanProfilPenggunaUmumController::class, 'checkDaerah'])->name('admin.internal.checkdaerah');

    Route::get('pengguna-baru', [PengurusanProfilPenggunaUmumController::class, 'viewForm'])->name('admin.internal.penggunaform');
    Route::post('simpan-pengguna', [PengurusanProfilPenggunaUmumController::class, 'savePengguna'])->name('admin.internal.penggunasave');
    Route::get('senarai-pengguna', [PengurusanProfilPenggunaUmumController::class, 'listPengguna'])->name('admin.internal.penggunalist');
    Route::post('lihat-pengguna/{id}/{type}', [PengurusanProfilPenggunaUmumController::class, 'viewPengguna'])->name('admin.internal.viewpengguna');

    Route::get('penilai-baru', [PengurusanProfilPenggunaUmumController::class, 'viewFormPenilai'])->name('admin.internal.penilaiform');
    Route::post('simpan-penilai', [PengurusanProfilPenggunaUmumController::class, 'savePenilai'])->name('admin.internal.penilaisave');
    Route::get('senarai-penilai', [PengurusanProfilPenggunaUmumController::class, 'listPenilai'])->name('admin.internal.penilailist');
    Route::post('lihat-penilai/{id}/{type}', [PengurusanProfilPenggunaUmumController::class, 'viewPenilai'])->name('admin.internal.viewpenilai');

    Route::get('create-agensi', [PengurusanProfilPenggunaUmumController::class, 'viewFormAgensi'])->name('admin.internal.agensiform');
    Route::post('saveagensi', [PengurusanProfilPenggunaUmumController::class, 'saveAgensi'])->name('admin.internal.agensisave');
    Route::get('senarai-agensi', [PengurusanProfilPenggunaUmumController::class, 'listAgensi'])->name('admin.internal.agensilist');
    Route::post('viewagensi/{id}/{type}', [PengurusanProfilPenggunaUmumController::class, 'viewAgensi'])->name('admin.internal.viewagensi');

    Route::get('create-jawatankuasa', [PengurusanProfilPenggunaUmumController::class, 'viewFormJawatankuasa'])->name('admin.internal.jawatankuasaform');
    Route::post('savejawatankuasa', [PengurusanProfilPenggunaUmumController::class, 'saveJawatankuasa'])->name('admin.internal.jawatankuasasave');
    Route::get('senarai-jawatankuasa', [PengurusanProfilPenggunaUmumController::class, 'listJawatankuasa'])->name('admin.internal.jawatankuasalist');
    Route::post('viewjawatankuasa/{id}/{type}', [PengurusanProfilPenggunaUmumController::class, 'viewJawatankuasa'])->name('admin.internal.viewjawatankuasa');

    Route::get('create-jawatankuasatertinggi', [PengurusanProfilPenggunaUmumController::class, 'viewFormJawatankuasatertinggi'])->name('admin.internal.jawatankuasatertinggiform');
    Route::post('savejawatankuasatertinggi', [PengurusanProfilPenggunaUmumController::class, 'saveJawatankuasatertinggi'])->name('admin.internal.jawatankuasatertinggisave');
    Route::get('senarai-jawatankuasatertinggi', [PengurusanProfilPenggunaUmumController::class, 'listJawatankuasatertinggi'])->name('admin.internal.jawatankuasatertinggilist');
    Route::post('viewjawatankuasatertinggi/{id}/{type}', [PengurusanProfilPenggunaUmumController::class, 'viewJawatankuasatertinggi'])->name('admin.internal.viewjawatankuasatertinggi');

    Route::get('create-pengetua', [PengurusanProfilPenggunaUmumController::class, 'viewFormPengetua'])->name('admin.internal.pengetuaform');
    Route::post('savepengetua', [PengurusanProfilPenggunaUmumController::class, 'savePengetua'])->name('admin.internal.pengetuasave');
    Route::get('senarai-pengetua', [PengurusanProfilPenggunaUmumController::class, 'listPengetua'])->name('admin.internal.pengetualist');
    Route::post('viewpengetua/{id}/{type}', [PengurusanProfilPenggunaUmumController::class, 'viewPengetua'])->name('admin.internal.viewpengetua');

    Route::get('create-jurulatih', [PengurusanProfilPenggunaUmumController::class, 'viewFormJurulatih'])->name('admin.internal.jurulatihform');
    Route::post('savejurulatih', [PengurusanProfilPenggunaUmumController::class, 'saveJurulatih'])->name('admin.internal.jurulatihsave');
    Route::get('senarai-jurulatih', [PengurusanProfilPenggunaUmumController::class, 'listJurulatih'])->name('admin.internal.jurulatihlist');
    Route::post('viewjurulatih/{id}/{type}', [PengurusanProfilPenggunaUmumController::class, 'viewJurulatih'])->name('admin.internal.viewjurulatih');

    Route::get('download/{id}/{name}', [PengurusanProfilPenggunaUmumController::class, 'download'])->name('jurulatih-download');
});

Route::post('checkdaerah', 'PengurusanProfilPenggunaUmumController@checkDaerah')->name('admin.internal.checkdaerah');

Route::get('pengguna-baru', 'PengurusanProfilPenggunaUmumController@viewForm')->name('admin.internal.penggunaform');
Route::post('simpan-pengguna', 'PengurusanProfilPenggunaUmumController@savePengguna')->name('admin.internal.penggunasave');
Route::get('senarai-pengguna', 'PengurusanProfilPenggunaUmumController@listPengguna')->name('admin.internal.penggunalist');
Route::post('lihat-pengguna/{id}/{type}', 'PengurusanProfilPenggunaUmumController@viewPengguna')->name('admin.internal.viewpengguna');

Route::get('penilai-baru', 'PengurusanProfilPenggunaUmumController@viewFormPenilai')->name('admin.internal.penilaiform');
Route::post('simpan-penilai', 'PengurusanProfilPenggunaUmumController@savePenilai')->name('admin.internal.penilaisave');
Route::get('senarai-penilai', 'PengurusanProfilPenggunaUmumController@listPenilai')->name('admin.internal.penilailist');
Route::post('lihat-penilai/{id}/{type}', 'PengurusanProfilPenggunaUmumController@viewPenilai')->name('admin.internal.viewpenilai');

Route::get('create-agensi', 'PengurusanProfilPenggunaUmumController@viewFormAgensi')->name('admin.internal.agensiform');
Route::post('saveagensi', 'PengurusanProfilPenggunaUmumController@saveAgensi')->name('admin.internal.agensisave');
Route::get('senarai-agensi', 'PengurusanProfilPenggunaUmumController@listAgensi')->name('admin.internal.agensilist');
Route::post('viewagensi/{id}/{type}', 'PengurusanProfilPenggunaUmumController@viewAgensi')->name('admin.internal.viewagensi');

Route::get('create-jawatankuasa', 'PengurusanProfilPenggunaUmumController@viewFormJawatankuasa')->name('admin.internal.jawatankuasaform');
Route::post('savejawatankuasa', 'PengurusanProfilPenggunaUmumController@saveJawatankuasa')->name('admin.internal.jawatankuasasave');
Route::get('senarai-jawatankuasa', 'PengurusanProfilPenggunaUmumController@listJawatankuasa')->name('admin.internal.jawatankuasalist');
Route::post('viewjawatankuasa/{id}/{type}', 'PengurusanProfilPenggunaUmumController@viewJawatankuasa')->name('admin.internal.viewjawatankuasa');

Route::get('create-jawatankuasatertinggi', 'PengurusanProfilPenggunaUmumController@viewFormJawatankuasatertinggi')->name('admin.internal.jawatankuasatertinggiform');
Route::post('savejawatankuasatertinggi', 'PengurusanProfilPenggunaUmumController@saveJawatankuasatertinggi')->name('admin.internal.jawatankuasatertinggisave');
Route::get('senarai-jawatankuasatertinggi', 'PengurusanProfilPenggunaUmumController@listJawatankuasatertinggi')->name('admin.internal.jawatankuasatertinggilist');
Route::post('viewjawatankuasatertinggi/{id}/{type}', 'PengurusanProfilPenggunaUmumController@viewJawatankuasatertinggi')->name('admin.internal.viewjawatankuasatertinggi');

Route::get('create-pengetua', 'PengurusanProfilPenggunaUmumController@viewFormPengetua')->name('admin.internal.pengetuaform');
Route::post('savepengetua', 'PengurusanProfilPenggunaUmumController@savePengetua')->name('admin.internal.pengetuasave');
Route::get('senarai-pengetua', 'PengurusanProfilPenggunaUmumController@listPengetua')->name('admin.internal.pengetualist');
Route::post('viewpengetua/{id}/{type}', 'PengurusanProfilPenggunaUmumController@viewPengetua')->name('admin.internal.viewpengetua');

Route::get('create-jurulatih', 'PengurusanProfilPenggunaUmumController@viewFormJurulatih')->name('admin.internal.jurulatihform');
Route::post('savejurulatih', 'PengurusanProfilPenggunaUmumController@saveJurulatih')->name('admin.internal.jurulatihsave');
Route::get('senarai-jurulatih', 'PengurusanProfilPenggunaUmumController@listJurulatih')->name('admin.internal.jurulatihlist');
Route::post('viewjurulatih/{id}/{type}', 'PengurusanProfilPenggunaUmumController@viewJurulatih')->name('admin.internal.viewjurulatih');

Route::get('download/{id}/{name}', 'PengurusanProfilPenggunaUmumController@download')->name('jurulatih-download');
*/

// instrumen controller

//pengurusan controller
Route::controller(InstrumenController::class)->prefix('instrumen')->middleware(['web'])->group(function () {
    Route::get('tambah/{type}/{model?}','viewForm')->name('admin.instrumen.form');
    Route::post('instrumenikeps-submit','saveIkeps')->name('admin.instrumen.instrumenikeps-submit');
    Route::get('instrumenikeps-list','listInstrumenIkeps')->name('admin.instrumen.instrumenikeps-list');
    Route::post('instrumenikeps-view/{id}/{type}','viewInstrumenIkeps')->name('admin.instrumen.instrumenikeps-view');
    Route::post('configuation-view/{id}/{type}','viewConfiguration')->name('admin.instrumen.configuration-view');

    Route::post('tetapan-aspek-submit', 'saveAspek')->name('admin.instrumen.tetapan-aspek-submit');
    Route::post('tetapan-aspek-view/{id}/{type}', 'viewTetapanAspek')->name('admin.instrumen.tetapan-aspek-view');

    Route::get('tetapan-aspek-sub-list', 'listTetapanAspek')->name('admin.instrumen.tetapan-aspek-sub-list');
    // item
    Route::post('tetapan-item-submit', 'saveItem')->name('admin.instrumen.tetapan-item-submit');
    Route::get('tetapan-item-list', 'listTetapanItem')->name('admin.instrumen.tetapan-item-list');
    Route::get('tetapan-item-sub-list', 'listTetapanItem')->name('admin.instrumen.tetapan-item-sub-list');
    Route::post('tetapan-item-view/{id}/{type}', 'viewTetapanItem')->name('admin.instrumen.tetapan-item-view');

    Route::get('senarai-sedia-ada', 'listSediaAda')->name('admin.instrumen.senarai-sedia-ada');

    Route::get('tambah-skips', 'tambahSkips')->name('admin.instrumen.tambah-skips');
    Route::get('senarai-skips', 'listSkips')->name('admin.instrumen.senarai-skips');
    Route::post('instrumenskips-submit', 'saveSkips')->name('admin.instrumen.instrumenskips-submit');
    //skap
    Route::get('tambah-skpak', 'tambahSkpak')->name('admin.instrumen.tambah-skpak');
    Route::get('senarai-skpak', 'listSkpak')->name('admin.instrumen.senarai-skpak');
    Route::post('instrumenskpak-submit', 'saveSkpak')->name('admin.instrumen.instrumenskpak-submit');
    //spks
    Route::get('tambah-spks', 'tambahSpks')->name('admin.instrumen.tambah-spks');
    Route::get('senarai-spks', 'listSpks')->name('admin.instrumen.senarai-spks');
    Route::post('instrumenspks-submit', 'saveSpks')->name('admin.instrumen.instrumenspks-submit');

});

Route::controller(InstrumenController::class)->prefix('ikeps')->middleware(['web'])->group(function () {
    Route::get('tetapan-aspek-list', 'listTetapanAspek')->name('admin.instrumen.tetapan-aspek-list');
    Route::get('tetapan-aspek-ikeps-list', 'listTetapanAspek')->name('admin.instrumen.tetapan-aspek-ikeps-list');
    Route::get('tetapan-tarikh-list', 'listTetapanTarikh')->name('admin.instrumen.tetapan-tarikh-list');
    Route::get('create/tetapan-tarikh', 'viewFormTetapanTarikh')->name('admin.instrumen.tetapan-tarikh.form');

    Route::post('tetapan-tarikh-view/{id}/{type}', 'viewTetapanTarikh')->name('admin.instrumen.tetapan-tarikh-view');

    Route::post('tetapan-tarikh-submit', 'saveTarikh')->name('admin.instrumen.tetapan-tarikh-submit');

});

Route::controller(PengumumanController::class)->prefix('pengumuman')->middleware(['web'])->group(function () {
    Route::get('/', 'index')->name('pengumuman.index');
    Route::get('create', 'create')->name('pengumuman.create')->middleware('auth');
    Route::post('store', 'store')->name('pengumuman.store')->middleware('auth');
});

Route::controller(IdmeController::class)->prefix('integration')->middleware(['web'])->group(function () {
    Route::get('idme', 'index')->name('integration.idme.index');
});
