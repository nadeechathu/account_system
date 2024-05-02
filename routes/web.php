<?php

use App\Http\Controllers\Admin\CenterController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\RoleController;
// use App\Http\Controllers\Admin\LoanCollectController;
use Illuminate\Support\Facades\Route;
use Spatie\Backup\BackupDestination\Backup;
use App\Http\Controllers\Admin\{
    ActivityVlogController,
    BackupController,
    LoanCategoryController,
    LoanCollectController,
    LoanCollectionReportController,
    LoanReportController,
    MemberReportController,
    ProfileController,
    SingalMemberReportController,
    SingalProfileController,
};
use App\Http\Controllers\Auth\LoginController;
use App\Models\LoanCategory;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('auth.login');
});
//Route::get('/login', [LoginController::class, 'login'])->name('login');
//Route::post('/login', [LoginController::class, 'authenticate']);
//Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.index');

    /******** Center Routes **********/
    Route::get('/dashboard/center',[CenterController::class,'center'])->name('dashboard.center');
    Route::post('/center_store', [CenterController::class, 'centerStore'])->name('center.create');
    Route::get('/centers_data', [CenterController::class, 'getCenters'])->name('centers.data');
    Route::get('/center/delete/{id}', [CenterController::class, 'removeCenter'])->name('centers.remove');
    Route::get('/center_view_update/{id}', [CenterController::class, 'viewCenterSingle'])->name('centers.update');
    Route::post('/center_update/{id}', [CenterController::class, 'updateCenter'])->name('store_center_update');
    Route::get('/get-center-code/{id}', [CenterController::class, 'getCenterCode'])->name('get_center_code');

    /******** Member Routes **********/
    Route::get('/dashboard/member',[MemberController::class,'member'])->name('dashboard.member');
    Route::get('/member_store_UI', [MemberController::class, 'memberStoreUI'])->name('member.createUI');
    Route::post('/member_store', [MemberController::class, 'memberStore'])->name('member.create');
    Route::get('/members_data', [MemberController::class, 'getMembers'])->name('members.data');
    Route::get('/member/delete/{id}', [MemberController::class, 'removeMember'])->name('member.remove');
    Route::get('/member/view/{id}', [MemberController::class, 'viewMember'])->name('member.view');
    Route::get('/member_view_update/{id}', [MemberController::class, 'viewMemberSingle'])->name('members.update');
    Route::post('/member_update/{id}', [MemberController::class, 'updateMember'])->name('store_member_update');
    Route::post('/dashboard/member/check', [MemberController::class, 'check'])->name('member.check');

    /******** Loans Routes **********/
    Route::get('/dashboard/loans',[LoanController::class,'loans'])->name('dashboard.loans');
    Route::get('/loan_UI', [LoanController::class, 'loanStoreUI'])->name('loan.createUI');
    Route::get('/get-loan-amount/{id}', [LoanController::class, 'getLoanAmount'])->name('get_loan_amount');
    Route::get('/get-loan-rate/{id}', [LoanController::class, 'getLoanRate'])->name('get_loan_rate');

    Route::post('/loan_store', [LoanController::class, 'loanStore'])->name('loan.create');
    Route::get('/loans_data', [LoanController::class, 'getLoans'])->name('loans.data');
    Route::get('/loan/delete/{id}', [LoanController::class, 'removeLoan'])->name('loan.remove');
    Route::get('/loan/view/{id}', [LoanController::class, 'viewLoan'])->name('loan.view');
    Route::get('/loan_view_update/{id}', [LoanController::class, 'viewLoanSingle'])->name('loans.update');
    Route::post('/loan_update/{id}', [LoanController::class, 'updateLoan'])->name('store_loan_update');

    /******** Loan Category Routes **********/
    Route::get('/dashboard/loancategory',[LoanCategoryController::class,'loancategory'])->name('dashboard.loancategory');
    Route::get('/loan_category_data', [LoanCategoryController::class, 'getLoanCategory'])->name('loanCategory.data');
    Route::get('/loan_category_store_UI', [LoanCategoryController::class, 'loanCategoryStoreUI'])->name('loanCategory.loanCategoryUI');
    Route::post('/loan_category_store', [LoanCategoryController::class, 'loanCategoryStore'])->name('loanCategory.create');
    Route::get('/loanCategory/delete/{id}', [LoanCategoryController::class, 'removeLoanCategory'])->name('loanCategory.remove');
    Route::get('/loan_category_view_update/{id}', [LoanCategoryController::class, 'viewLoanCategorySingle'])->name('loanCategory.update');
    Route::post('/loan_category_update/{id}', [LoanCategoryController::class, 'updateLoanCategory'])->name('store_loan_category_update');

    /******** Loan Collection **********/
    // Route::get('/dashboard/loanCollects',[LoanCollectController::class,'loanCollects'])->name('dashboard.loanCollects');
    Route::get('/loan_Collect_UI', [LoanCollectController::class, 'loanCollectCreate'])->name('collects.loanCollectCreate');
    Route::get('/loan_collect/delete/{id}', [LoanCollectController::class, 'removeLoanCollect'])->name('collects.remove');
    Route::get('/loan_collect/view/{id}', [LoanCollectController::class, 'viewLoanCollect'])->name('collects.view');
    Route::get('/loan_collect/updat_view/{id}', [LoanCollectController::class, 'LoanCollectUpdateUI'])->name('collects.viewUI');
    Route::post('/loan_collect/update_store/{id}', [LoanCollectController::class, 'updateLoanCollect'])->name('collects.update.store');
    Route::get('/get-loan/{id}', [LoanCollectController::class, 'getLoanCollect'])->name('get_loan');
    Route::post('/loan_collect_store', [LoanCollectController::class, 'loanCollectStore'])->name('collects.create');
    /*** 2024-02-17 ***/
    Route::get('/collect_loan_data', [LoanCollectController::class, 'getLoanCollectData'])->name('collect.data');
    Route::get('/dashboard/loanCollects', [LoanCollectController::class, 'loanCollects'])->name('dashboard.loanCollects');


    /**** Profile Routes *****/
    Route::get('/dashboard/singalProfile',[SingalProfileController::class,'singalProfile'])->name('dashboard.singalProfile');
    Route::put('/dashboard/singalProfile', [SingalProfileController::class,'update'])->name('profile.update');

    /******** Memeber Reporting Routes **********/
    Route::get('/dashboard/memberReport',[MemberReportController::class,'memberReport'])->name('dashboard.memberReport');
    Route::post('/dashboard/memberReportView', [MemberReportController::class, 'memberReportPassData'])->name('dashboard.memberReportPassData');
    Route::get('/dashboard/memberReport/{id}',[MemberReportController::class,'downloadMemberDetailsPDF'])->name('dashboard.memberReport.download');

    /******** Loan Collection Report Routes **********/
    Route::get('/dashboard/loanCollectionReport',[LoanCollectionReportController::class,'loanCollectionReport'])->name('dashboard.loanCollectionReport');
    Route::post('/dashboard/loanCollectionReportView', [LoanCollectionReportController::class, 'loanCollectionReportPassData'])->name('dashboard.loanCollectionReportPassData');
    Route::get('/dashboard/loanCollectionReport/{id}',[LoanCollectionReportController::class,'downloadloanCollectionReportPDF'])->name('dashboard.loanCollectionReport.download');

    /******** Loan Reporting Routes **********/
    Route::get('/dashboard/loanReport',[LoanReportController::class,'loanReport'])->name('dashboard.loanReport');
    Route::get('/dashboard/singalMemberReport',[SingalMemberReportController::class,'singalMemberReport'])->name('dashboard.singalMemberReport');
    Route::get('/dashboard/singalMemberReportView/{id}',[SingalMemberReportController::class,'singalMemberReportView'])->name('dashboard.singalMemberReportView');
    Route::get('/dashboard/singalMembeReportPdf/{id}', [SingalMemberReportController::class, 'singalMembeReportPdf'])->name('dashboard.singalMembeReportPdf');

    Route::get('/dashboard/loanCollectionReport',[LoanCollectionReportController::class,'loanCollectionReport'])->name('dashboard.loanCollectionReport');
    Route::post('/dashboard/loanCollectionReportView', [LoanCollectionReportController::class, 'loanCollectionReportPassData'])->name('dashboard.loanCollectionReportPassData');
    Route::get('/dashboard/loanCollectionReport/{id}',[LoanCollectionReportController::class,'downloadloanCollectionReportPDF'])->name('dashboard.loanCollectionReport.download');

    Route::get('/dashboard/bulkReport',[LoanCollectionReportController::class,'bulkReport'])->name('dashboard.bulkReport');
    Route::post('/dashboard/bulkReport',[LoanCollectionReportController::class,'bulkReportStore'])->name('dashboard.bulkReport.update');

    Route::get('dashboard/activity_log', [ActivityVlogController::class, 'activityLog'])->middleware('auth')->name('dashboard.activity_log');
});
/******** Memeber Reporting Routes **********/
Route::get('/dashboard/memberReport',[MemberReportController::class,'memberReport'])->name('dashboard.memberReport');
// Route::get('/dashboard/memberReportView',[MemberReportController::class,'memberReportView'])->name('dashboard.memberReportView');
Route::post('/dashboard/memberReportView', [MemberReportController::class, 'memberReportPassData'])->name('dashboard.memberReportPassData');
Route::get('/dashboard/memberReport/{id}',[MemberReportController::class,'downloadMemberDetailsPDF'])->name('dashboard.memberReport.download');


/******** Loan Reporting Routes **********/
Route::get('/dashboard/loanReport',[LoanReportController::class,'loanReport'])->name('dashboard.loanReport');
Route::post('/dashboard/loanReportView', [LoanReportController::class, 'loanReportPassData'])->name('dashboard.loanReportPassData');
Route::get('/dashboard/loanReport/{id}',[LoanReportController::class,'downloadLoanDetailsPDF'])->name('dashboard.loanReport.download');




/******** Loan Collection Report Routes **********/

Route::get('/dashboard/loanCollectionReport',[LoanCollectionReportController::class,'loanCollectionReport'])->name('dashboard.loanCollectionReport');
// Route::get('/dashboard/loanCollectionReportView',[LoanCollectionReportController::class,'loanCollectionReportView'])->name('dashboard.loanCollectionReportView');
Route::post('/dashboard/loanCollectionReportView', [LoanCollectionReportController::class, 'loanCollectionReportPassData'])->name('dashboard.loanCollectionReportPassData');
Route::get('/dashboard/loanCollectionReport/{id}',[LoanCollectionReportController::class,'downloadloanCollectionReportPDF'])->name('dashboard.loanCollectionReport.download');




/******** Loan Reporting Routes **********/
// Route::get('/dashboard/loanReport',[LoanReportController::class,'loanReport'])->name('dashboard.loanReport');

Route::get('/dashboard/singalMemberReport',[SingalMemberReportController::class,'singalMemberReport'])->name('dashboard.singalMemberReport');
Route::get('/dashboard/singalMemberReportView/{id}',[SingalMemberReportController::class,'singalMemberReportView'])->name('dashboard.singalMemberReportView');

Route::get('/dashboard/singalMembeReportPdf/{id}', [SingalMemberReportController::class, 'singalMembeReportPdf'])->name('dashboard.singalMembeReportPdf');

// Route::get('/dashboard/loanCollectionReport',[LoanCollectionReportController::class,'loanCollectionReport'])->name('dashboard.loanCollectionReport');




Route::get('/dashboard/loanCollectionReport',[LoanCollectionReportController::class,'loanCollectionReport'])->name('dashboard.loanCollectionReport');
// Route::get('/dashboard/loanCollectionReportView',[LoanCollectionReportController::class,'loanCollectionReportView'])->name('dashboard.loanCollectionReportView');
Route::post('/dashboard/loanCollectionReportView', [LoanCollectionReportController::class, 'loanCollectionReportPassData'])->name('dashboard.loanCollectionReportPassData');
Route::get('/dashboard/loanCollectionReport/{id}',[LoanCollectionReportController::class,'downloadloanCollectionReportPDF'])->name('dashboard.loanCollectionReport.download');


Route::get('/dashboard/bulkReport',[LoanCollectionReportController::class,'bulkReport'])->name('dashboard.bulkReport');
Route::post('/dashboard/bulkReport',[LoanCollectionReportController::class,'bulkReportStore'])->name('dashboard.bulkReport.update');


// mobile route
Route::get('/mobile/bulkReport',[LoanCollectionReportController::class,'mobileBulkReport'])->name('mobile.bulkReport');
Route::post('/mobile/bulkReport',[LoanCollectionReportController::class,'mobileBulkReportStore'])->name('mobile.bulkReport.update');
Route::get('/mobile/viewMembers',[MemberController::class,'mobileViewMembers'])->name('mobile.allMembers');
Route::get('/mobile/members_data', [MemberController::class, 'mobileGetMembers'])->name('members.Mobiledata');


//Route::get('/loan/view/{id}', [LoanController::class, 'viewLoan'])->name('loan.view');

// Route::get('/backup', function () {
//     Artisan::call('backup:run', ['--only-db' => true]);
//     return 'Backup completed!';
// });

Route::get('dashboard/activity_log', [ActivityVlogController::class, 'activityLog'])->middleware('auth')->name('dashboard.activity_log');

Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')
    ->group(function(){
        Route::resource('roles','RoleController');
        Route::resource('permissions','PermissionController');
        Route::resource('users','UserController');

       Route::get('/profile',[ProfileController::class,'index'])->name('profile');
        Route::put('/profile-update',[ProfileController::class,'update'])->name('profile.update');
       //Route::get('/mail',[MailSettingController::class,'index'])->name('mail.index');
       //Route::put('/mail-update/{mailsetting}',[MailSettingController::class,'update'])->name('mail.update');
});





