<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ProjectController;
// use App\Http\Controllers\Api\WorktimeController;
// use App\Http\Controllers\Api\RequestController;
// use App\Http\Controllers\Api\TeamController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['as' => 'api.'], function () {

    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::post('register', [RegisterController::class, 'register'])->name('register');

    Route::group(['middleware' => ['auth:sanctum']], function () {

        //do I need this?
        // Route::get('email/verify/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

        // Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

        Route::get('users', [UserController::class, 'index'])->name('user');

        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        // Route::resource('tasks', TaskController::class, ['except' => ['create', 'edit']]);

        Route::get('assignedTasks', [TaskController::class, 'getAssignedTasks'])->name('getAssignedTasks');

        Route::get('createdTasks', [TaskController::class, 'getCreatedTasks'])->name('getCreatedTasks');

        Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

        Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');

        Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

        Route::post('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

        Route::get('users/{user}/projects', [ProjectController::class, 'getUserProjects'])->name('getUserProjects');

        Route::get('users/{user}/teamProjects', [ProjectController::class, 'getCreatedAndTeamProjects'])->name('getCreatedAndTeamProjects');

        Route::get('projects/{project}', [TaskContProjectControllerroller::class, 'show'])->name('projects.show');

        Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');

        Route::put('projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

        Route::post('projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

        // Route::resource('projects', ProjectController::class, ['except' => ['create', 'edit']]);

        Route::resource('worktimes', WorktimeController::class, ['except' => ['create', 'edit']]);

        Route::resource('requests', RequestController::class, ['except' => ['create', 'edit']]);

        Route::resource('teams', TeamController::class, ['except' => ['create', 'edit']]);

        Route::post('teams/{team}/users/{user}', [AdminController::class, 'store'])->name('admin.addTeamUser');

        // Route::put('teams/{team}', 'TeamController@update');
    });
});