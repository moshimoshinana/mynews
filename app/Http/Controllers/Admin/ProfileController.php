<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

public function add()
    {
        return view('admin.profile.create');
    }

    public function create()
    {
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
    Route::group(['prefix' => 'admin'], function(){
    Route::get('news/create',
    'Admin\NewsController@add')
});

Route::group(['prefix' => 'bbb'])

Route::group(['prefix' => 'admin'], function(){
    Route::get('profile\create',
    'Admin\ProfileController@add')
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('profile\edit',
    'Admin\ProfileController@edit')    
});
}

