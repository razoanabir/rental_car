<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\editProfileController;
use App\Http\Controllers\ExtraFacilityController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Models\Branch;
use App\Models\Cars;
use App\Models\Category;
use App\Models\ExtraFacility;
use App\Models\Feature;
use App\Models\Home;
use App\Models\Post;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {

    Route::get('register', [AdminRegisterController::class, 'create'])->name('admin.register');
    Route::post('register', [AdminRegisterController::class, 'store']);

    Route::get('login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'store']);


});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    
    Route::get('logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');
    Route::get('/dashboard', function () {
        $dashboard_data   = Home::first();
        $totalReservation = Reservation::count();
        $totalCars        = Cars::count();
        $reservation      = Reservation::get();
        $successfulReservations = Reservation::where('reservation_status', 'confirmed')->count();
        $totalCost        = Reservation::where('reservation_status', 'confirmed')
        ->with(['extraFacility', 'cars']) // Load the relationships
        ->get() // Get the records
        ->sum(function ($reservation) {
            return ($reservation->extraFacility->cost ?? 0) + ($reservation->cars->price ?? 0);
        });
        
        return view('admin.dashboard', compact(
            'dashboard_data',
            'totalCars',
            'totalReservation',
            'reservation',
            'successfulReservations',
            'totalCost',
        ));
    })->name('admin.dashboard');

//========================================Dashboard-search=======================================================================
Route::get('/admin/search', function (Illuminate\Http\Request $request) {
    $query = $request->input('query');

    $results = collect();

    $results = $results->merge(Post::where('title', 'LIKE', '%' . $query . '%')
        ->take(10)
        ->get(['id', 'title as title'])
        ->map(function ($item) {
            $item->type = 'Post';
            return $item;
        })
    );
    $results = $results->merge(Branch::where('location', 'LIKE', '%' . $query . '%')
        ->take(10)
        ->get(['id', 'location as title'])
        ->map(function ($item) {
            $item->type = 'Branch';
            return $item;
        })
    );
    $results = $results->merge(Cars::where('vehicle_model_name', 'LIKE', '%' . $query . '%')
        ->take(10)
        ->get(['id', 'vehicle_model_name as title'])
        ->map(function ($item) {
            $item->type = 'Cars';
            return $item;
        }));
    $results = $results->merge(Category::where('category_name', 'LIKE', '%' . $query . '%')
        ->take(10)
        ->get(['id', 'category_name as title'])
        ->map(function ($item) {
            $item->type = 'Categroy';
            return $item;
        })
    );
    $results = $results->merge(ExtraFacility::where('title', 'LIKE', '%' . $query . '%')
        ->take(10)
        ->get(['id', 'title as title'])
        ->map(function ($item) {
            $item->type = 'ExtraFacility';
            return $item;
        })
    );
    $results = $results->merge(Feature::where('title', 'LIKE', '%' . $query . '%')
        ->take(10)
        ->get(['id', 'title as title'])
        ->map(function ($item) {
            $item->type = 'Feature';
            return $item;
        }));
    $results = $results->merge(Reservation::where('name', 'LIKE', '%' . $query . '%')
        ->take(10)
        ->get(['id', 'name as title'])
        ->map(function ($item) {
            $item->type = 'Reservation';
            return $item;
        })
    );
    $results = $results->merge(Service::where('title', 'LIKE', '%' . $query . '%')
        ->take(10)
        ->get(['id', 'title as title'])
        ->map(function ($item) {
            $item->type = 'Service';
            return $item;
        })
    );
    $results = $results->merge(Team::where('name', 'LIKE', '%' . $query . '%')
        ->take(10)
        ->get(['id', 'name as title'])
        ->map(function ($item) {
            $item->type = 'Team';
            return $item;
        })
    );
    $results = $results->merge(Testimonial::where('name', 'LIKE', '%' . $query . '%')
        ->take(10)
        ->get(['id', 'name as title'])
        ->map(function ($item) {
            $item->type = 'Testimonial';
            return $item;
        })
    );

    return response()->json($results->values());
})->name('search');
//========================================Service=======================================================================
    Route::get('/view-service',[ServiceController::class, 'view'])->name('view.service');
    Route::get('/add-service',[ServiceController::class, 'add'])->name('add.service');
    Route::get('/edit-service/{id}',[ServiceController::class, 'edit'])->name('edit.service');
    Route::post('/store-service',[ServiceController::class, 'store'])->name('store.service');
    Route::post('/update-service/{id}',[ServiceController::class, 'update'])->name('update.service');
    Route::get('/delete-service/{id}',[ServiceController::class, 'delete'])->name('delete.service');

//========================================Team===========================================================================
    Route::get('/view-team',[TeamController::class, 'view'])->name('view.team');
    Route::get('/add-team',[TeamController::class, 'add'])->name('add.team');
    Route::get('/edit-team/{id}',[TeamController::class, 'edit'])->name('edit.team');
    Route::post('/store-team',[TeamController::class, 'store'])->name('store.team');
    Route::post('/update-team/{id}',[TeamController::class, 'update'])->name('update.team');
    Route::get('/delete-team/{id}',[TeamController::class, 'delete'])->name('delete.team');

//========================================Feature=========================================================================
    Route::get('/view-feature',[FeatureController::class, 'view'])->name('view.feature');
    Route::get('/add-feature',[FeatureController::class, 'add'])->name('add.feature');
    Route::get('/edit-feature/{id}',[FeatureController::class, 'edit'])->name('edit.feature');
    Route::post('/store-feature',[FeatureController::class, 'store'])->name('store.feature');
    Route::post('/update-feature/{id}',[FeatureController::class, 'update'])->name('update.feature');
    Route::get('/delete-feature/{id}',[FeatureController::class, 'delete'])->name('delete.feature');
    
//========================================Testimonial================================================================================
    Route::get('/view-testimonial',[TestimonialController::class, 'view'])->name('view.testimonial');
    Route::get('/add-testimonial',[TestimonialController::class, 'add'])->name('add.testimonial');
    Route::get('/edit-testimonial/{id}',[TestimonialController::class, 'edit'])->name('edit.testimonial');
    Route::post('/store-testimonial',[TestimonialController::class, 'store'])->name('store.testimonial');
    Route::post('/update-testimonial/{id}',[TestimonialController::class, 'update'])->name('update.testimonial');
    Route::get('/delete-testimonial/{id}',[TestimonialController::class, 'delete'])->name('delete.testimonial');

//========================================Our-Cars===========================================================
    Route::get('/view-cars',[CarsController::class, 'view'])->name('view.cars');
    Route::get('/add-cars',[CarsController::class, 'add'])->name('add.cars');
    Route::get('/edit-cars/{id}',[CarsController::class, 'edit'])->name('edit.cars');
    Route::post('/store-cars',[CarsController::class, 'store'])->name('store.cars');
    Route::post('/update-cars/{id}',[CarsController::class, 'update'])->name('update.cars');
    Route::get('/delete-cars/{id}',[CarsController::class, 'delete'])->name('delete.cars');

//========================================About-page===========================================================
    Route::get('/view-about-page',[AboutController::class, 'view'])->name('view.about');
    Route::post('/store-about-page',[AboutController::class, 'store'])->name('store.about');

//========================================Home-page===========================================================
    Route::get('/view-home-page',[HomeController::class, 'view'])->name('view.home');
    Route::post('/store-home-page',[HomeController::class, 'store'])->name('store.home');

//========================================Personal-Information-page===================================================================================
    Route::get('/view-personal-information',[PersonalInformationController::class, 'view'])->name('view.personal.information');
    Route::post('/store-personal-information',[PersonalInformationController::class, 'store'])->name('store.personal.information');

//========================================Our-Branch==================================================================
    Route::get('/view-branch',[BranchController::class, 'view'])->name('view.branch');
    Route::get('/add-branch',[BranchController::class, 'add'])->name('add.branch');
    Route::get('/edit-branch/{id}',[BranchController::class, 'edit'])->name('edit.branch');
    Route::post('/store-branch',[BranchController::class, 'store'])->name('store.branch');
    Route::post('/update-branch/{id}',[BranchController::class, 'update'])->name('update.branch');
    Route::get('/delete-branch/{id}',[BranchController::class, 'delete'])->name('delete.branch');

//========================================Blog-Post========================================================================
    Route::get('/view-blog-post',[PostController::class, 'view'])->name('view.blog.post');
    Route::get('/add-blog-post',[PostController::class, 'add'])->name('add.blog.post');
    Route::get('/edit-blog-post/{id}',[PostController::class, 'edit'])->name('edit.blog.post');
    Route::post('/store-blog-post',[PostController::class, 'store'])->name('store.blog.post');
    Route::post('/update-blog-post/{id}',[PostController::class, 'update'])->name('update.blog.post');
    Route::get('/delete-blog-post/{id}',[PostController::class, 'delete'])->name('delete.blog.post');

//========================================Category===========================================================================
    Route::get('/view-category',[CategoryController::class, 'view'])->name('view.category');
    Route::post('/store-category',[CategoryController::class, 'store'])->name('store.category');
    Route::get('/edit-category/{id}',[CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/update-category/{id}',[CategoryController::class, 'update'])->name('update.category');
    Route::get('/delete-category/{id}',[CategoryController::class, 'delete'])->name('delete.category');

//==========================================edit-profile=====================================================================================
    Route::get('/view-edit-profile', [editProfileController::class, 'settings'])->name('edit-profile');
    Route::post('/update-info/{id}',[editProfileController::class, 'update_info'])->name('update.info');
    Route::post('/update-password/{id}',[editProfileController::class, 'update_password'])->name('update.password');
    Route::post('/delete-admin-data/{id}',[editProfileController::class, 'deleteAdminData'])->name('delete_admin_data');

//========================================Extra-Facility======================================================================================
    Route::get('/view-extra-facility',[ExtraFacilityController::class, 'view'])->name('view.extra.facility');
    Route::get('/add-extra-facility',[ExtraFacilityController::class, 'add'])->name('add.extra.facility');
    Route::get('/edit-extra-facility/{id}',[ExtraFacilityController::class, 'edit'])->name('edit.extra.facility');
    Route::post('/store-extra-facility',[ExtraFacilityController::class, 'store'])->name('store.extra.facility');
    Route::post('/update-extra-facility/{id}',[ExtraFacilityController::class, 'update'])->name('update.extra.facility');
    Route::get('/delete-extra-facility/{id}',[ExtraFacilityController::class, 'delete'])->name('delete.extra.facility');

//=========================================Reservation-details=================================================================================
    Route::get('/reservation-details/{id}',[ReservationController::class, 'reservation_details'])->name('reservation.details');
    Route::post('/reservation-status/{id}',[ReservationController::class, 'reservation_status'])->name('reservation.status');
    Route::get('/delete-reservation/{id}',[ReservationController::class, 'delete'])->name('delete.reservation');


});
