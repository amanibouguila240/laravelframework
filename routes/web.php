<?php
use App\Posts;


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
// Route::get('well', function () {
//     return view('well');
// });
Route::get('about', function () {
    return '<h1>About content</h1>';
});

Route::get('about/{bien1}/{bien2}', function ($bien1, $bien2) {
    return '<h1>About Direct '.$bien1. ' '.$bien2.'</h1>';
});
Route::get('about/direct', function () {
    return '<h1>About REDirection </h1>';
});
Route::get('where', function () {
    return redirect('about/directions');
});
Route::get('home', function () {
    return view('index');
});

Route::get('about/directions', array('as'=>'directions', function() {
    $theURL=URL::route('directions');
    return "<h1>Directory go to this URL $theURL </h1>";
}));
Route::get('home1', 'HomeController@showWellcome');
Route::get('well', 'HomeController@showview');

Route::get('about/{bien}', 'AboutController@showAbout');
Route::get('profile/{thams2o1}', 'profileController@showProfile');

Route::get('insert', function () {
    DB::insert('insert into posts (title, body, is_admin) values (?, ?, ?)', ['Laravel Framework', 'Larave is best Framework in the world', 1]);
    return "CHÈN THÀNH CÔNG";
});

Route::get('read', function () {
    $results=DB::select('select * from posts where id > ?', [0]);
    $kq='';
    foreach ($results as $result)
    {
    $kq.=$result->title .'</br>';
    }
    return $kq;

});

Route::get('update', function () {
    DB::update('update posts set title = ?, body=? where id >?', ['Laravel Framework 1', 'Larave is best Framework in the world', 3]);
    return "UPDATED";
});

Route::get('delete', function () {
    DB::delete('delete from posts where id > ?', [3]);
   
    return "DELETED";
});

Route::get('readall', function () {
    $results=Posts::all();
    $kq='';
    foreach ($results as $result)
    {
    $kq.=$result->title .'</br>';
    }
    return $kq;

});

Route::get('find', function () {
    $results=Posts::where('id',">=",3)->where('body','like','%php%')->orderBy('id', 'desc')->get();
    $kq='';
    foreach ($results as $result)
    {
    $kq.=$result->title .'</br>';
    }
    return $kq;

});
Route::get('insertorm', function () {
    $p=new Posts;
    $p->title='test1';
    $p->body='Test1';
    $p->is_admin=1;
    $p->save();

});
Route::get('updateorm', function () {
    $p=Posts::find(2);
    $p->title='test1';
    $p->body='Test1';
    $p->is_admin=1;
    $p->save();

});
Route::get('updateorm1', function () {
    $p=Posts::where('id',">=",3)->where('body','like','%php%')->first();
    $p->title='test1';
    $p->body='Test1';
    $p->is_admin=1;
    $p->save();

});
Route::get('deleteorm', function () {
    $p=Posts::where('id',">=",3)->where('body','like','%php%')->first();
   
    $p->delete();

});
Route::get('destroy', function () {
   Posts::destroy([12,11]);
   


});