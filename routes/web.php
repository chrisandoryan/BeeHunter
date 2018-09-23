 <?php

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

// [Public Routes]
Route::get('/', 'BountyController@fetchAllBounties')->name('public.landpage');

// [Hunter Routes]
 Route::group([
     'prefix' => 'hunter',
     'middleware' => [
         'auth',
     ]
 ], function() {
        Route::get('dashboard', 'HunterController@dashboard')->name('hunter.dashboard');
        Route::get('profile', 'HunterController@profile')->name('hunter.profile');
        Route::get('settings', 'HunterController@profile')->name('hunter.settings');
        Route::get('mailbox', 'HunterController@mailbox')->name('hunter.leaderboard');
        Route::get('compose', 'HunterController@compose')->name('hunter.compose');
        Route::get('activity', 'BountyController@getSubmissionRecords')->name('hunter.activity');
        Route::get('submission/{hash}', function() {
            return view('hunters.timeline');
        });
 });

 // [Client Routes]
 Route::group([
    'prefix' => 'client',
 ], function() {
        Route::get('dashboard', 'ClientController@dashboard')->name('client.dashboard');
        Route::get('profile', 'ClientController@profile')->name('client.profile');
        Route::get('login', 'Auth\ClientLoginController@showLoginForm')->name('client.login');
        Route::post('login', 'Auth\ClientLoginController@doActionLogin')->name('client.login.submit');
        Route::group([
            'prefix' => 'program/create',
        ], function() {
            Route::get('detail', 'BountyController@showProgramCreatorPage')->name('client.create.program');
            Route::post('detail', 'BountyController@storeBountyProgram')->name('client.store.program');
            Route::get('reward', 'BountyController@showRewardCreatorPage')->name('client.create.reward');
            Route::post('reward', 'BountyController@storeProgramReward')->name('client.store.reward');
        });
        Route::group([
            'prefix' => 'program/manage',
        ], function() {
            Route::get('/', 'BountyController@manageProgram')->name('client.manage.program');
            Route::post('/edit', 'BountyController@editProgramPage')->name('client.edit.program');
            Route::post('/editbounty', 'BountyController@editBountyProgram')->name('client.edit.bounty.program');
        });
        Route::group([
            'prefix' => 'reports',
        ], function() {
            Route::post('/', 'ClientController@payReward')->name('client.pay.reward');
            Route::get('/', 'ClientController@displayReport')->name('client.reports');
            Route::get('{hash}', 'ClientController@getReportDetail')->name('client.get.reports');
        });
        
        Route::get('acceptSub', 'ClientController@accSub')->name('client.acceptSub');
        Route::get('declineSub', 'ClientController@decSub')->name('client.declineSub');
        Route::get('reviewedSub', 'ClientController@revSub')->name('client.reviewedSub');
        Route::group([
            'prefix' => 'topup',
         ], function() {
                Route::get('/', 'ClientController@topup')->name('client.topup');
                Route::post('/', 'ClientController@storetopup')->name('client.storetopup');
         });
 });

// [Bounty Explore]
 Route::prefix('explore')->group(function() {
     Route::get('everything', 'BountyController@fetchAllBounties')->name('explore_everything');
     Route::get('server', 'BountyController@fetchServerBounties')->name('explore_server');
     Route::get('web', 'BountyController@fetchWebBounties')->name('explore_web');
     Route::get('android', 'BountyController@fetchAndroidBounties')->name('explore_android');
     Route::get('ios', 'BountyController@fetchiOSBounties')->name('explore_ios');
     Route::get('network', 'BountyController@fetchNetworkBounties')->name('explore_network');
     // [Bounty Details]
     Route::get('programs/{hash}', 'BountyController@fetchBountyDetail');
 });

 // [Admin Routes]
 Route::group([
    'prefix' => 'admin',
], function() {
       Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
       Route::post('login', 'Auth\AdminLoginController@submitLogin')->name('admin.submit.login');
       Route::group(['middleware' => ['CheckAdmin']], function () {
           Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
           Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
           Route::post('validate', 'AdminController@RewardValidation')->name('reward.validation');
    });
});


 // [Submission Handling]
 Route::group([
     'prefix' => 'reporting',
     'middleware' => [
         'auth',
     ]
 ], function() {
     Route::get('{hash}', 'BountyController@getReportSubmissionPage');
     Route::post('{hash}', 'BountyController@handleReportSubmission');
 });

 // [Authentication]
 Auth::routes();

 // [Validation]
 Route::group([
    'prefix' => 'validate',
 ], function() {
   
 });
