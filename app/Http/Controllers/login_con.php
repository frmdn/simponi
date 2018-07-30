<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use Session;

class login_con extends Controller
{
  public function logout(){
    Session::flush();
    return redirect('/');
  }

  public function index(){

    // dd(Session::has('key'));
    // dd('test');
    //Session::flush();
    return view('index');
  }

  public function login(Request $request){
    // dd('test');
    Session::flush();
    $users = User::where('username', '=', $request->username)
                      ->where('password', '=', $request->pass)->get();
    // DB::table('user')->select(DB::raw('count(*) as user_count'))->where('username', '=', 'fak')->get();

    // dd($users[0]->level_user);
    try {
      if ($users[0]->level_user<>'') {
        // dd('mantap');
        $leveluser = $users[0]->level_user;
        Session::put('level',$users[0]->level_user);
        Session::put('name',$users[0]->full_name);
        $notification = array(
                  'message' => 'Halo ',
                  'alert-type' => 'sukseslogin'
              );
        // dd(Session::get('name'));
        return redirect('/input_pengajuan')->with($notification);
      }else {
        // dd('gagal');
        return back();
      }
    } catch (\Exception $e) {
      // dd('gagal');

      $notification = array(
                'message' => 'Login gagal!',
                'alert-type' => 'error'
            );

      return back()->with($notification);
    }
  }

}
