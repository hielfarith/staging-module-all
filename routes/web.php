<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActivityLogController;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\FormSubmissionController;


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

Route::get('/', function () {
    return redirect()->route('login');
});

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

    Route::get('edit/{roleId}', [RoleController::class,'getRole'])->name('role.edit');

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

/*──────────────┐
│ Documentation │
│ Route         │
└───────────────*/
include 'documentation.php';
// END DOCUMENTATION ROUTE


// include 'route_prototype.php';
Route::controller(DatabaseView::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('database_view/index', 'index')->name('admin.database_view.index');
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
Route::prefix('dynamic')->group(function () {
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

});