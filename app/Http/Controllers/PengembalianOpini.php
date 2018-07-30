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

class PengembalianOpini extends Controller
{
  public function show(){
    Session::put('s_list_user','x');
    $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');

    $user = Session::get('level');
    
    if ($user == "admin") {
      $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang","tuj_pengajuan_opini.nama as namatujuan")
      ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
      ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
      ->join('tuj_pengajuan_opini','tuj_pengajuan_opini.id','=','daftar_pengajuan.tujuan_opini')
      ->where('status',"Dikembalikan")
      ->orderBy('tgl_masuk_pengajuan', 'desc')
      ->paginate(10);
    } else {
      $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang","tuj_pengajuan_opini.nama as namatujuan")
      ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
      ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
      ->join('tuj_pengajuan_opini','tuj_pengajuan_opini.id','=','daftar_pengajuan.tujuan_opini')
      ->where('status',"Dikembalikan")
      ->where('maker',Session::get('name'))
      ->orderBy('tgl_masuk_pengajuan', 'desc')
      ->paginate(10);
    }

    return view('menu.pengembalian_opini', ['columns' => $columns, 'columns2' => $columns , 'listpengajuan' => $listpengajuan]);

  }

  public function search_list(Request $request){
    Session::put('s_list_user','x');
    $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
    $q = $request->input('kriteria');
    
    $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang","tuj_pengajuan_opini.nama as namatujuan")
    ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
    ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
    ->join('tuj_pengajuan_opini','tuj_pengajuan_opini.id','=','daftar_pengajuan.tujuan_opini')
    ->where('status',"Dikembalikan")
    ->where('maker',Session::get('name'))
    ->orderBy('tgl_masuk_pengajuan', 'desc')
    ->paginate(10);
    
      // $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang")
      // ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
      // ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
      // ->where($request->input('kriteria'), '=', $request->tekskriteria)
      // ->where('status',"Dikembalikan")
      // ->where('maker',Session::get('name'))
      // ->orderBy('tgl_masuk_pengajuan', 'desc')
      // ->paginate(10);
    
      // $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang")
      // ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
      // ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
      // ->where($request->input('kriteria'), 'like', '%'.$request->tekskriteria.'%')
      // ->where('status',"Dikembalikan")
      // ->where('maker',Session::get('name'))
      // ->orderBy('tgl_masuk_pengajuan', 'desc')
      // ->paginate(10);
    

    return view('menu.pengembalian_opini', ['columns' => $columns, 'columns2' => $columns , 'listpengajuan' => $listpengajuan]);
  }

  public function select($id){
    $data = PengajuanOpini::where('Id', '=', $id)->get();

    $badan_usaha = BadanUsaha::all();
    $cabang = cabang::all();
    $tujuan_pengajuan = tujuan_pengajuan::all();

    return view('menu.edit_pengembalian',['data' => $data , 'badan_usaha' => $badan_usaha , 'cabang' => $cabang , 'tujuan_pengajuan' => $tujuan_pengajuan]);
  }

  public function update(Request $request){
    DB::beginTransaction();
    try {
      $datelengkap = date('Y-m-d', strtotime(str_replace('-','/', $request->tgllengkap)));
      $dateedit = date('Y-m-d', strtotime(str_replace('-','/', $request->input("tanggaledit"))));
      $daysLeft = strtotime(str_replace('-','/', $request->input("tanggaledit"))) - strtotime(str_replace('-','/', $request->tgllengkap));
      $sla = round($daysLeft / (60 * 60 * 24));

      PengajuanOpini::where('id', $request->idopini)
      ->update(['nama_nasabah' => $request->namensbh,
        'badan_usaha' => $request->input('bdnusaha'),
        'cabang' => $request->input('cbg'),
        'nama_ao_pic' => $request->namaaopic,
        'nama_supervisi' => $request->nmsupervisi,
        'plafond' => $request->plafond,
        'no_memo_pengajuan' => $request->nomemo,
        'tgl_masuk_pengajuan' => $request->tglmasuk,
        'jam_memo_diterima' => $request->jammasuk,
        'no_memo_pengembalian'=> $request->input("no_memo_pengembalian"),
        'tgl_pengembalian'=> $request->input("tgl_pengembalian"),
        'waktu_pengembalian'=> $request->input("waktukembali"),
        'alasan_pengembalian'=> $request->input("alasankembali"),
        'alasan_lain'=> $request->input("alasan_lain"),
        'kelengkapan_dok'=> $request->input("kelengkapan_dok"),
        'kelengkapan_lain'=> $request->input("kelengkapan_lain"),
        'ket_tambahan'=> $request->input("ket_tambahan"),
        'kd1' => $request->input('kd1'),
        'kd2' => $request->input('kd2'),
        'kd3' => $request->input('kd3'),
        'kd4' => $request->input('kd4'),
        'kd5' => $request->input('kd5'),
        'kd6' => $request->input('kd6'),
        'kd7' => $request->input('kd7'),
        'kd8' => $request->input('kd8'),
        'kd9' => $request->input('kd9'),
        'kd10' => $request->input('kd10'),
        'kd11' => $request->input('kd11'),
        'kd12' => $request->input('kd12'),
        'kd13' => $request->input('kd13'),
        'kd14' => $request->input('kd14'),
        'kd15' => $request->input('kd15'),
        'kd16' => $request->input('kd16'),
        'kd17' => $request->input('kd17'),
        'kd18' => $request->input('kd18'),
        'kd19' => $request->input('kd19'),
        'kd20' => $request->input('kd20'),
        'kd21' => $request->input('kd21'),
        'kd22' => $request->input('kd22'),
        'kd23' => $request->input('kd23')
      ]);
      DB::commit();
      $notification = array(
        'message' => 'Data berhasil diubah!',
        'alert-type' => 'suksessimpan'
      );
    } catch (\Exception $e) {
      DB::rollBack();
      logger($e->getMessage() . $e->getFile() . $e->getLine());
      dd($e->getMessage());
      $notification = array(
        'message' => 'Data gagal diubah!',
        'alert-type' => 'gagalsimpan'
      );
    }

    return redirect('/pengembalian')->with($notification);
  }

  public function delete($id){
    try {
      PengajuanOpini::where('Id', '=', $id)->delete();

      $notification = array(
        'message' => 'Data berhasil dihapus!',
        'alert-type' => 'sukseshapus'
      );
      return back()->with($notification);
    } catch (\Exception $e) {
      $notification = array(
        'message' => 'Data gagal dihapus!',
        'alert-type' => 'gagalhapus'
      );
    }
  }
}
