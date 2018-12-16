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


Route::get('/test', function () {
    return view('barang.barang');
});

// Route::get('/barang', function () {
//     return view('barang.homebarang');
// })->middleware('auth','barang');




// ROUTES BARANG

Route::get('/barang',[
    'uses'=>'barang@index',
    'as'=>'barang.homebarang'
]);

Route::get('/buatbrng',[
    'uses'=>'barang@forminput',
    'as'=>'barang.buatbarang'
]);

Route::post('/buatbrng',[
    'uses'=>'barang@input',
    'as'=>'barang.inputbarang'
]);

Route::get('/editbrng/{kode_barang}',[
    'uses'=>'barang@formedit',
    'as'=>'barang.editbarang'
]);

Route::put('/editbrng',[
    'uses'=>'barang@update',
    'as'=>'barang.updatebarang'
]);

Route::DELETE('/hapus_barang/{kode_barang}',[
    'uses'=>'barang@delete',
    'as'=>'barang.delete'
]);
Route::get('/accept/{kode_barang}',[
    'uses'=>'barang@acceptBarang',
    'as'=>'barang.accept'
]);
Route::get('/reject/{kode_barang}',[
    'uses'=>'barang@rejectBarang',
    'as'=>'barang.reject'
]);

Route::group(['prefix'=>'admin'], function(){
    Route::DELETE('hapus/{kode_barang}',[
        'uses'=>'barang@delete',
        'as'=>'barang.delete'
    ]);
    
});


// ROUTES RAKIT

Route::get('/rakit',[
    'uses'=>'rakit@index',
    'as'=>'rakit.homerakit'
]);

Route::get('/buatrakit',[
    'uses'=>'rakit@forminput',
    'as'=>'rakit.buatrakit'
]);

Route::post('/buatrakit',[
    'uses'=>'rakit@input',
    'as'=>'rakit.inputrakit'
]);

Route::DELETE('/hapus/{kode_barang}',[
    'uses'=>'rakit@delete',
    'as'=>'rakit.delete'
]);

Route::get('/editrakit/{kode_barang}',[
    'uses'=>'rakit@formedit',
    'as'=>'rakit.editrakit'
]);

Route::put('/editrakit',[
    'uses'=>'rakit@update',
    'as'=>'rakit.updaterakit'
])->middleware('auth','rakit','barang');

// Routes Manajer

Route::get('/manajer',[
    'uses'=>'manajer@index',
    'as'=>'manajer.homemanajer'
]);

// Route::get('/buatorang',[
//     'uses'=>'barang@formpegawai',
//     'as'=>'manajer.buatorang'
// ]);

// Route::post('/buatorang',[
//     'uses'=>'barang@register',
//     'as'=>'barang.registerorang'
// ]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
