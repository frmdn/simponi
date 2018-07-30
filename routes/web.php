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

Route::get('/input_pengajuan','inp_pengajuan_con@show');



Route::get('/rekapitulasi','rekapitulasi_opini_con@show');
Route::post('/rekapitulasi/search','rekapitulasi_opini_con@search');

Route::get('/list_pengajuan','edit_pengajuan_con@show');
Route::get('/list_pengajuan_user','edit_pengajuan_con@show_user');
Route::get('/list_pengajuan_all','edit_pengajuan_con@show_all');
Route::get('/list_pengajuan_all_view','edit_pengajuan_con@show_all_view');

Route::get('/list_user','edit_user_con@show');
Route::post('/r_add_user','edit_user_con@f_add_user');
Route::get('/r_delete_user/{username}','edit_user_con@f_delete_user');

Route::get('/edit_pengajuan/delete/{id}','edit_pengajuan_con@delete');
Route::get('/edit_pengajuan/edit/{id}','edit_pengajuan_con@select');
Route::post('/edit','edit_pengajuan_con@update');

// Route::any('/r_search_list_user','edit_pengajuan_con@f_list_user');
Route::get('/r_search_list_opini','edit_pengajuan_con@f_list_opini');
Route::get('/r_search_list_opini_user','edit_pengajuan_con@f_list_opini_user');
Route::get('/r_search_list_opini_all','edit_pengajuan_con@f_list_opini_all');

// For AJAX
Route::get('/get_opini/{id}','edit_pengajuan_con@getDataId');

Route::get('/r_search_list_opini_all_view','edit_pengajuan_con@f_list_opini_all_view');
// Route::get('/edit','edit_pengajuan_con@viewedit');
// Route::get('/edit_pengajuan/edit','edit_pengajuan_con@show');
Route::post('/edit_pengajuan','edit_pengajuan_con@edit');

Route::get('/pengembalian','PengembalianOpini@show');
Route::get('/search_pengembalian','PengembalianOpini@search_list');

Route::get('/edit_pengembalian/delete/{id}','PengembalianOpini@delete');
Route::get('/edit_pengembalian/edit/{id}','PengembalianOpini@select');
Route::post('/edit_pengembalian','PengembalianOpini@update');


// Download Link
Route::get('/d/all', function() {
	return Excel::download(new \App\Exports\InvoicesExport, 'DataPengajuan.xlsx');
});
// 


Route::get('/home', function () {
	return view('welcome');
});

// Route::get('/login', function () {
//     return view('index');
// });

// Route::get('/input', 'inp_pengajuan_con@create');
Route::post('/input_pengajuan', 'inp_pengajuan_con@store');

Route::post('/process', 'login_con@login');

Route::get('/test', 'inp_pengajuan_con@store');

Route::get('/', 'login_con@index');
Route::get('/logout', 'login_con@logout');

Route::get('/nyoba', 'inp_pengajuan_con@index');

// Route::get('/', 'inp_pengajuan_con@show');'


Route::get('/docs', 'test@PrinCoy');
Route::get('/print_opini/{id}', 'test@PrintOpini');
