<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as Home;

use App\Http\Controllers\Group\MainController as GroupMain;
use App\Http\Controllers\Group\SettingsController as GroupSettings;
use App\Http\Controllers\Group\PostController as GroupPost;
use App\Http\Controllers\User\GroupController as UserGroup;
use App\Http\Controllers\User\TransactionController as UserPayment;

use App\Http\Controllers\Group\Campaign\CampaignController as UserCampaign;
use App\Http\Controllers\Group\Campaign\MainController as CampaignMain;

use App\Http\Controllers\Admin\GroupAdminController as GroupAdmin;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [Home::class, 'index'])->name('home');
Route::get('admin/home', [Home::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::middleware(["auth","verified"])->group(function(){
    Route::name("user.")->prefix("user")->group(function(){

           Route::get("groups",[UserGroup::class,"index"])->name("groups");
        Route::get("groups/create",[UserGroup::class,"create"])->name("groups.create");
        Route::post("groups/create",[UserGroup::class,"store"])->name("groups.create");
        Route::get("groups/member",[UserGroup::class,"member"])->name("groups.member");
        
        Route::get("campaigns",[UserCampaign::class,"index"])->name("campaigns");
        Route::get("campaigns/create",[UserCampaign::class,"create"])->name("campaigns.create");
        Route::post("campaigns/create",[UserCampaign::class,"store"])->name("campaigns.create");
        Route::post("campaigns/delete",[UserCampaign::class,"delete"])->name("campaigns.delete");

        Route::get("campaign/{id}/pay/razorpay/{amount}",[UserPayment::class,"razorpay"])->name("payment.razorpay");
        Route::post("campaign/{id}/pay/razorpay",[UserPayment::class,"razorpayPay"])->name("payment.razorpay");
   });

});

Route::name("groups.")->prefix("groups")->group(function(){
    Route::get("/",[GroupMain::class,"index"])->name("index");
    Route::middleware(["auth","verified"])->group(function(){
        Route::get("view/{id}/{title}",[GroupMain::class,"view"])->name("view");
        Route::post("change-cover/{id}",[GroupMain::class,"changeCover"])->name("change-cover");
        Route::post("change-photo/{id}",[GroupMain::class,"changePhoto"])->name("change-photo");
        Route::post("change-description/{id}",[GroupMain::class,"changeDescription"])->name("change-description");
        Route::post("change-name/{id}",[GroupMain::class,"changeName"])->name("change-name");
        Route::get("settings/{id}",[GroupSettings::class,"settings"])->name("settings");
        Route::post("settings/{id}",[GroupSettings::class,"settingsChange"])->name("settings");
        Route::post("settings/action/delete",[GroupSettings::class,"del"])->name("delete");
        Route::get("settings/{id}/join-requests",[GroupSettings::class,"joinRequests"])->name("settings.join-requests");
        Route::post("settings/{id}/join-requests/approve",[GroupSettings::class,"joinRequestsApprove"])->name("settings.join-requests.approve");
        Route::post("settings/{id}/join-requests/reject",[GroupSettings::class,"joinRequestsReject"])->name("settings.join-requests.reject");
        Route::get("settings/{id}/post-approval",[GroupSettings::class,"postApproval"])->name("settings.post-approval");
        Route::post("settings/{id}/post-approval/approve",[GroupSettings::class,"postApprovalApprove"])->name("settings.post-approval.approve");
        Route::post("settings/{id}/post-approval/reject",[GroupSettings::class,"postApprovalReject"])->name("settings.post-approval.reject");
        Route::get("join/{id}",[GroupMain::class,"join"])->name("join");
        Route::post("create-post/{id}",[GroupPost::class,"create"])->name("post.create");
        Route::post("{id}/post/make-announcement",[GroupPost::class,"announcement"])->name("post.announcement");
        Route::post("{id}/post/like",[GroupPost::class,"like"])->name("post.like");
        Route::post("{id}/post/delete",[GroupPost::class,"delete"])->name("post.delete");
        Route::post("{id}/post/comment",[GroupPost::class,"comment"])->name("post.comment");
        Route::name("campaigns.")->prefix("campaigns")->group(function(){
            Route::get("/",[CampaignMain::class,"home"])->name("home");
            Route::get("view/{id}/{title}",[CampaignMain::class,"view"])->name("view");
            Route::get("campaigns",[UserCampaign::class,"index"])->name("campaigns");
            Route::get("campaigns/create",[UserCampaign::class,"create"])->name("campaigns.create");
            Route::post("campaigns/create",[UserCampaign::class,"store"])->name("campaigns.create");
            Route::post("campaigns/delete",[UserCampaign::class,"delete"])->name("campaigns.delete");
     
        
        });
        
    });
});


Route::name("admin.")->prefix("admin")->group(function(){
    Route::get("groupadmins",[GroupAdmin::class,"index"])->name("groupadmins");
    Route::get("groupadmins/create",[GroupAdmin::class,"create"])->name("groupadmins.create");
    Route::post("groupadmins/create",[GroupAdmin::class,"store"])->name("groupadmins.create");
    Route::post("groupadmins/delete",[GroupAdmin::class,"delete"])->name("groupadmins.delete");
   
});