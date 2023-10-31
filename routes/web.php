<?php
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\newMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestDemoController;
use App\Http\Controllers\EmailController;
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
    return view('welcome');
});

// defining route parameter {id}, acceptable: alphabetical & _
// Route::get('/user/{id}', function($id) {
    // return "User " .$id;
// });

// Route parameters {post}, {comment}
Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
    return 'Post: ' .$postId .', ' .'Comment: ' .$commentId;
});

// optional route parameters
// Route::get('/user/{name?}', function($name = 'default') {
//     return 'User Name: ' .$name;
// });


// if only need to return a view
// shorthand        Route::view('/route', 'blade file');
Route::view('/home', 'welcome');

// Route parameter constraints (using 'where' family)
Route::get('/user/{id}', function($id) {
    return 'User Id: ' .$id;
})->whereNumber('id');

Route::get('/userName/{name}', function($name) {
    return "Name: " .$name;
})->whereAlpha('name');

Route::get('/userId/{id}', function($id) {
    return 'User id: ' .$id;
})->whereAlphaNumeric('id');


// see we apply constraint on route paramter, not the variable name we give to the param
Route::get('attandance/{subject}', function($sub) {
    return 'Attandance for subject: ' .$sub;
})->whereIn('subject', ['cpp', 'java']);

Route::get('/regNo/{id}', function($reg) {
    return 'User regno: ' .$reg;
})->where('id', '[0-9]*4');


Route::get('/userInfo/{regNo}/{name}', function($reg, $name) {
    return "User RegNo: " .$reg ." Name: " .$name;
})->whereNumber('regNo')->whereAlpha('name');


/*
    Defining route parameter global constraints
        allows applying constraints to all the routes in application
        useful for enforcing common validation rules on various route param

        done inside boot method of
        app/Providers/RouteServiceProvider.php

        Route::pattern('parameter', 'constraint');
        Route::pattern('id', '[0-9]+');
*/


// redirections
Route::get('/home/dashboard', function() {
    return view('welcome');
});

Route::get('/dashboard', function() {
    return redirect('/home/dashboard');
});


// Redirecting to Named routes
Route::get('/test', ['as' => 'testing', function() {
    return view('test');
}]);

Route::get('redirect', function() {
    return redirect()->route('testing');
    // redirects to 'testing' named route
});


// redirecting to Named route with parameters
Route::get('/profile/{user}', ['as' => 'testing2', function($user) {
    return '<h1> User: ' .$user .'</h1>';
}]);

Route::get('redirect2', function(){
    return redirect()->route('testing2', ['user' => 'root']);
});



// redirecting to controller 'index' method
Route::get('/controller', [UserController::class, 'index']);

// UserController created using -> php artisan make:controller UserController

// redirecting to external domains
Route::get('/git', function() {
    return redirect()->away('https://www.github.com/');
});

Route::get('/operate/{num1}/{num2}', function($num1, $num2) {
    return [$num1 + $num2, $num1 * $num2];
});


// returning response
Route::get('/resp', function() {
    return response('Hello World', 200);
});
// attaching headers to responses
Route::get('/resp2', function() {
    $content = "new content I'm presenting you here!!";
    return response($content)->header('Content-Type', 'text/html');
});

// returning view responses & controlling response headers at the same time
Route::get('/respV', function() {
    return response()
                ->view('test')
                ->header('Content-Type', 'text/html');
});

// returning JSON responses
Route::get('/respV2', function() {
    return response()->json([
        'name' => 'Alpha',
        'state' => 'Bravo'
    ]);
});

// passing data to view {as an array}
Route::get('/greet', function() {
    return view('greetings', ['name' => 'James']);
});

// nested view directories accessing
Route::get('/greet2', function() {
    return view('admin.greet', ['name' => 'admin']);
});

Route::get('/greetMe/{name}', function($user) {
    return view('greetings', ['name'=>$user]);
});

// passing data to views (using 'with' method)
Route::get('/define', function() {
    return view('user.details')
                // ->with('name', 'Alice')
                ->with('occupation', 'America');
});

// another shortcut
Route::get('/define2', function() {
    $name = "fury";
    $occupation = "defence";
    $city = "Mathura";
    // methods created acc to variable names
    return view('user.details')
        ->withName($name)->withOccupation($occupation)
        ->withCity($city);
});


Route::get('/userProfile', [UserController::class, 'showProfile']);


// simple grouping of routes based on prefix
Route::prefix('admin')->group(function() {
    // routes defined here will have the admin prefix now

    Route::get('dashboard', [HomeController::class, 'dashboard']);
    Route::get('users', [HomeController::class, 'users']);
    Route::get('settings', [HomeController::class, 'settings']);
});

// applying middleware to a group
// Route::prefix('admin')->middleware('newMiddleware')->group(function() {
//     // routes defined here will have the 'admin' prefix & use the 'newMiddleware' middleware

//     Route::get('dashboard', [HomeController::class, 'dashboard']);
//     Route::get('users', [HomeController::class, 'users']);
//     Route::get('settings', [HomeController::class, 'settings']);
// });

Route::resource('posts', PostController::class);


Route::get('/user/{id}', [UserController::class, 'getInfo']);

Route::get('/currentUrl', function() {
    return view('current-url');
});

Route::get('/currentUrl2', [UserController::class, 'currentUrl']);

Route::get('/profile2', function() {
    return 'Profile of user!!';
});

Route::get('/frameworkUrl', function() {
    return view('framework-urls');
});

Route::get('generationUrl', function() {
    return view('generation-urls');
});

Route::get('/send-email', [EmailController::class, 'sendMail']);

Route::get('/contact', [FormController::class, 'index']);
Route::post('/contact', [FormController::class, 'store']);


// form macro:
// composer require laravelcollective/html
// php artisan make:provider FormMacroServiceProvider


// Laravel's database abstraction layer - Eloquent ORM
// Eloquent ORM:
// Benefits of ORM:
// 1. No need to write SQL queries
// 2. No need to write code for database connection

// Database Abstraction
// Object Oriented Approach
// Database Independent
// Database Portability

// making a model: php artisan make:model modelName
/**
 * run mysql from zampp
 * create database : create database laravel;
 * use database: use laravel;
 * create table: create table posts(id int(10) auto_increment primary key, title varchar(255), body text);
 * insert data: insert into posts(title, body) values('post1', 'body1');
 * select data: select * from posts;
 *
 * change config/database.php 'mysql' settings, then .env file also
 * php artisan make:migrate create_posts
 * it is a way to define and execute database schema changes using code i.e. Version Control!
 * php artisan migrate
 */


/**
 * php artisan make:model Task -m
 * this will create a 'Task' model in the app/Models and a migration file in the database/migrations
 * php artisan make:controller TaskController
 */

Route::get('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);
Route::delete('tasks/{id}',[TaskController::class,'destroy']);
Route::get('/tasks/search', [TaskController::class, 'search']);


// command for making resource controller:
// php artisan make:controller ControllerName --resource

