<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\FormViewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\website\WebsiteController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/customerregistration', [App\Http\Controllers\FormViewController::class, 'customer'])->name('customer');

Route::get('/', [WebsiteController::class, 'webvideo'])->name('website');

Route::get('/videoplay{id}', [WebsiteController::class, 'playvideo'])->name('websitevideo');

Route::get('/categoryall{id}', [WebsiteController::class, 'categoryallview'])->name('categoryall');

Route::get('/companypolicy', [WebsiteController::class, 'policy'])->name('policy');

Route::get('/packagelist', [WebsiteController::class, 'package'])->name('package');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function(){
    $user = auth()->user();
            // Determine the user's role
    $userType = $user->role;
    switch ($userType) {
                case 'accountadmin':
                    return redirect()->route('accountadmins');
                case 'maintainadmin':
                    return redirect()->route('maintainadmins');
                case 'superadmin':
                    return redirect()->route('superadmins');
                case 'systemadmin':
                    return redirect()->route('systemadmin');
                case 'subscriber':
                    return redirect()->route('subscribers');
                default:
                    return redirect()->route('login');
            }
})->name('home');
   
//Route::get('/parentid', [App\Http\Controllers\FormViewController::class, 'getSecondGenerationUsers']);


Route::get('/singlevideo', function(){

    return view('website.singlevideo');
});

Route::get('/abouts', function(){

    return view('website.aboutas');
});

Route::get('/category', function(){

    return view('website.category');
});

Route::get('/contact', function(){

    return view('website.contactpage');
});

Route::get('watchtimeboost', [App\Http\Controllers\WatchtimeController::class, 'boostview'])->name('watchtimeboost');


Route::get('/Subscriberregistration', [App\Http\Controllers\subscriberregistrationController::class, 'subscriberregistraetion'])->name('fryingubscriber');


//End Of frontend 

Route::middleware(['auth','user-role:subscriber'])->group(function()
{

    Route::get('/subscriberdashboard', [FormViewController::class, 'subscriberdashboard'])->name('subscribers');
    //add new category form
    
    Route::get('/outsourcing',[App\Http\Controllers\SocialworkController::class, 'outsourcing'])->name('sourceout');
    
     Route::get('/outsourceingss',[App\Http\Controllers\SocialworkController::class, 'outsourceing'])->name('outsourceingss');
    
    Route::get('/earninglist',[App\Http\Controllers\SocialworkController::class, 'earninglist'])->name('earninglist');
    
    Route::get('/ranking', [App\Http\Controllers\RankController::class, 'getUserRank'])->name('rank');
    
    Route::get('/convertminute', [FormViewController::class, 'convertminute'])->name('convertminutefomr');
    
    Route::post('/convertminutebalance', [App\Http\Controllers\AddbalanceController::class, 'minuteconvert'])->name('convertminute');
     //Watch Time Callculation 
    Route::get('/addbalance', [App\Http\Controllers\AddbalanceController::class, 'addbalance'])->name('addbalancerequest');

    Route::post('/addblancepurchase', [App\Http\Controllers\AddbalanceController::class, 'addbalancetosubscriber'])->name('addbalance');


    Route::get('/addbalancelist', [App\Http\Controllers\AddbalanceController::class, 'addbalancerequesthistory'])->name('addbalancelist');

    Route::any('/watchtime', [App\Http\Controllers\WatchtimeController::class, 'watchtime'])->name('watchtime');

    //Rank 
    
    Route::get('/boostershareminuteearn', [App\Http\Controllers\Boostershareholder::class, 'listminuteearning'])->name('minuteearnbooster');
    
    Route::get('/Rank', [FormViewController::class, 'rankpage'])->name('rank');
    
    Route::get('/powerbalanceshow', [FormViewController::class, 'showpower'])->name('showpower');
    
    Route::get('/convertmainbalance', [FormViewController::class, 'convertshowpage'])->name('convertbalance');
    
    //earning balance history
    
    Route::get('/earninghistory', [FormViewController::class, 'Subscriptionearninglist'])->name('subscriptionearninglist');
    
    Route::post('/convertaction', [App\Http\Controllers\ConvertbalanceController::class, 'convertpower'])->name('convertpowerbalance');
    
    //create new subscriber template 
    Route::get('/createsubscribertemplate', [FormViewController::class, 'createsubscribertemplate'])->name('createsubscribertemplate');


     Route::get('/myrequestbalance', [App\Http\Controllers\SubscriberwidthrawalController::class, 'requesthistory'])->name('subscriberrequestbalance');

    Route::post('/createsubscriber', [BalanceController::class, 'createsubscriber'])->name('createsubscriber');


    Route::get('/firstgeneration', [FormViewController::class, 'firstgeneation'])->name('firstgeneration');
    
    //balance transfer section 

    Route::get('/subscriberbalancetranasfer', [FormViewController::class, 'subscriberbalancetransformform'])->name('customerbalancetransferform');

    Route::get('/subscriberbalancetransfer', [App\Http\Controllers\BalanceTansferController::class, 'getdataformui'])->name('balancetransfersubscriber');

    Route::post('/subscribertransfer.confirm', [App\Http\Controllers\BalanceTansferController::class, 'confirmtransfer'])->name('subscribertransfer.confirm');


    Route::get('/balancetransection', [FormViewController::class, 'transectionvview'])->name('treansectionview');


   //Transection Pin Set 


    Route::get('/transectionpinform', [FormViewController::class, 'transectionpinsetform'])->name('transectionpinform');

    Route::post('settransectionpin', [SecurityController::class, 'settransection'])->name('settreansecction');

    Route::get('/updatepin', [FormViewController::class, 'updatepinform'])->name('pinupdateform');

    //Confirm Update Pin Section 

    Route::post('/updateConfiorm', [SecurityController::class, 'updatepinconfirm'])->name('updateconfirmpinset');


    Route::get('/secondgenaration', [FormViewController::class, 'getSecondGenerationUsers'])->name('secondgeneration');

    Route::get('/totalsubscriber/{user_id}', [FormViewController::class, 'firsttotal'])->name('totalsubsbcriber');


    //change password section 

    Route::get('/changepasswordform', [FormViewController::class, 'passwordform'])->name('changepasswordform');

    Route::post('/changepassword', [App\Http\Controllers\ChangepasswordController::class, 'changepassword'])->name('changepassword');

    //subscriber profile section 


    Route::get('/profile', [FormViewController::class, 'profile'])->name('profile');


    Route::post('/updatepersonalinfo', [App\Http\Controllers\Subscriber\UserBioController::class, 'personaldetails'])->name('updateperasonal');

    Route::get('/profileimage', [FormViewController::class, 'profileimagechange'])->name('profileimage');


    Route::post('/updatebio', [App\Http\Controllers\Subscriber\UserBioController::class, 'storebio'])->name('bioupdate');


    Route::get('/convertearningbalanceform', [FormViewController::class, 'convertform'])->name('convertearningbalance');

    Route::get('/convertbalance', [App\Http\Controllers\ConvertbalanceController::class, 'convert'])->name('convert');

    Route::get('/convertview', [App\Http\Controllers\ConvertbalanceController::class, 'convertview'])->name('convertview');


    Route::post('/balancewidtral', [App\Http\Controllers\SubscriberwidthrawalController::class, 'WidthrawaltoAccount'])->name('balancewidtrawal');

    Route::get('/Balancewidthrawal', [App\Http\Controllers\SubscriberwidthrawalController::class, 'viewtransection'])->name('widtrawalrequest');


    Route::get('/receivearningbalance', [App\Http\Controllers\SubscriberwidthrawalController::class, 'eaningbalance'])->name('receiveearn');
    
    Route::get('/minutebalance', [App\Http\Controllers\MinuteController::class, 'minute'])->name('minute');
    
    
    Route::get('/purchaseboostershare', [App\Http\Controllers\AddbalanceController::class, 'boostershare'])->name('boostsharepurchase');

    Route::get('/boostshare', [App\Http\Controllers\AddbalanceController::class, 'boost'])->name('boostsharepurchaseadd');

    Route::post('/sharepurchase', [App\Http\Controllers\AddbalanceController::class, 'shareconfirmpurchase'])->name('boostsharepurchaseaddconfirm');

    Route::get('/tearm', [App\Http\Controllers\AddbalanceController::class, 'termandcondition'])->name('termandcondition');
    Route::get('/gamepage', [App\Http\Controllers\AddbalanceController::class, 'gamepage'])->name('gameplaypage');

    Route::get('/game', [App\Http\Controllers\AddbalanceController::class, 'play'])->name('gamep');
    
    Route::get('/earnminutelist', [App\Http\Controllers\AddbalanceController::class, 'earnminutelist'])->name('earminutelist');
    Route::get('/earhistory', [App\Http\Controllers\AddbalanceController::class, 'watch_minute'])->name('watchtimelist');
     
    Route::get('/boostershareholderseft', [App\Http\Controllers\Boostershareholder::class, 'boosterself'])->name('boosterself');
    
    Route::get('/outsourcing/{id}',[App\Http\Controllers\SocialworkController::class, 'outsource'])->name('outsourcing');
    
    Route::get('/earnoutsource/{id}',[App\Http\Controllers\SocialworkController::class, 'addbalance'])->name('earnoutsource');
    
    Route::get('/sourceout/{id}',[App\Http\Controllers\SocialworkController::class, 'removeid'])->name('sourceouts');
    
    Route::post('/submitwork',[App\Http\Controllers\SocialworkController::class, 'submitwork'])->name('outsourceimage');

});




Route::middleware(['auth','user-role:accountadmin'])->group(function()
{

    Route::get('/accountdashboard', [FormViewController::class, 'accountdashboard'])->name('accountadmins');
    //add new category form

    Route::get('createbalanceform', [FormViewController::class, 'createbalanceform'])->name('careatenbalanceform');

    Route::post('/createbalance', [SecurityController::class, 'createbalance'])->name('createbalance');
    
     Route::get('/userpin', [SecurityController::class, 'userpin'])->name('userpinshow');

    Route::get('/viewvitualbalance', [FormViewController::class, 'viewvitualbalance'])->name('viewvitualbalance');

    //subscriber list

    Route::get('/subscriberlist', [FormViewController::class, 'subscriberlist'])->name('subscriberslist');


    //account balance trnasferform 
    
    Route::get('/accountreport', [App\Http\Controllers\AccountreportController::class, 'reportaccount'])->name('accountreport');
    

    Route::get('/accountbalancetransferform', [FormViewController::class, 'accountbalancetransferform'])->name('accountbalance');
    

    Route::get('/accountbalancetrans', [App\Http\Controllers\AccountBalanceTransferController::class, 'accountbalancetransferform'])->name('accounttransfer.initiate');

    Route::get('/accountbtransferconfirm', [App\Http\Controllers\AccountBalanceTransferController::class, 'accounttransferbalancegetdatafromui'])->name('balanceaccount');

    //account all treansection view

    Route::get('/transectionviewacccountdashboard', [FormViewController::class, 'transectionviewaccountdashboard'])->name('viewtransectionview');

    Route::get('/widthrawalrequestaccount', [App\Http\Controllers\Account\AccountController::class, 'WidthrawaltoAccountrequest'])->name('accountrequestmoneyvview');

    Route::get('/accountmakepayment/{transectionid}', [App\Http\Controllers\Account\AccountController::class, 'makepayment'])->name('makepaymentform');

    Route::post('/confirmpayment', [App\Http\Controllers\Account\AccountController::class, 'confirmpaymentnow'])->name('confirmpaymentone');


    Route::get('/paidlist', [App\Http\Controllers\Account\AccountController::class, 'paidlistiew'])->name('paidlist');



    //transection pin setup

    Route::get('/storepinforms', [App\Http\Controllers\Account\AccountController::class, 'storepinform'])->name('pinform');

    Route::post('/pinstore', [App\Http\Controllers\Account\AccountController::class, 'storepin'])->name('storepin');

    //update pinform

    Route::get('/updatepinform', [App\Http\Controllers\Account\AccountController::class, 'updatepinform'])->name('updatepinform');

    Route::post('/updateconfirm', [App\Http\Controllers\Account\AccountController::class, 'updateconfirm'])->name('updateconfirm');


});

Route::middleware(['auth','user-role:superadmin'])->group(function()
{

    Route::get("/superadmin", [FormViewController::class,'superadmindashboard'])->name('superadmins');
    
    Route::get('/boostershareholderlist', [App\Http\Controllers\Boostershareholder::class, 'boosterlist'])->name('boosterlist');

    Route::get('/subsciber', [App\Http\Controllers\subscriberregistrationController::class, 'requestviewsubscriber'])->name('requestsubscriber');

    Route::get('/transferbalancefromsuperadmin/{id}', [App\Http\Controllers\AddbalanceController::class, 'transferbalance'])->name('transfer');

    Route::post('/actiontransfer', [App\Http\Controllers\AddbalanceController::class, 'actiontransferamount'])->name('actiontransferbalance');
    //createsubscriber 
    
    Route::get('/addbalancerequestlist', [App\Http\Controllers\AddbalanceController::class, 'addbalancerereuest'])->name('addbalancelistfromsuperadmin');

    Route::get('/createroradmin/{id}', [FormViewController::class, 'createsubscriber'])->name('createsubscriberbysuperadminform');
    
    Route::get('/deleteunpaidsubscriber/{id}',[FormViewController::class, 'deleteunpaidsubscriber'] )->name('deletesubscriberbysuperadminform');

    //createsubscriber 


    Route::post('/superadmincreatesubscriber', [App\Http\Controllers\SuperadminController::class, 'createsubscribers'])->name('createsubscribersuperadmin');


    //balance transection view

    Route::get('/balancetransection', [FormViewController::class, 'superadminbalancetransection'])->name('superadminbalancetransection');
    
    Route::get('/gistaccount', [App\Http\Controllers\GiftAccountController::class, 'giftaccountform'])->name('giftaccount');

    Route::post('/creategiftaccount', [App\Http\Controllers\GiftAccountController::class, 'creategiftaccount'])->name('creategiftsubscribersuperadmin');
    

});

Route::middleware(['auth','user-role:maintainadmin'])->group(function()
{

    Route::get("/maintainadmin",[FormViewController::class,'maintainadmin'])->name('maintainadmins');

    Route::get('/addnewcategory', [FormViewController::class, 'categoryinsertform'])->name('categoryinsertform');
    //Messageview 

    Route::get('/messageview', [FormViewController::class, 'messagevview'])->name('viewmessage');

    Route::get('/addvideo', [FormViewController::class, 'addvideoform'])->name('addvideoform');

    Route::get('/addtag', [FormViewController::class, 'addtagform'])->name('taginsertform');
    
    Route::post('/subcategorydelete/{id}', [WebsiteController::class, 'subcategorydelete'])->name('subcategory');

    Route::get('/addwebsitecontent', [FormViewController::class, 'addwebsitecontenttemplate'])->name('addwebsitecontenttemplate');

    Route::get('/category', [FormViewController::class, 'categorytemplate'])->name('categorylist');
    
    Route::post('/categorydelete/{id}', [WebsiteController::class, 'categorydelete'])->name('categorydelete');


     Route::get('/taglist', [FormViewController::class, 'taglisttemplate'])->name('taglist');

     Route::get('/websitecontentlist', [FormViewController::class, 'websitecontentlist'])->name('websitecontentview');

       Route::get('/videolist', [FormViewController::class, 'websitevideolist'])->name('websitevideoview');


    //add new video content 

    Route::post('/addvideo', [WebsiteController::class, 'store'])->name('addvideo');

    //Category page view

     Route::post('/addcategory', [WebsiteController::class, 'addcatrgory'])->name('addcategory');

     Route::post('/addtag', [WebsiteController::class, 'addtag'])->name('addtag');


     Route::post('/addcontent', [WebsiteController::class, 'addwebsitecontent'])->name('addwebsite');


     //video delete option 

    Route::post('/videodelete{id}', [WebsiteController::class, 'deletevideo'])->name('videodelete');

     
    Route::get('/editevideo/{id}', [WebsiteController::class, 'videoupdate'])->name('editevideo');

    Route::post('/update', [WebsiteController::class, 'update'])->name('updatevideo');

    Route::get('/addlink', [App\Http\Controllers\SocialworkController::class, 'linkadd'])->name('addlinkform');
    
    Route::post('/linkadd', [App\Http\Controllers\SocialworkController::class, 'socialwork'])->name('linkadd');
    
    Route::get('/linklist', [App\Http\Controllers\SocialworkController::class, 'listlink'])->name('linklist');
    
    //category 
    
    Route::get('/addsocialworkcategory', [App\Http\Controllers\SocialworkController::class, 'categoryaddworkform'])->name('addsocialworcategoryform');
    
    Route::post('/socialworkcategory', [App\Http\Controllers\SocialworkController::class, 'addcategorywork'])->name('addsocialworkcategory');
    
    Route::get('/socialworklist', [App\Http\Controllers\SocialworkController::class, 'socialworklist'])->name('socialworklist');
    
    Route::get('/deletecategorywork/{id}', [App\Http\Controllers\SocialworkController::class, 'deletecategorywork'])->name('socialworkcategorydelete');
    
    Route::get('/socialworstatus', [App\Http\Controllers\SocialworkController::class, 'socialworkstatus'])->name('socialworkstaus');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
