<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/about', 'about')->middleware('test');
Route::get('contact', 'ContactFormController@create');
Route::post('contact', 'ContactFormController@store');

Route::resource('/customer', 'CustomersController');


// vid 45  1 to 1
Route::get('/phone', function () {
    $user = factory(\App\User::class)->create();
    /*
    $phone = new \App\Phone();
    $phone->phone ='123-123-1234';
    $user->phone()->save($phone);
    */
    // short for above
    $user->phone()->create([
        'phone' => '741-852-9637'
    ]);
});

//vid 46 1:n
Route::get('/post', function () {
   $user = factory(\App\User::class)->create();
   $user->posts()->create([
       'title' => 'title post',
       'body' => 'post body'
   ]);
   // update
//    $user->posts->find(8)->title = 'new title';
//    $user->posts->find(8)->body = 'better bodies';
//    $user->push();
    // $nUser =  \App\user::find(1);
//     $nUser->posts()->create([
//        'title' => 'title post',
//        'body' => 'post body'
//    ]);
//     $nUser->posts->find(55)->title = 'Tile of post 55';
//     $nUser->push();
//    return $nUser->posts;
    return $user->posts;
});

//vid 47 n:n 
Route::get('/roles', function () {
//    $user = factory(\App\User::class)->create();
  
    // $user = \App\User::first();
//    $roles = \App\Role::all();
//    $user->roles()->attach($roles);

//    $roles = \App\Role::first();
//    $user->roles()->detach($roles);

    // $user->roles()->sync([2,4]);
    // $user->roles()->syncWithoutDetaching([3]);

    // $role = \App\Role::find(4);
    // $role->users()->sync([5]);

 //vid 48 add to pivot table
    $user = \App\User::find(1);
    // $user->roles()->sync([
    //     1 =>[
    //       'name' => 'victor'
    //     ]
    // ]);
    
    dd($user->roles->first()->pivot);
   
});

// next vid 49