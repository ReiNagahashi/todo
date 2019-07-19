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

//以下の2つは同じ役割だが、細かいメソッドを実施したいときは上のfunctionを記述する
Route::get('/about', function () {
    return view('pages.about');
});
Route::view('/about','pages.about')->name('about');
// Route::view('/index','pages.index')->name('index');
Route::get('/index','PagesController@index')->name('index');


Route::get('/user', function () {
    return "<b>Welcome</b>";
});
Route::get('/user/{name}/{num}',function ($name,$num) {
    return "<b>Welcome $name with $num</b>";
});
Route::get('/user/{name}',function ($name) {
    return "<b>Welcome $name</b>";
});
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/todos',[
        'uses'=>'TodosController@index',
        'as' => 'todos'
    ]);
    
    Route::get('/new-todo',[
        'uses' => 'TodosController@create',
        'as' => 'todos.create'
    ]);
    
    Route::POST('/store.todos',[
    'uses' => 'TodosController@store',
    'as' => 'store.todos'
    ]);
    
    //この2爪のtodoはコントローラー用のidであることを忘れずに！！！
    ROute::get('/todos/{todo}',[
        'uses' => 'TodosController@show',
        'as' => 'show.todos'
    ]);
    
    //ここで特定のidが必要となるから、指定できるようにする
    Route::get('/edit-todos/{todo}',[
        'uses' => 'Todoscontroller@edit',
        'as' => 'todos.edit'
    ]);
    
    Route::post('/update/{todo}',[
        'uses' => 'Todoscontroller@update',
        'as' => 'todos.update'
    ]);
    
    Route::get('/todos/{todo}/complete',[
    'uses' => 'TodosController@complete',
    'as' => 'todos.complete'
    ]);
    
    Route::get('/todos/{todo}/not_complete',[
        'uses' => 'TodosController@not_complete',
        'as' => 'todos.not_complete'
        ]);
    
    // Route::get('/todos/{id}',[
    //     //下の@の後に来るのはメソッドの名前が来る。ここのdestroyは自分で名付けたメソッド名が来る
    //     'uses'=>'TodosController@destroy',
    //     'as' => 'todos.delete'
    // ]);
    
    Route::delete('/todos/{todo}',[
            'uses'=>'TodosController@destroy',
            'as' => 'todos.delete'
        ]);

    Route::get('/settings',[
        'uses'=>'SettingController@index',
        'as' => 'settings'
    ]);

    Route::post('/settings/update',[
        'uses'=>'SettingController@update',
        'as' => 'settings.update'
    ]);

});



// Route::get('/table', function(){
//     for($i=1;$i <= 10; $i++){
//         echo "$i * 2 =". $i*2 ."<br>";
//     }
// });

// Route::get('/table/{number}', function($number){
//     for($i=1;$i <= 10; $i++){
//         echo "$i * $number =". $i*$number ."<br>";
//     }
// });
//optional parameter Routing
Route::get('/table/{number?}', function($number = 2){
    for($i=1;$i <= 10; $i++){
        echo "$i * $number =". $i*$number ."<br>";
    }
});
//Expression →check for data type ここでは数字のみを認証 0 to 9の意味に注意
Route::get('/table/{number?}', function($number = 2){
    for($i=1;$i <= 10; $i++){
        echo "$i * $number =". $i*$number ."<br>";
    }
})->where('number','[0-9]+');
// Route::view('/index','pages.index');

// Route::get('/index/{answer}',function($answer){
//     return "$answer の皆様、おはようございます。";
// });
// Route::get('hello/{msg?}',function ($msg = "") {
// $html = <<<E0F
// <html>
//   <title>Hello</title>
//   <style>
//    body {font-size:16pt; color:#999;}
//    h1 {font-size:200pt; text-align:center;color:#eee;
//     margin:-40px 0px -50px 0px;}
//   </style>
//  </head>
//  <body>
//     <h1>Hello</h1>
//     <p>$msg</p>
//     <p>これはサンプルページです。</p>
//  </body>
// </html>
// E0F;

//     return $html;
// }); <head>

Route::get('hello', 'HelloController@index');
Route::get('hello/other', 'HelloController@other');


