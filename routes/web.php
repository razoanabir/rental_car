<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Models\About;
use App\Models\Branch;
use App\Models\Cars;
use App\Models\Feature;
use App\Models\Home;
use App\Models\PersonalInformation;
use App\Models\Post;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//main-project
Route::get('/', function () {
    $cars = Cars::get();
    $home = Home::first();
    $about= About::first();
    $service = Service::get();
    $team    = Team::get();
    $features= Feature::get();
    $personalInformation = PersonalInformation::first();
    $testimonial= Testimonial::get();
    $branch     = Branch::get();
    $post       = Post::get();

    return view('rental_car.master',
    compact(
        'personalInformation',
        'cars',
        'home',
        'about',
        'service',
        'team',
        'features',
        'testimonial',
        'branch',
        'post',
    ));
})->name('rental_car');

//showing the details of blog post
Route::get('/blog/{id}', function($id) {
    $post = post::findOrFail($id);
    return response()->json([
        'title' => $post->title,
        'image' => $post->image,
        'author'=> $post->author,
        'created_at' => $post->created_at->format('d M Y'),
        'details'    => $post->details
    ]);
});

//this is for sending reservation request
Route::get('/reservation', [ReservationController::class, 'reservation'])->name('reservation');
Route::post('/store-reservation', [ReservationController::class, 'store_reservation'])->name('store.reservation');


//this is for sending mail
Route::post('/send-mail', [MailController::class, 'send_mail'])->name('send.mail');

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
