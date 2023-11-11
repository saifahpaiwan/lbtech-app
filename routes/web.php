<?php

use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\UsersController;
use App\Models\blog;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    $blogs = blog::where('user_id', 1)->first();
     

    dd($blogs?->rUser?->name);

    // if(isset($blogs->mBlogImages) && count($blogs->mBlogImages) > 0){
    //     foreach($blogs->mBlogImages as $row){
    //         echo "<br>".$row->image_name."<br>";
    
    //         echo '<img src="'.asset('/images/blogs').'/'.$row->image_name.'">';
    //     }
    // } 
});
 
// Route::get('/users', function () {
//     return view('users.index');
// })->name('users.index');

// Route::get('/users/create', function () {
//     return view('users.create');
// })->name('users.create');

// Route::get('/users/edit/{id?}/{name?}', function ($id = null, $name = null) {
//     return view('users.edit', compact('id', 'name'));
// })->name('users.edit');


Route::get('/login', [AuthenticatedController::class, 'index'])->name('login');
Route::post('check-login', [AuthenticatedController::class, 'CheckLogin'])->name('check.login'); 
 
Route::middleware(['is_user'])->group(function () {
    Route::post('logout', [AuthenticatedController::class, 'logout'])->name('logout');
    
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('/users/edit/{id?}', [UsersController::class, 'edit'])->name('users.edit');
 
    Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blogs.create');
    Route::get('/blogs/edit/{id?}', [BlogsController::class, 'edit'])->name('blogs.edit');
 
    Route::post('save-blogs', [BlogsController::class, 'SaveBlogs'])->name('save.blogs');
    Route::post('update-blogs', [BlogsController::class, 'UpdateBlogs'])->name('update.blogs');
    Route::post('delete-blogs', [BlogsController::class, 'DeleteBlogs'])->name('delete.blogs');
}); 
 

