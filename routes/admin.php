<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth', 'isAdmin'])->group(function () {
    //Page
    Route::controller(\App\Http\Controllers\PageController::class)->group(function (){
        Route::get('/page', 'index')->name('page.index');
        Route::get('/page/create', 'create')->name('page.create');
        Route::get('/page/edit/{page}', 'edit')->name('page.edit');
        Route::delete('/page/delete/{page}', 'destroy')->name('page.delete');
        Route::post('/page/store', 'store')->name('page.store');
        Route::put('/page/{page}', 'update')->name('page.update');
    });

    //Banner
    Route::controller(\App\Http\Controllers\BannerController::class)->group(function (){
        Route::get('/banner', 'index')->name('banner.index');
        Route::get('/banner/create', 'create')->name('banner.create');
        Route::get('/banner/edit/{banner}', 'edit')->name('banner.edit');
        Route::delete('/banner/delete/{banner}', 'destroy')->name('banner.delete');
        Route::post('/banner/store', 'store')->name('banner.store');
        Route::put('/banner/{banner}', 'update')->name('banner.update');
    });

    //Simple Text
    Route::controller(\App\Http\Controllers\SimpleTextController::class)->group(function (){
        Route::get('/simpleText', 'index')->name('simpleText.index');
        Route::get('/simpleText/create', 'create')->name('simpleText.create');
        Route::get('/simpleText/edit/{simpleText}', 'edit')->name('simpleText.edit');
        Route::delete('/simpleText/delete/{simpleText}', 'destroy')->name('simpleText.delete');
        Route::post('/simpleText/store', 'store')->name('simpleText.store');
        Route::put('/simpleText/{simpleText}', 'update')->name('simpleText.update');
    });

    //Image Text
    Route::controller(\App\Http\Controllers\ImageTextController::class)->group(function (){
        Route::get('/imageText', 'index')->name('imageText.index');
        Route::get('/imageText/create', 'create')->name('imageText.create');
        Route::get('/imageText/edit/{imageText}', 'edit')->name('imageText.edit');
        Route::delete('/imageText/delete/{imageText}', 'destroy')->name('imageText.delete');
        Route::post('/imageText/store', 'store')->name('imageText.store');
        Route::put('/imageText/{imageText}', 'update')->name('imageText.update');
    });

    //Gallery
    Route::controller(\App\Http\Controllers\GalleryController::class)->group(function (){
        Route::get('/gallery', 'index')->name('gallery.index');
        Route::get('/gallery/create', 'create')->name('gallery.create');
        Route::get('/gallery/edit/{gallery}', 'edit')->name('gallery.edit');
        Route::get('/gallery/{gallery}', 'show')->name('gallery.show');
        Route::delete('/gallery/delete/{gallery}', 'destroy')->name('gallery.delete');
        Route::post('/gallery/store', 'store')->name('gallery.store');
        Route::put('/gallery/{gallery}', 'update')->name('gallery.update');
    });

    //Image
    Route::controller(\App\Http\Controllers\ImageController::class)->group(function (){
        Route::get('/image', 'index')->name('image.index');
        Route::get('/image/create', 'create')->name('image.create');
        Route::get('/image/edit/{image}', 'edit')->name('image.edit');
        Route::delete('/image/delete/{image}', 'destroy')->name('image.delete');
        Route::post('/image/store', 'store')->name('image.store');
        Route::put('/image/{image}', 'update')->name('image.update');
    });

    //Contacts
    Route::controller(\App\Http\Controllers\ContactController::class)->group(function (){
        Route::get('/contact', 'index')->name('contact.index');
        Route::get('/contact/create', 'create')->name('contact.create');
        Route::get('/contact/edit/{contact}', 'edit')->name('contact.edit');
        Route::delete('/contact/delete/{contact}', 'destroy')->name('contact.delete');
        Route::post('/contact/store', 'store')->name('contact.store');
        Route::put('/contact/{contact}', 'update')->name('contact.update');
    });

    //Services
    Route::controller(\App\Http\Controllers\ServiceController::class)->group(function (){
        Route::get('/service', 'index')->name('service.index');
        Route::get('/service/create', 'create')->name('service.create');
        Route::get('/service/edit/{service}', 'edit')->name('service.edit');
        Route::get('/service/{service}', 'show')->name('service.show');
        Route::delete('/service/delete/{service}', 'destroy')->name('service.delete');
        Route::post('/service/store', 'store')->name('service.store');
        Route::put('/service/{service}', 'update')->name('service.update');
    });

    //ServiceItens
    Route::controller(\App\Http\Controllers\ServiceItemController::class)->group(function (){
        Route::get('/serviceItem', 'index')->name('serviceItem.index');
        Route::get('/serviceItem/create', 'create')->name('serviceItem.create');
        Route::get('/serviceItem/edit/{serviceItem}', 'edit')->name('serviceItem.edit');
        Route::delete('/serviceItem/delete/{serviceItem}', 'destroy')->name('serviceItem.delete');
        Route::post('/serviceItem/store', 'store')->name('serviceItem.store');
        Route::put('/serviceItem/{serviceItem}', 'update')->name('serviceItem.update');
    });

    //Product Category
    Route::controller(\App\Http\Controllers\ProductCategoryController::class)->group(function (){
        Route::get('/productCategory', 'index')->name('productCategory.index');
        Route::get('/productCategory/create', 'create')->name('productCategory.create');
        Route::get('/productCategory/edit/{productCategory}', 'edit')->name('productCategory.edit');
        Route::get('/productCategory/{productCategory}', 'show')->name('productCategory.show');
        Route::delete('/productCategory/delete/{productCategory}', 'destroy')->name('productCategory.delete');
        Route::post('/productCategory/store', 'store')->name('productCategory.store');
        Route::put('/productCategory/{productCategory}', 'update')->name('productCategory.update');
    });

    //Product
    Route::controller(\App\Http\Controllers\ProductController::class)->group(function (){
        Route::get('/product', 'index')->name('product.index');
        Route::get('/product/create', 'create')->name('product.create');
        Route::get('/product/edit/{product}', 'edit')->name('product.edit');
        Route::delete('/product/delete/{product}', 'destroy')->name('product.delete');
        Route::post('/product/store', 'store')->name('product.store');
        Route::put('/product/{product}', 'update')->name('product.update');
    });

    //Product
    Route::controller(\App\Http\Controllers\UnityController::class)->group(function (){
        Route::get('/unity', 'index')->name('unity.index');
        Route::get('/unity/create', 'create')->name('unity.create');
        Route::get('/unity/edit/{unity}', 'edit')->name('unity.edit');
        Route::delete('/unity/delete/{unity}', 'destroy')->name('unity.delete');
        Route::post('/unity/store', 'store')->name('unity.store');
        Route::put('/unity/{unity}', 'update')->name('unity.update');
    });

    //Settings
    Route::controller(\App\Http\Controllers\SettingControler::class)->group(function (){
        Route::get('/setting', 'index')->name('setting.index');
        Route::put('/setting', 'update')->name('setting.update');
    });

});
