<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiHelpdeskIssueController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\UserProfileController;

// EReporting Controllers
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectFinanceController;
use App\Http\Controllers\ProjectUrsController;
use App\Http\Controllers\ProjectUrsFunctionController;
use App\Http\Controllers\ReportApplicationController;
use App\Http\Controllers\ReportAttendanceController;
use App\Http\Controllers\ReportHardwareController;
use App\Http\Controllers\ReportHelpdeskController;
use App\Http\Controllers\ReportSijilController;
use App\Http\Controllers\ReportTimesheetController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\UrsCheckVerifyController;
use App\Http\Controllers\UrsTemplateController;
use App\Http\Controllers\UrsVersionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CronViewController;
use App\Http\Controllers\MasterDataController;



//Epromis Controllers
use App\Http\Controllers\QuartersController;
use App\Http\Controllers\HelpDeskController;
use App\Http\Controllers\KuatersController;
use App\Http\Controllers\DatabaseView;
use App\Http\Controllers\StatistikController;

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

Route::get('auth/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('google.redirect');
Route::get('auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('google.callback');

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Auth::routes();
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout.get');

Route::get('inbox', [App\Http\Controllers\InboxController::class, 'index'])->name('inbox');

Route::get('statistics', [App\Http\Controllers\StatisticsController::class, 'index'])->name('statistics');
Route::post('statistics', [App\Http\Controllers\StatisticsController::class, 'generateChart'])->name('statistics.generate');

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
    Route::get('internalUser',[UserController::class,'index'])->name('admin.internalUser');
    Route::get('externalUser',[UserController::class,'index'])->name('admin.externalUser');
    Route::get('getUser/{userId}', [UserController::class,'getUser'])->name('user.getUser');
    Route::get('update/{roleId}', [RoleController::class,'getRole'])->name('role.edit');

    Route::resource('project', ProjectController::class);
    Route::prefix('project')->group(function () {
        // updateObjective
        Route::post('updateObjective/{project}', [ProjectController::class, 'updateObjective'])->name('project.updateObjective');
        // add abbreviation
        Route::post('addAbvr/{project}/{projectReportTypeId?}', [ProjectController::class, 'addAbvr'])->name('project.addAbvr');
        // update abbreviation
        Route::post('updateAbvr/{abvr}/{option}/{value}', [ProjectController::class, 'updateAbvr'])->name('project.updateAbvr');
        //delete abbreviation
        Route::delete('delete_abvr/{abvr}', [ProjectController::class, 'deleteAbvr'])->name('project.deleteAbvr');
        // refresh abbreviationTable
        Route::get('viewTableAbvr/{project}', [ProjectController::class, 'viewTableAbvr'])->name('project.viewTableAbvr');

        //Database Project Settings
        Route::prefix('{project}/database')->group(function () {
            Route::get('viewTableDatabase', [ProjectController::class, 'viewTableDatabase'])->name('project.viewTableDatabase');
            Route::post('storeDatabase/{report_database?}', [ProjectController::class, 'storeDatabase'])->name('project.storeDatabase');
            Route::post('storeDatabaseVersion', [ProjectController::class, 'storeDatabaseVersion'])->name('project.storeDatabaseVersion');
            Route::delete('deleteDatabase/{report_database}', [ProjectController::class, 'deleteDatabase'])->name('project.deleteDatabase');
        });

        //timeline vs operation
        Route::prefix('{project}/timeline')->group(function () {
            Route::get('/', [TimelineController::class, 'index'])->name('timeline.view');
            Route::post('store', [TimelineController::class, 'store'])->name('timeline.store');
        });

        Route::prefix('finance')->group(function () {
            Route::post('uploadBudget', [ProjectFinanceController::class, 'uploadBudget'])->name('project_finance.uploadBudget');
            Route::post('uploadClaim', [ProjectFinanceController::class, 'uploadClaim'])->name('project_finance.uploadClaim');
        });

        Route::prefix('{project}/operation')->group(function () {
            Route::get('/', [OperationController::class, 'index'])->name('operation.view');
            Route::post('store', [OperationController::class,'store'])->name('operation.store');
            Route::get('delete', [OperationController::class,'delete'])->name('operation.delete');
            Route::post('storeIssue', [OperationController::class,'store_issueRegister'])->name('operation.store_issueRegister');
            Route::get('deleteIssue', [OperationController::class,'delete_issueRegister'])->name('operation.delete_issueRegister');
        });

        //Cron View
        Route::prefix('cron_view')->group(function () {
            Route::get('CronView', [CronViewController::class, 'index'])->name('admin.cron_view.CronView');
        });
        //Master Data
        Route::prefix('master_data')->group(function () {
            Route::get('parameter', [MasterDataController::class, 'parameter'])->name('admin.master_data.parameter');
            Route::get('Runningnumber', [MasterDataController::class, 'RunningNoList'])->name('admin.master_data.Runningnumber');
        });


    });

    Route::resource('userprojectrole', App\Http\Controllers\UserProjectRoleController::class);

    Route::prefix('settings')->group(function () {
        Route::get('/', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
        Route::post('/', [App\Http\Controllers\SettingsController::class, 'update'])->name('admin.settings');
        Route::prefix('save')->group(function () {
            Route::post('/', [App\Http\Controllers\SettingsController::class, 'settings_save'])->name('admin.settings.save');
        });
        Route::prefix('checkemail')->group(function () {
            Route::post('/', [App\Http\Controllers\SettingsController::class, 'checkEmail'])->name('admin.settings.checkemail');
        });
        Route::get('picture/{filename}', [App\Http\Controllers\SettingsController::class, 'picture'])->name('settings.picture');

        Route::prefix('log')->group(function () {
            Route::get('index', [ActivityLogController::class, 'index'])->name('admin-log-index');
            Route::get('view/{logID}', [ActivityLogController::class, 'view'])->name('admin-log-view');
        });
    });

    Route::prefix('general')->group(function () {
        Route::resource('announcement', App\Http\Controllers\AnnouncementController::class);
        Route::resource('faq', App\Http\Controllers\FaqController::class);

        Route::resource('notify', App\Http\Controllers\NotifyController::class);
        Route::get('notify/send/{id}', [App\Http\Controllers\NotifyController::class, 'showSendNotification'])->name('notify.send-view');
        Route::post('notify/send/{id}', [App\Http\Controllers\NotifyController::class, 'sendNotification'])->name('notify.send');

        Route::resource('holiday', App\Http\Controllers\HolidayController::class);
        Route::post('holiday/update_weekend', [App\Http\Controllers\HolidayController::class, 'updateWeekend'])->name('holiday.update_weekend');
    });

    Route::prefix('urs-template')->group(function () {
        Route::get('index', [UrsTemplateController::class, 'index'])->name('urs-template.index');
        Route::post('add', [UrsTemplateController::class, 'add'])->name('urs-template.add');

        Route::get('download/{templateID}', [UrsTemplateController::class, 'download'])->name('urs-template.download');
        Route::get('set-active/{templateID}', [UrsTemplateController::class, 'setActive'])->name('urs-template.setActive');
    });
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::controller(ReportApplicationController::class)->group(function () {
    // Syntax
    // Route::get('name of link', 'name of function')

    Route::prefix('report/application')->group(function () {
        Route::get('list/{project}', 'viewList')->name('report_application.list');
        Route::get('borang/{reportApplication}/{view?}', 'viewBorang')->name('report_application.viewborang');
        Route::post('updateDeclaration', 'updateDeclaration')->name('report_application.updateDeclaration');
        Route::get('loadPDF/{id}/{isMain?}', 'loadPDF')->name('report_application.loadPDF');
        Route::get('viewPDF/{id}/{type}/{isMain?}', 'viewPDF')->name('report_application.viewPDF');
        Route::post('addIssue', 'addIssue')->name('report_application.addIssue');
        Route::get('listIssue/{reportApplication}', 'listIssue')->name('report_application.listIssue');
        Route::get('viewIssue/{issue}', 'viewIssue')->name('report_application.viewIssue');
        Route::delete('deleteIssue/{issue}', 'deleteIssue')->name('report_application.deleteIssue');
        Route::get('retrieveHelpdeskIssue/{helpdeskIssue}', 'retrieveHelpdeskIssue')->name('report_application.retrieveHelpdeskIssue');
        Route::post('autofillFromHelpdesk/{reportApplication}', 'autofillFromHelpdesk')->name('report_application.autofillFromHelpdesk');
        Route::post('uploadFinalPDF/{reportApplication}', 'uploadFinalPDF')->name('report_application.uploadFinalPDF');
        Route::get('viewFinalFile/{reportApplication}/{type?}', 'viewFinalFile')->name('report_application.viewFinalFile');
        Route::get('send-email/{reportApplication}', 'sendEmail')->name('report_application.sendEmail');
        Route::post('deleteFinalFile/{reportApplication}', 'deleteFinalFile')->name('report_application.deleteFinalFile');
    });
});

Route::controller(ReportAttendanceController::class)->group(function () {
    Route::prefix('report/attendance')->group(function () {
        // Display list of month attendance to be picked
        Route::get('list/{project}', 'viewList')->name('report_attendance.list');
        // Display list of attendance based on id, month, view
        Route::get('borang/{id?}/{year?}/{month?}/{view?}', 'viewBorang')->name('report_attendance.viewborang');
        // Update declaration tab
        Route::post('updateDeclaration', 'updateDeclaration')->name('report_attendance.updateDeclaration');
        // Load and generate pdf to view or download
        Route::get('loadPDF/{id}/{option}/{year}/{month}', 'loadPDF')->name('report_attendance.loadPDF');
        Route::get('viewPDF/{id}/{type}/{option}/{year}/{month}', 'viewPDF')->name('report_attendance.viewPDF');
        // Add staff
        Route::post('add/{id}/{name}/{project}', 'addStaff')->name('report_attendance.addStaff');
        // Update staff details
        Route::post('update/{id}/{option}/{value}', 'updateStaff')->name('report_attendance.updateStaff');
        // Delete staff
        Route::post('deleteStaff/{attendance}/{attendance_staff}/{deleteAll}', 'deleteStaff')->name('report_attendance.deleteStaff');

        // AJAX Update
        Route::get('listWeeklyAttendance/{listWeekly}', 'listWeeklyAttendance')->name('report_attendance.listWeeklyAttendance');
        Route::get('listAttendance/{listAttendance}', 'listReportAttendance')->name('report_attendance.listReportAttendance');
        Route::get('listStaff/{report_attendance_details}', 'viewStaff')->name('report_attendance.viewStaff');
        Route::get('refresh/{reportAttendanceDetails}', 'refreshListStaff')->name('report_attendance.refreshListStaff');
        Route::get('send-email/{reportAttendance}', 'sendEmail')->name('report_attendance.sendEmail');
        Route::get('reloadEmailTab/{reportAttendance}', 'reloadEmailTab')->name('report_attendance.reloadEmailTab');
    });

    // Route::get('name of link', 'name of function')
});

Route::controller(ReportHelpdeskController::class)->group(function () {
    Route::prefix('report/helpdesk')->group(function () {
        Route::get('list/{project}', 'viewList')->name('report_helpdesk.list');
        Route::get('borang/{reportHelpdesk?}/{view?}', 'viewBorang')->name('report_helpdesk.viewborang');
        Route::post('updateTitle', 'updateTitle')->name('report_helpdesk.updateTitle');
        Route::post('updateDeclaration', 'updateDeclaration')->name('report_helpdesk.updateDeclaration');
        Route::post('addIssue', 'addIssue')->name('report_helpdesk.addIssue');
        Route::post('autofillFromAPI/{reportHelpdesk}', 'autofillFromAPI')->name('report_helpdesk.autofillFromAPI');
        Route::get('viewIssue/{issue}', 'viewIssue')->name('report_helpdesk.viewIssue');
        Route::delete('deleteIssue/{issue}', 'deleteIssue')->name('report_helpdesk.deleteIssue');
        Route::get('getDataAPI_Issues/{api_issue_id}', 'getDataFromAPIHelpdeskIssues')->name('report_helpdesk.getDataAPI_Issues');
        Route::get('refreshListViewIssueContainer/{reportHelpdesk}', 'refreshListViewIssueContainer')->name('report_helpdesk.refreshListViewIssueContainer');
        Route::get('loadHelpdeskPDF/{id}', 'loadHelpdeskPDF')->name('report_helpdesk.loadPDF');
        Route::get('viewHelpdeskPDF/{id}/{type}', 'viewHelpdeskPDF')->name('report_helpdesk.viewPDF');
        Route::get('send-email/{reportHelpdesk}', 'sendEmail')->name('report_helpdesk.sendEmail');
        Route::get('reloadEmailTab/{reportHelpdesk}', 'reloadEmailTab')->name('report_helpdesk.reloadEmailTab');
    });
});


Route::controller(ApiHelpdeskIssueController::class)->group(function () {
    Route::prefix('project/helpdesk')->group(function () {
        Route::get('testApi', 'testApi')->name('api_helpdesk.testApi');
    });

    Route::get('api/helpdesk/{project_id?}/{month?}/{year?}', 'retrieveAPIfromHelpdesk')->name('api_helpdesk.retrieve');
});

// Temp Route for phase 2
//Route::get('report/hardware', [App\Http\Controllers\HomeController::class, 'index'])->name('report_hardware.list');
Route::get('report/software', [App\Http\Controllers\HomeController::class, 'index'])->name('report_software.list');
Route::get('report/management', [App\Http\Controllers\HomeController::class, 'index'])->name('report_management.list');
//Route::get('report/hardware', [App\Http\Controllers\HomeController::class, 'index'])->name('report_hardware.list');
Route::get('report/testing', [App\Http\Controllers\HomeController::class, 'index'])->name('report_testing.list');
// End temp Route

Route::controller(EmailController::class)->group(function () {
    Route::post('addEmail', 'addEmail')->name('email.addEmail');
    Route::delete('deleteEmail', 'deleteEmail')->name('email.deleteEmail');
});

Route::controller(DatabaseView::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('database_view/index', 'index')->name('admin.database_view.index');
    });
});

//helpdesk//
Route::controller(HelpDeskController::class)->group(function () {
    Route::prefix('helpdesk')->group(function () {
        Route::get('/index', 'index')->name('helpdesk.index');
        Route::get('/update-ticket', 'updateTicket')->name('helpdesk.update-ticket');
        Route::get('/dashboard', 'dashboard')->name('helpdesk.dashboard');
        Route::get('/report_yearly', 'reportYearly')->name('helpdesk.report_yearly');
        Route::get('/report_issues', 'reportIssues')->name('helpdesk.report_issues');


    });
});

Route::controller(StatistikController::class)->group(function () {
    Route::get('laporan_permohonan/laporan', 'viewLaporan')->name('laporan_permohonan.laporan');
    Route::get('laporan_permohonan/statistik', 'viewStatistik')->name('laporan_permohonan.statistik');
});
/*──────────────┐
│ Documentation │
│ Route         │
└───────────────*/
include 'documentation.php';
// END DOCUMENTATION ROUTE


include 'route_prototype.php';
