<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Personal\Comment\EditController;
use App\Http\Controllers\Personal\Comment\UpdateController;
use App\Http\Controllers\Personal\Liked\DeleteController;
use App\Http\Controllers\Personal\PersonalController;
use App\Http\Controllers\Admin\Post\IndexController as PostIndexController;
use App\Http\Controllers\Admin\Post\CreateController as PostCreateController;
use App\Http\Controllers\Admin\Post\StoreController as PostStoreController;
use App\Http\Controllers\Admin\Post\ShowController as PostShowController;
use App\Http\Controllers\Admin\Post\EditController as PostEditController;
use App\Http\Controllers\Admin\Post\UpdateController as PostUpdateController;
use App\Http\Controllers\Admin\Post\DeleteController as PostDeleteController;
use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Category\CreateController as CategoryCreateController;
use App\Http\Controllers\Admin\Category\StoreController as CategoryStoreController;
use App\Http\Controllers\Admin\Category\ShowController as CategoryShowController;
use App\Http\Controllers\Admin\Category\EditController as CategoryEditController;
use App\Http\Controllers\Admin\Category\UpdateController as CategoryUpdateController;
use App\Http\Controllers\Admin\Category\DeleteController as CategoryDeleteController;
use App\Http\Controllers\Admin\Tag\IndexController as TagIndexController;
use App\Http\Controllers\Admin\Tag\CreateController as TagCreateController;
use App\Http\Controllers\Admin\Tag\StoreController as TagStoreController;
use App\Http\Controllers\Admin\Tag\ShowController as TagShowController;
use App\Http\Controllers\Admin\Tag\EditController as TagEditController;
use App\Http\Controllers\Admin\Tag\UpdateController as TagUpdateController;
use App\Http\Controllers\Admin\Tag\DeleteController as TagDeleteController;
use App\Http\Controllers\Admin\User\IndexController as UserIndexController;
use App\Http\Controllers\Admin\User\CreateController as UserCreateController;
use App\Http\Controllers\Admin\User\StoreController as UserStoreController;
use App\Http\Controllers\Admin\User\ShowController as UserShowController;
use App\Http\Controllers\Admin\User\EditController as UserEditController;
use App\Http\Controllers\Admin\User\UpdateController as UserUpdateController;
use App\Http\Controllers\Admin\User\DeleteController as UserDeleteController;
use App\Http\Controllers\Personal\Liked\IndexController as LikedController;
use App\Http\Controllers\Personal\Comment\IndexController as CommentController;
use App\Http\Controllers\Personal\Comment\StoreController as CommentDeleteController;
use App\Http\Controllers\Main\IndexController as MainIndexController;
use App\Http\Controllers\Post\IndexController as PostMainIndexController;
use \App\Http\Controllers\Post\Comment\StoreController as CommentStoreController;
use \App\Http\Controllers\Post\Like\StoreController as LikeStoreController;

use App\Http\Controllers\Post\ShowController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [MainIndexController::class, '__invoke'])->name('main.index');
});

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', [PostMainIndexController::class, '__invoke'])->name('post.index');
    Route::get('/{post}', [ShowController::class, '__invoke'])->name('post.show');

    Route::post('/{post}/comment', [CommentStoreController::class, '__invoke'])->name('post.comment.store');
    Route::post('/{post}/likes', [LikeStoreController::class, '__invoke'])->name('post.like.store');

});


Route::middleware(['auth', 'verified'])->prefix('personal')->group(function () {
    Route::get('/main', [PersonalController::class, 'index'])->name('personal.main.index');
    Route::get('/liked', [LikedController::class, 'index'])->name('personal.liked.index');
    Route::delete('/{post}', [DeleteController::class, 'index'])->name('personal.liked.delete');


    Route::get('/comments', [CommentController::class, 'index'])->name('personal.comment.index');
    Route::get('/{comment}/edit', [EditController::class, 'index'])->name('personal.comment.edit');
    Route::patch('/{comment}/', [UpdateController::class, 'index'])->name('personal.comment.update');
    Route::delete('/comments/{comment}', [CommentDeleteController::class, 'index'])->name('personal.comment.delete');

});


Route::middleware(['auth', 'admin', 'verified'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.main.index');


    Route::get('/posts', [PostIndexController::class, '__invoke'])->name('admin.post.index');
    Route::get('/posts/create', [PostCreateController::class, '__invoke'])->name('admin.post.create');
    Route::post('/posts', [PostStoreController::class, '__invoke'])->name('admin.post.store');
    Route::get('/posts/{post}', [PostShowController::class, '__invoke'])->name('admin.post.show');
    Route::get('/posts/{post}/edit', [PostEditController::class, '__invoke'])->name('admin.post.edit');
    Route::patch('/posts/{post}', [PostUpdateController::class, '__invoke'])->name('admin.post.update');
    Route::delete('/posts/{post}', [PostDeleteController::class, '__invoke'])->name('admin.post.delete');

    Route::get('/categories', [CategoryIndexController::class, '__invoke'])->name('admin.category.index');
    Route::get('/categories/create', [CategoryCreateController::class, '__invoke'])->name('admin.category.create');
    Route::post('/categories', [CategoryStoreController::class, '__invoke'])->name('admin.category.store');
    Route::get('/categories/{category}', [CategoryShowController::class, '__invoke'])->name('admin.category.show');
    Route::get('/categories/{category}/edit', [CategoryEditController::class, '__invoke'])->name('admin.category.edit');
    Route::patch('/categories/{category}', [CategoryUpdateController::class, '__invoke'])->name('admin.category.update');
    Route::delete('/categories/{category}', [CategoryDeleteController::class, '__invoke'])->name('admin.category.delete');

    Route::get('/tags', [TagIndexController::class, '__invoke'])->name('admin.tag.index');
    Route::get('/tags/create', [TagCreateController::class, '__invoke'])->name('admin.tag.create');
    Route::post('/tags', [TagStoreController::class, '__invoke'])->name('admin.tag.store');
    Route::get('/tags/{tag}', [TagShowController::class, '__invoke'])->name('admin.tag.show');
    Route::get('/tags/{tag}/edit', [TagEditController::class, '__invoke'])->name('admin.tag.edit');
    Route::patch('/tags/{tag}', [TagUpdateController::class, '__invoke'])->name('admin.tag.update');
    Route::delete('/tags/{tag}', [TagDeleteController::class, '__invoke'])->name('admin.tag.delete');

    Route::get('/users', [UserIndexController::class, '__invoke'])->name('admin.user.index');
    Route::get('/users/create', [UserCreateController::class, '__invoke'])->name('admin.user.create');
    Route::post('/admin/users/store', [UserStoreController::class, 'store'])->name('admin.user.store');
    Route::get('/users/{user}', [UserShowController::class, '__invoke'])->name('admin.user.show');
    Route::get('/users/{user}/edit', [UserEditController::class, '__invoke'])->name('admin.user.edit');
    Route::patch('/users/{user}', [UserUpdateController::class, '__invoke'])->name('admin.user.update');
    Route::delete('/users/{user}', [UserDeleteController::class, '__invoke'])->name('admin.user.delete');
});

Auth::routes(['verify' => true]);
