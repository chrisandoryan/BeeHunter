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

// [Hunter Routes]
 Route::group([
     'prefix' => 'hunter',
     'middleware' => [
         'auth',
     ]
 ], function() {
        Route::get('dashboard', 'HunterController@dashboard')->name('dashboard');
        Route::get('profile', 'HunterController@profile')->name('profile');
        Route::get('settings', 'HunterController@profile')->name('settings');
        Route::get('mailbox', 'HunterController@mailbox')->name('leaderboard');
        Route::get('compose', 'HunterController@compose')->name('compose');
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
     Route::get('programs/{cat}/{cid}', 'BountyController@fetchBountyDetail');
 });

 // [Submission Handling]
 Route::group([
     'prefix' => 'submission',
     'middleware' => [
         'auth',
     ]
 ], function() {
     Route::get('{cat}/{cid}', function() {
         return view('bounty.submit');
     })->name('submission');
//     Route::get('{cat}/{cid}', 'BountyController@fetchBountyDetail');
     Route::post('{cat}/{cid}', 'BountyController@handleSubmission');
 });

 // [Authentication]
 Auth::routes();
