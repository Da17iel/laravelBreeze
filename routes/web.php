<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/', function() {
    return redirect()->route('home');
});

// Group the Methods that should inherit from auth
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return Inertia::render('Home', [
            "name"=> "Daniel",
            "age" => 18,
            "gender" => "Attack Helicopter",
            "favoriteDishes" => [
                "Burger", "Pizza", "Pasta", "Food in general"],
            "time"=> time()
        ]);
    })->name('home');


    Route::get('/settings', function () {
        return Inertia::render('Settings');
    })->name('settings');

    Route::get('/profile', function () {
        return Inertia::render('Profile');
    })->name('settings');

    Route::get('/users', function () {
        return Inertia::render('Users', [
            'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString() // generates the paginate Links while taking into account the current Query
                ->through(fn($user) => [
                    // With the help of this map, you can just give all the usernames to
                    // the webpage. And not fields like password and so on.
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                ]),

            'filters' => Request::only(['search'])
        ]);
    })->name('users');

    Route::post('/users', function () {
        // Validate Request
        $attributes = Request::validate([
            'name' => 'required',
            'username' => 'required|unique:users|max:100|alpha:ascii',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation ' => ''
        ]);
        // Create the user
        User::create($attributes);

        // redirect
        return redirect('/users');
    });

    Route::get('/users/create', function () {
        sleep(1);
        return Inertia::render('CreateUser');
    })->name('users.create');

    Route::get('/user/{user:username}/edit', function (User $user) {
        return Inertia::render('EditUser', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'created_at' => $user->created_at
            ],
            'userCreatedAgo' => \Carbon\Carbon::parse($user->created_at)->diffForHumans(\Carbon\Carbon::now(), true)
        ]);
    })->name('users.edit');
});

// Every single route in here will inherit the auth middleware
/*

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/



//require __DIR__ . '/auth.php';
