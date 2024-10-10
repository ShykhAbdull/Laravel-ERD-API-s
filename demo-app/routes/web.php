<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get("/about", function(){

return view("about") ;
});


// dynamically send the ID in the route like that
Route::get("/about/{id?}", function($val=null){
    if($val){
    return "<h1>This is the About Page of User's Post ID :{$val} </h1>";

}else{
        return "<h1>You forgot to enter ID </h1>";
    }
}) -> whereNumber("id");


// Bbelow are the Two ways of Making a route 

// Route::get("/about", function() {

//     return view("about");
// });


// Route::view("about", "/about");
// Route::view("/about/inside-about", "inside-about");


//          Route Name (Path)
Route::get("/about/inside-about", function(){

//               View FileName 
    return view("inside-about");
}
) -> name("InsideAbout");


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route fallback function returns the page while replacing 404 error page
Route::fallback(function(){

    return "<h1>Page Note Found </h1>";
});

require __DIR__.'/auth.php';
