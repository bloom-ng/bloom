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
use App\Http\Controllers\MailchimpController;

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

    $posts = WinkPost::with('tags')
        ->live()
        ->orderBy('publish_date', 'DESC')
        ->take(6)
        ->get()->shuffle();


    return view('homepage', ['posts' => $posts, 'tags' => WinkTag::all()]);
});

Route::get('/homepage', function () {
    $posts = WinkPost::with('tags')
        ->live()
        ->orderBy('publish_date', 'DESC')
        ->take(7)
        ->get()->shuffle();
    return view('homepage', ['posts' => $posts, 'tags' => WinkTag::all()]);
});

Route::get('/digital', function () {
    return view('digital-marketing');
});

Route::get('/brand-strategy', function () {
    return view('brand_strategy');
});

Route::get('/branding-and-design', function () {
    return view('branding_and_design');
});

Route::get('/content-creation', function () {
    return view('content_creation');
});

Route::get('/creative-campaign', function () {
    return view('creative_campaign');
});

Route::get('/media-planning', function () {
    return view('media_planning');
});

Route::get('/media-production', function () {
    return view('media_production');
});

Route::get('/public-relations', function () {
    return view('public_relations');
});

Route::get('/web-development', function () {
    return view('web_development');
});

Route::get('/single-blog-post', function () {
    return view('single_blog_post');
});

Route::get('/help', function () {
    return view('help');
});

Route::get('/footprint', function () {
    $data = [
        'Reduced Flyers 2-01.jpg', 'Reduced Flyers 2-03.jpg', 'Reduced Flyers 2-04.jpg', 'Reduced Flyers 2-06.jpg', 'Reduced Flyers 2-07.jpg', 'Reduced Flyers 3-02.jpg', 'Reduced Flyers 4-01.jpg', 'Reduced Flyers-01.jpg', 'Reduced Flyers-02.jpg', 'Reduced Flyers-03.jpg', 'Reduced Flyers-04.jpg', 'Reduced Flyers-05.jpg', 'Reduced Flyers-06.jpg', 'Reduced Flyers-07.jpg', 'Reduced Flyers-08.jpg', 'Reduced Flyers-09.jpg', 'Reduced Flyers-10.jpg', 'Reduced Flyers-100.jpg', 'Reduced Flyers-101.jpg', 'Reduced Flyers-102.jpg', 'Reduced Flyers-105.jpg', 'Reduced Flyers-106.jpg', 'Reduced Flyers-107.jpg', 'Reduced Flyers-108.jpg', 'Reduced Flyers-109.jpg', 'Reduced Flyers-11.jpg', 'Reduced Flyers-110.jpg', 'Reduced Flyers-111.jpg', 'Reduced Flyers-112.jpg', 'Reduced Flyers-113.jpg', 'Reduced Flyers-114.jpg', 'Reduced Flyers-115.jpg', 'Reduced Flyers-116.jpg', 'Reduced Flyers-117.jpg', 'Reduced Flyers-118.jpg', 'Reduced Flyers-119.jpg', 'Reduced Flyers-12.jpg', 'Reduced Flyers-120.jpg', 'Reduced Flyers-122.jpg', 'Reduced Flyers-126.jpg', 'Reduced Flyers-128.jpg', 'Reduced Flyers-129.jpg', 'Reduced Flyers-13.jpg', 'Reduced Flyers-14.jpg', 'Reduced Flyers-15.jpg', 'Reduced Flyers-16.jpg', 'Reduced Flyers-17.jpg', 'Reduced Flyers-18.jpg', 'Reduced Flyers-19.jpg', 'Reduced Flyers-20.jpg', 'Reduced Flyers-21.jpg', 'Reduced Flyers-22.jpg', 'Reduced Flyers-23.jpg', 'Reduced Flyers-24.jpg', 'Reduced Flyers-25.jpg', 'Reduced Flyers-26.jpg', 'Reduced Flyers-27.jpg', 'Reduced Flyers-28.jpg', 'Reduced Flyers-29.jpg', 'Reduced Flyers-30.jpg', 'Reduced Flyers-31.jpg', 'Reduced Flyers-32.jpg', 'Reduced Flyers-33.jpg', 'Reduced Flyers-34.jpg', 'Reduced Flyers-35.jpg', 'Reduced Flyers-36.jpg', 'Reduced Flyers-37.jpg', 'Reduced Flyers-38.jpg', 'Reduced Flyers-39.jpg', 'Reduced Flyers-40.jpg', 'Reduced Flyers-41.jpg', 'Reduced Flyers-42.jpg', 'Reduced Flyers-43.jpg', 'Reduced Flyers-44.jpg', 'Reduced Flyers-45.jpg', 'Reduced Flyers-46.jpg', 'Reduced Flyers-47.jpg', 'Reduced Flyers-48.jpg', 'Reduced Flyers-49.jpg', 'Reduced Flyers-50.jpg', 'Reduced Flyers-51.jpg', 'Reduced Flyers-52.jpg', 'Reduced Flyers-53.jpg', 'Reduced Flyers-54.jpg', 'Reduced Flyers-55.jpg', 'Reduced Flyers-56.jpg', 'Reduced Flyers-57.jpg', 'Reduced Flyers-58.jpg', 'Reduced Flyers-59.jpg', 'Reduced Flyers-60.jpg', 'Reduced Flyers-61.jpg', 'Reduced Flyers-62.jpg', 'Reduced Flyers-63.jpg', 'Reduced Flyers-64.jpg', 'Reduced Flyers-65.jpg', 'Reduced Flyers-66.jpg', 'Reduced Flyers-67.jpg', 'Reduced Flyers-68.jpg', 'Reduced Flyers-69.jpg', 'Reduced Flyers-70.jpg', 'Reduced Flyers-71.jpg', 'Reduced Flyers-72.jpg', 'Reduced Flyers-73.jpg', 'Reduced Flyers-74.jpg', 'Reduced Flyers-75.jpg', 'Reduced Flyers-76.jpg', 'Reduced Flyers-77.jpg', 'Reduced Flyers-78.jpg', 'Reduced Flyers-79.jpg', 'Reduced Flyers-80.jpg', 'Reduced Flyers-81.jpg', 'Reduced Flyers-82.jpg', 'Reduced Flyers-83.jpg', 'Reduced Flyers-84.jpg', 'Reduced Flyers-85.jpg', 'Reduced Flyers-86.jpg', 'Reduced Flyers-87.jpg', 'Reduced Flyers-88.jpg', 'Reduced Flyers-89.jpg', 'Reduced Flyers-90.jpg', 'Reduced Flyers-91.jpg', 'Reduced Flyers-92.jpg', 'Reduced Flyers-93.jpg', 'Reduced Flyers-94.jpg', 'Reduced Flyers-95.jpg', 'Reduced Flyers-96.jpg', 'Reduced Flyers-97.jpg', 'Reduced Flyers-98.jpg', 'Reduced Flyers-99.jpg', 'Untitled-1-134.jpg', 'Untitled-1-47.jpg', 'Untitled-1-48.jpg', 'Untitled-1-50.jpg', 'Untitled-1-53.jpg', 'Untitled-1-60.jpg', 'Untitled-1-61.jpg',
    ];
    $studios = [
        'Reduced 1-01.jpg', 'Reduced 1-02.jpg', 'Reduced 1-03.jpg', 'Reduced 1-04.jpg', 'Reduced 1-05.jpg', 'Reduced 1-06.jpg', 'Reduced 1-07.jpg', 'Reduced 1-08.jpg', 'Reduced 1-09.jpg', 'Reduced 1-10.jpg', 'Reduced 1-11.jpg', 'Reduced 1-12.jpg', 'Reduced 1-13.jpg', 'Reduced 1-14.jpg', 'Reduced 1-15.jpg', 'Reduced 1-16.jpg', 'Reduced 1-17.jpg', 'Reduced 1-18.jpg', 'Reduced 1-19.jpg', 'Reduced 1-20.jpg', 'Reduced 1-21.jpg', 'Reduced 1-22.jpg', 'Reduced 1-23.jpg', 'Reduced 1-24.jpg', 'Reduced 1-25.jpg', 'Reduced 1-26.jpg', 'Reduced 1-27.jpg', 'Reduced 1-28.jpg', 'Reduced 1-29.jpg', 'Reduced 1-30.jpg', 'Reduced 1-31.jpg', 'Reduced 1-32.jpg', 'Reduced 1-33.jpg', 'Reduced 1-34.jpg', 'Reduced 1-35.jpg', 'Reduced 1-36.jpg', 'Reduced 1-37.jpg', 'Reduced 1-38.jpg', 'Reduced 1-39.jpg', 'Reduced 1-40.jpg', 'Reduced 1-41.jpg', 'Reduced 1-42.jpg', 'Reduced 1-43.jpg', 'Reduced 1-44.jpg', 'Reduced 1-45.jpg', 'Reduced 1-46.jpg', 'Reduced 1-47.jpg', 'Reduced 1-48.jpg', 'Reduced 1-49.jpg', 'Reduced 1-50.jpg', 'Reduced 1-51.jpg', 'Reduced 1-52.jpg', 'Reduced 1-53.jpg', 'Reduced 1-54.jpg', 'Reduced 1-55.jpg', 'Reduced 1-56.jpg', 'Reduced 1-57.jpg', 'Reduced 1-58.jpg', 'Reduced 1-59.jpg', 'Reduced 1-60.jpg', 'Reduced 1-61.jpg', 'Reduced 1-62.jpg', 'Reduced 1-63.jpg', 'Reduced 1-64.jpg', 'Reduced 1-65.jpg', 'Reduced 1-66.jpg', 'Reduced 1-67.jpg', 'Reduced 1-68.jpg', 'Reduced 1-69.jpg', 'Reduced 1-70.jpg', 'Reduced 1-71.jpg', 'Reduced 1-72.jpg', 'Reduced 1-73.jpg', 'Reduced 1-74.jpg', 'Reduced 1-75.jpg', 'Reduced 1-76.jpg', 'Reduced 1-77.jpg', 'Reduced 1-78.jpg', 'Reduced 1-79.jpg', 'Reduced 1-80.jpg', 'Reduced 2-01.jpg', 'Reduced 2-02.jpg', 'Reduced 2-03.jpg', 'Reduced 2-04.jpg', 'Reduced 2-05.jpg', 'Reduced 2-06.jpg', 'Reduced 2-07.jpg', 'Reduced 2-08.jpg', 'Reduced 2-09.jpg', 'Reduced 2-10.jpg', 'Reduced 2-11.jpg', 'Reduced 2-12.jpg', 'Reduced 2-13.jpg', 'Reduced 2-14.jpg', 'Reduced 2-15.jpg', 'Reduced 2-16.jpg', 'Reduced 2-17.jpg', 'Reduced 2-18.jpg', 'Reduced 2-19.jpg', 'Reduced 2-20.jpg', 'Reduced 2-21.jpg', 'Reduced 2-22.jpg', 'Reduced 2-23.jpg', 'Reduced 2-24.jpg', 'Reduced 2-25.jpg', 'Reduced 2-26.jpg', 'Reduced 2-27.jpg', 'Reduced 2-28.jpg', 'Reduced 2-29.jpg', 'Reduced 2-30.jpg',
    ];

    return view('footprint', ['data' => $data], ['studios' => $studios]);
});


Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact_us');
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


Route::get('/blog', [BlogController::class, 'index']);

Route::get('/blog/{slug}', [BlogController::class, 'show']);

Route::get('/meeting', [MeetingController::class, 'index']);
Route::get('/meeting/{slug}', [MeetingController::class, 'show']);

Route::post('/subscribers', [SubscriberController::class, 'store']);
Route::get('/subscribers', [SubscriberController::class, 'index'])->middleware('auth');
Route::get('/subscribers/generate', [SubscriberController::class, 'generate'])->middleware('auth');
Route::delete('/subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->middleware('auth');

Route::get('/privacy-policy', function () {
    return view('privacy_policy');
});

Route::resources(['company' => CompanyController::class]);

//Special routes

Route::get('/sitemap', function () {
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

Route::get('/commands/{name}/{key}/{command}', function (Artisan $artisan, $name, $key, $command) {
    $commander = ConfigKey::where('name', $name)->first();
    if ($commander) {
        if (Hash::check($key, $commander->config_key)) {
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
Route::post('/appointments', [AppointmentController::class, 'store']);




//Dashboard Routes




Route::prefix('dashboard')->group(function () {

    Route::get('/', function () {
        return redirect('/dashboard/home');
    });
    Route::get('/login', function () {
        return view('dashboard.login');
    })->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', [LogoutController::class, 'logout'])->middleware('auth');

    Route::get('/home', [DashboardController::class, 'index'])->middleware('auth');


    Route::resource('users', UserController::class)->middleware('auth');
    Route::get('/users/{user}/reset-password', [UserController::class, 'resetPassword']);
    Route::get('/users/{user}/toggle-featured', [UserController::class, 'toggleFeatured']);

    Route::resource('profile', UserAccountController::class)->middleware('auth');
    Route::patch('/profile/{id}/update-profile', [UserAccountController::class, 'updateProfile'])->middleware('auth');
    Route::post('/profile/{user}/upload-photo', [UserAccountController::class, 'uploadPhoto'])->middleware('auth');
    Route::post('/profile/{user}/reset-password', [UserAccountController::class, 'resetPassword'])->middleware('auth');
    Route::patch('/profile/{user}/change-password', [UserAccountController::class, 'changePassword'])->middleware('auth');



    Route::get('/appointments', [AppointmentController::class, 'index'])->middleware('auth');
    Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->middleware('auth');
    Route::get('/appointments/{id}/single', [AppointmentController::class, 'myAppointment'])->middleware('auth');

    Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth');
    Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->middleware('auth');
    Route::patch('/tasks/{task}', [TaskController::class, 'update'])->middleware('auth');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->middleware('auth');
    Route::get('/tasks/{id}/single', [TaskController::class, 'myTask'])->middleware('auth');
    Route::get('/tasks/{task}/toggle-status', [TaskController::class, 'toggleStatus'])->middleware('auth');
});



// Route::get('/ping-mailchimp-api', [MailchimpController::class, 'pingMailchimpAPI']);
Route::post('/add-to-mailchimp-list', [MailchimpController::class, 'addToMailchimpList'])->name('addToMailchimpList');
// Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');



//CAPTCH Reload
Route::get("/reload-captcha", [ContactController::class, 'reloadCaptcha']);
