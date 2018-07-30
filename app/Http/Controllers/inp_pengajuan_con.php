<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\PengajuanOpini;
use App\Models\BadanUsaha;
use App\Models\cabang;
use App\Models\tujuan_pengajuan;
use App\Models\User;
use Session;
// use app\User;
// use App\Models\Blog;

class inp_pengajuan_con extends Controller
{
  public function create(){

    return view('menu/input-pengajuan');
  }

  public function store(Request $request){
    $pengajuan = new PengajuanOpini();
    $pengajuan->maker = $request->maker;
    $pengajuan->nama_nasabah = $request->namensbh;
    $pengajuan->badan_usaha = $request->input('bdnusaha');
    $pengajuan->cabang = $request->input('cbg');
    $pengajuan->nama_ao_pic = $request->namaaopic;
    $pengajuan->nama_supervisi = $request->nmsupervisi;
    $pengajuan->plafond = $request->plafond;
    $pengajuan->tujuan_opini = $request->input('tujopini');
    $pengajuan->no_memo_pengajuan = $request->nomemo;
    $pengajuan->tgl_masuk_pengajuan = $request->tglmasuk;
    $pengajuan->jam_memo_diterima = $request->jammasuk;
    $pengajuan->tgl_disposisi = $request->tgldisposisi;
    $pengajuan->jam_disposisi = $request->jamdisposisi;
    $pengajuan->tgl_lengkap = $request->tgllengkap;
    $pengajuan->jam_lengkap = $request->jamlengkap;
    $pengajuan->status = "ON PROGRESS";

    try {
      $pengajuan->save();
      $notification = array(
                'message' => 'Data berhasil disimpan!',
                'alert-type' => 'suksessimpan'
            );
      return redirect('/input_pengajuan')->with($notification);
    } catch (\Exception $e) {

      $notification = array(
                'message' => 'Data gagal disimpan!',
                'alert-type' => 'gagalsimpan'
            );
      return back()->with($notification);
    }

    // if (!$pengajuan->save()) {
    //   dd("fail");
    // } else {
    //   // Session::put('key','value');
    //   $notification = array(
    //             'message' => 'Data berhasil disimpan!',
    //             'alert-type' => 'suksessimpan'
    //         );
    //   return redirect('/')->with($notification);
    // }
    //
    // return redirect('/');

  }

  public function index(){
    // $Test = new User;
    // $Test->nama = 'fak';
    // $Test->save();

    // $blogs = Blog::all();
    // dd($blogs);

    return redirect('/login');
  }

  public function show(){
    $badan_usaha = BadanUsaha::all();
    $cabang = cabang::all();
    $tujuan_pengajuan = tujuan_pengajuan::all();

    return view('/menu/input-pengajuan', ['badan_usaha' => $badan_usaha , 'cabang' => $cabang , 'tujuan_pengajuan' => $tujuan_pengajuan]);
  }

}
