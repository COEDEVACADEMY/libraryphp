<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BooksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    if (Auth::check()) { // Check if the user is authenticated     
        return redirect()->route('home'); // Redirect to the superadmin dashboard
    }
    return view('auth.login'); // If the user is not authenticated, show the login page
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/books', 'BooksController@index')->name('books.index');
Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
Route::post('/books', [BooksController::class, 'store'])->name('books.store');
Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');

Route::middleware(['auth', 'role:superadmin,librarian'])->group(function () {
    Route::get('/dashboard/librarian', [HomeController::class, 'index'])->name('dashboard.librarian');
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
	Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
	
});

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    // Show the edit form for superadmin
	Route::get('/dashboard/superadmin', [HomeController::class, 'index'])->name('dashboard.superadmin');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
	Route::get('/users', [UserController::class, 'index'])->name('user.index');
	Route::post('/users', [UserController::class, 'store'])->name('user.store');
	Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
	Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});
