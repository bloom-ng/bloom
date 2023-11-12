<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CompanyController;
use App\Models\User;
use App\Models\Appointment;
use App\Models\ConfigKey;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Wink\Wink;
use Wink\WinkPost;
use Wink\WinkTag;

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



Route::get('/', function (){

    $posts = WinkPost::with('tags')
                ->live()
                ->orderBy('publish_date','DESC')
                ->take(7)
                ->get()->shuffle();


    return view('home',['posts'=>$posts, 'tags'=>WinkTag::all()]);
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', [ContactController::class, 'store']);
Route::get('/contacts/list', [ContactController::class, 'index'])->middleware('auth');
Route::get('/contacts/generate', [ContactController::class, 'generate'])->middleware('auth');
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->middleware('auth');


Route::get('/about', function () {
    return view('about');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/ourworks', function () {
    return view('ourworks');
});

/*
 * CASE STUDIES ROUTES
 */

Route::get('/ourworks/inec', function () {
    return view('case_study.inec');
});

Route::get('/ourworks/ty-danjuma', function () {
    return view('case_study.ty_danjuma');
});

Route::get('/ourworks/air-peace', function () {
    return view('case_study.air_peace');
});

/*
 * CASE STUDIES ROUTES END
 */


Route::get('/blog',[BlogController::class,'index'] );

Route::get('/blog/{slug}', [BlogController::class,'show']);

Route::get('/meeting',[MeetingController::class,'index']);
Route::get('/meeting/{slug}', [MeetingController::class,'show'] );

Route::post('/subscribers', [SubscriberController::class, 'store']);
Route::get('/subscribers', [SubscriberController::class, 'index'])->middleware('auth');
Route::get('/subscribers/generate', [SubscriberController::class, 'generate'])->middleware('auth');
Route::delete('/subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->middleware('auth');

Route::resources(['company' => CompanyController::class]);

//Special routes

Route::get('/sitemap', function(){
    $sitemap = Sitemap::create()
                ->add(Url::create('/'))
                ->add(Url::create('/about'))
                ->add(Url::create('/meeting'))
                ->add(Url::create('/contact'))
                ->add(Url::create('/services'));
    $posts = WinkPost::all();
    foreach ($posts as $post) {
        $sitemap->add(Url::create("/blog/$post->slug"));
    }
    $sitemap->writeToFile('sitemap.xml');
    return redirect('/');
});

Route::get('/commands/{name}/{key}/{command}', function(Artisan $artisan, $name, $key, $command ){
    $commander = ConfigKey::where('name',$name)->first();
    if($commander){
        if(Hash::check($key,$commander->config_key)){
            $commands = explode("+", $command);
            $commands = implode(' ', $commands);
           $artisan::call($commands);
           return 'Done';

        }
        abort(404);
    }

    abort(404);

});


//Booking Route
Route::post('/appointments', [AppointmentController::class,'store']);




//Dashboard Routes




Route::prefix('dashboard')->group(function(){

    Route::get('/',function(){return redirect('/dashboard/home');});
    Route::get('/login', function(){return view('dashboard.login');})->name('login');
    Route::post('/login',[LoginController::class,'login']);
    Route::get('/logout', [LogoutController::class,'logout'])->middleware('auth');

    Route::get('/home', [DashboardController::class,'index'])->middleware('auth');


    Route::resource('users',UserController::class)->middleware('auth');
    Route::get('/users/{user}/reset-password', [UserController::class,'resetPassword']);
    Route::get('/users/{user}/toggle-featured', [UserController::class,'toggleFeatured']);

    Route::resource('profile',UserAccountController::class)->middleware('auth');
    Route::patch('/profile/{id}/update-profile',[UserAccountController::class,'updateProfile'])->middleware('auth');
    Route::post('/profile/{user}/upload-photo',[UserAccountController::class,'uploadPhoto'])->middleware('auth');
    Route::post('/profile/{user}/reset-password',[UserAccountController::class,'resetPassword'])->middleware('auth');
    Route::patch('/profile/{user}/change-password',[UserAccountController::class,'changePassword'])->middleware('auth');



    Route::get('/appointments', [AppointmentController::class,'index'])->middleware('auth');
    Route::delete('appointments/{appointment}',[AppointmentController::class,'destroy'])->middleware('auth');
    Route::get('/appointments/{id}/single',[AppointmentController::class,'myAppointment'])->middleware('auth');

    Route::get('/tasks', [TaskController::class,'index'])->middleware('auth');
    Route::post('/tasks', [TaskController::class,'store'])->middleware('auth');
    Route::get('/tasks/{task}/edit', [TaskController::class,'edit'])->middleware('auth');
    Route::patch('/tasks/{task}', [TaskController::class,'update'])->middleware('auth');
    Route::delete('/tasks/{task}',[TaskController::class,'destroy'])->middleware('auth');
    Route::get('/tasks/{id}/single',[TaskController::class,'myTask'])->middleware('auth');
    Route::get('/tasks/{task}/toggle-status',[TaskController::class,'toggleStatus'])->middleware('auth');

 });







