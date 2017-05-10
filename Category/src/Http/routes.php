<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 5.8.2015
 * Time: 15:23
 */


/*
 * BackEnd Routes
 * */

Route::group(['middleware'=>['is_admin','permitted_page'],'prefix' => 'admin'],function(){
    Route::resource('category','\Components\Category\Http\Controllers\Admin\CategoriesController');
});
