<?php

use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\imEquipmentController;
use App\Http\Controllers\Controlleradmin;
use App\Http\Controllers\BorrowingController;

//Borrow
Route::post('/confirm-borrow', [BorrowingController::class, 'borrow']);

//Controlleradmin
Route::post('admin/addems', [Controlleradmin::class, 'store'])->name('add.store');
Route::get('admin/addems', [Controlleradmin::class, 'addview'])->name('add.view');
Route::get('/export', [EquipmentController::class, 'export'])->name('export.equipment');



// Route for home page or dashboard (after login)
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// Example route for user home page after login
Route::get('/home', [HomeController::class, 'index'])->name('users.Home');

// Default route for landing page
Route::get('/', function () {
    return view('welcome');
});

//imEquipmentController
// routes/web.php
Route::post('/equipment/delete-multiple', [EquipmentController::class, 'deleteMultiple'])->name('equipment.deleteMultiple');

Route::get('/importems', [imEquipmentController::class, 'view'])->name('imems.view');

Route::get('equipment/{id}/edit', [imEquipmentController::class, 'edit'])->name('equipment.edit');
Route::put('equipment/{id}', [imEquipmentController::class, 'update'])->name('equipment.update');
Route::delete('equipment/{id}', [imEquipmentController::class, 'destroy'])->name('equipment.destroy');
Route::get('/equipment/create', [imEquipmentController::class, 'view'])->name('equipment.view');
Route::post('/equipment', [imEquipmentController::class, 'store'])->name('equipment.store');
Route::post('upload', [imEquipmentController::class, 'import'])->name('equipment.import');
Route::get('formEquipment/Equipment', [EquipmentController::class, 'show'])->name('equipment.show');
// Route::get('importems', function () {
//     return view('/importems');
// })->name('import.ems');
Route::get('upload', function () {
    return view('upload');
})->name('upload.index');
//
Route::get('admin/Equipment', function () {
    return view('admin/Equipment');
});
Route::get('/', function () {
    return view('auth/login');
})->name('auth/login');

Route::get('/dashboard', function () {
    return view('dashboard');
});


// Route::get('/equipment_view', function(){
//     return view('Equipment');
// });

Route::get('/equipment', [EquipmentController::class, 'show']);
Route::get('users/Userequipment', [EquipmentController::class, 'showUser'])->name('showUser');
Route::get('users/go', [EquipmentController::class, 'showname'])->name('showname');

Route::get('/formEquiment/importEquiment', function () {
    return view('formEquiment/importEquiment');
});
//exportEquiment
Route::get('/formEquiment/exportEquiment', function () {
    return view('formEquiment/exportEquiment');
});

Route::fallback(function () {
    return '<h1>ไม่พบหน้าเว็บ</h1>';

});




Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('layouts/iframe');
Route::get('users/BR', [App\Http\Controllers\HomeController::class, 'BR'])->name('BR.user');
Route::get('users/borrow', [App\Http\Controllers\HomeController::class, 'borrow'])->name('users/borrow');
Route::get('admin/home', [Homecontroller::class, 'adminHome'])->name('admin.home')->Middleware('is_admin');

// routes/web.php

use App\Http\Controllers\Auth\RegisterController;


// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


//routes for Admin
use App\Http\Controllers\Auth\LoginController ;


Route::get('/login', [LoginController::class, 'index'])->name('index.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.login');


Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\ProfileController;

Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');

Route::get('/profile/image', [ProfileController::class, 'showImage'])->name('profile.image');

Route::get(
    'admin/editProfile',
    function () {
        return view('admin/editProfile');
    }
)->name('edit.Profile');

Route::get('/userdashboard', function () {
    return view('users.Userdashboard');
});
Route::get('uers/Userborrow', [
    EquipmentController::class,
    'borrowshow'
])->name('users.Userborrow');

Route::get('/Userequipment.', function () {
    return view('users.Userequipment');
})->name('users.Userequipment');
Route::get('users/Home', function () {
    return view('users/Home');
})->name('users/Home');
Route::get('admin/login', function () {
    return view('admin/login');
})->name('admin/login');

Route::group([
    'middleware' => 'auth',
], function () {
    Route::get('/user-must-be-authed', 'AuthenticatedUserController@index');
});
// Route::get('go', function () {
//     return view('users/go');
// })->middleware('auth');
// Route::get('users/go', function () {
//     return view('users/go');
// })->name('users/go');

