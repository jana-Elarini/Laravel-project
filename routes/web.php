

<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\AdminController;
//use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;

// ✅ Home page
Route::get('/', [PostController::class, 'home'])->name('posts.home');

// ✅ Dashboard (للمستخدمين العاديين بعد اللوجين)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ✅ Posts routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Routes only for logged in users
Route::middleware('auth')->group(function () {
    // Create & Store
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    // Edit, Update & Delete
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Show route (must always be last)
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// ✅ Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::middleware(['auth', 'admin'])->group(function () {
    
    //Route::resource('/admin/posts', AdminController::class);
//});





require __DIR__.'/auth.php';



