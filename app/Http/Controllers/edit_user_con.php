<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Pagination\Paginator;

use App\Models\PengajuanOpini;
use App\Models\BadanUsaha;
use App\Models\cabang;
use App\Models\tujuan_pengajuan;
use App\Models\User;
use Session;

class edit_user_con extends Controller
{
  public function show(){

    $columns = DB::getSchemaBuilder()->getColumnListing('user');
    $edituser = User::simplePaginate(10);
    return view('/menu/list_user', ['columns' => $columns, 'edituser' => $edituser]);
  }

  public function f_add_user(Request $request){
    if ($request->input('id') != '') {
      $user = User::findOrFail($request->input('id')) ;
    } else {
      $user = new User;
    }
    $user->id = $request->input('id');
    $user->username = $request->input('username');
    $user->password = $request->input('password');
    $user->full_name = $request->input('fullname');
    $user->level_user = $request->input('leveluser');

    try {
      $user->save();
      $notification = array(
                'message' => 'Data berhasil disimpan!',
                'alert-type' => 'suksessimpan'
            );
      return redirect('/list_user')->with($notification);
    } catch (\Exception $e) {
      $notification = array(
                'message' => 'Data gagal disimpan!',
                'alert-type' => 'gagalsimpan'
            );
      return back()->with($notification);
    }
  }

  public function f_delete_user($username){
    try {
      User::where('username', '=', $username)->delete();

      $notification = array(
                'message' => 'User berhasil dihapus!',
                'alert-type' => 'sukseshapus'
            );
      return back()->with($notification);
    } catch (\Exception $e) {
      $notification = array(
                'message' => 'User gagal dihapus!',
                'alert-type' => 'gagalhapus'
            );
      return back()->with($notification);
    }
  }
}
