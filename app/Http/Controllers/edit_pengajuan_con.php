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

class edit_pengajuan_con extends Controller
{
    public function show(){

      $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
      // $editpeng = PengajuanOpini::simplePaginate(10);
      // dd($editpeng);
      Session::forget('s_list_user');
      // return view('/menu/list_pengajuan', ['columns' => $columns, 'columns2' => $columns , 'editpeng' => $editpeng]);
      return view('/menu/list_pengajuan', ['columns2' => $columns]);
    }

    public function getDataId($id)
    {
     // $data = PengajuanOpini::where('id', $id)->get();
      $data = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang","tuj_pengajuan_opini.nama as namatujuan")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->join('tuj_pengajuan_opini','tuj_pengajuan_opini.id','=','daftar_pengajuan.tujuan_opini')
            ->where('daftar_pengajuan.id',$id)->get();
      return json_encode($data);
    }

    public function show_user(){

      $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
      // $editpeng = PengajuanOpini::simplePaginate(10);
      // dd($editpeng);
      Session::forget('s_list_user');
      // return view('/menu/list_pengajuan', ['columns' => $columns, 'columns2' => $columns , 'editpeng' => $editpeng]);
      return view('/menu/list_pengajuan_user', ['columns2' => $columns]);
    }

    public function show_all(){

      $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
      // $editpeng = PengajuanOpini::simplePaginate(10);
      // dd($editpeng);
      Session::forget('s_list_user');
      // return view('/menu/list_pengajuan', ['columns' => $columns, 'columns2' => $columns , 'editpeng' => $editpeng]);
      return view('/menu/list_pengajuan_all', ['columns2' => $columns]);
    }

    public function show_all_view(){

      $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
      // $editpeng = PengajuanOpini::simplePaginate(10);
      // dd($editpeng);
      Session::forget('s_list_user');
      // return view('/menu/list_pengajuan', ['columns' => $columns, 'columns2' => $columns , 'editpeng' => $editpeng]);
      return view('/menu/list_pengajuan_all_view', ['columns2' => $columns]);
    }

    public function f_list_opini(Request $request){
        Session::put('s_list_user','x');
        $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
        // dd($request->input('kriteria'));
        // Session::put('kriteria',$request->input('kriteria'));
        $q = $request->input('kriteria');
        if ($q == 'all') {
          // $editpeng = PengajuanOpini::where($request->input('kriteria'), 'like', '%'.$request->tekskriteria.'%')->orderBy('tgl_masuk_pengajuan', 'desc')->simplePaginate(10);
          // dd('all');
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang","tuj_pengajuan_opini.nama as namatujuan")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->join('tuj_pengajuan_opini','tuj_pengajuan_opini.id','=','daftar_pengajuan.tujuan_opini')
            ->where('status',"ON PROGRESS")
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }else if ($q == 'Id'){
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->where($request->input('kriteria'), '=', $request->tekskriteria)
            ->where('status',"ON PROGRESS")
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }else {
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->where($request->input('kriteria'), 'like', '%'.$request->tekskriteria.'%')
            ->where('status',"ON PROGRESS")
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }

        // $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
        // $editpeng = PengajuanOpini::simplePaginate(10);
        //dd($listpengajuan);
        return view('/menu/list_pengajuan', ['columns' => $columns, 'columns2' => $columns , 'listpengajuan' => $listpengajuan]);

        // dd($editpeng);

    }

    public function f_list_opini_user(Request $request){
        Session::put('s_list_user','x');
        $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
        // dd($request->input('kriteria'));
        // Session::put('kriteria',$request->input('kriteria'));
        $q = $request->input('kriteria');
        if ($q == 'all') {
          // $editpeng = PengajuanOpini::where($request->input('kriteria'), 'like', '%'.$request->tekskriteria.'%')->orderBy('tgl_masuk_pengajuan', 'desc')->simplePaginate(10);
          // dd('all');
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang","tuj_pengajuan_opini.nama as namatujuan")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->join('tuj_pengajuan_opini','tuj_pengajuan_opini.id','=','daftar_pengajuan.tujuan_opini')
            ->where('status',"ON PROGRESS")
            ->where('maker',Session::get('name'))
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }else if ($q == 'Id'){
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->where($request->input('kriteria'), '=', $request->tekskriteria)
            ->where('status',"ON PROGRESS")
            ->where('maker',Session::get('name'))
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }else {
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->where($request->input('kriteria'), 'like', '%'.$request->tekskriteria.'%')
            ->where('status',"ON PROGRESS")
            ->where('maker',Session::get('name'))
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }

        // $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
        // $editpeng = PengajuanOpini::simplePaginate(10);
        //dd($listpengajuan);
        return view('/menu/list_pengajuan_user', ['columns' => $columns, 'columns2' => $columns , 'listpengajuan' => $listpengajuan]);

        // dd($editpeng);

    }

    public function f_list_opini_all(Request $request){
        Session::put('s_list_user','x');
        $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
        // dd($request->input('kriteria'));
        // Session::put('kriteria',$request->input('kriteria'));
        $q = $request->input('kriteria');
        if ($q == 'all') {
          // $editpeng = PengajuanOpini::where($request->input('kriteria'), 'like', '%'.$request->tekskriteria.'%')->orderBy('tgl_masuk_pengajuan', 'desc')->simplePaginate(10);
          // dd('all');
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang","tuj_pengajuan_opini.nama as namatujuan")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->join('tuj_pengajuan_opini','tuj_pengajuan_opini.id','=','daftar_pengajuan.tujuan_opini')
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }else if ($q == 'Id'){
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->where($request->input('kriteria'), '=', $request->tekskriteria)
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }else {
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->where($request->input('kriteria'), 'like', '%'.$request->tekskriteria.'%')
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }

        // $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
        // $editpeng = PengajuanOpini::simplePaginate(10);
        //dd($listpengajuan);
        return view('/menu/list_pengajuan_all', ['columns' => $columns, 'columns2' => $columns , 'listpengajuan' => $listpengajuan]);

        // dd($editpeng);

    }

    public function f_list_opini_all_view(Request $request){
        Session::put('s_list_user','x');
        $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
        // dd($request->input('kriteria'));
        // Session::put('kriteria',$request->input('kriteria'));
        $q = $request->input('kriteria');
        if ($q == 'all') {
          // $editpeng = PengajuanOpini::where($request->input('kriteria'), 'like', '%'.$request->tekskriteria.'%')->orderBy('tgl_masuk_pengajuan', 'desc')->simplePaginate(10);
          // dd('all');
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang","tuj_pengajuan_opini.nama as namatujuan")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->join('tuj_pengajuan_opini','tuj_pengajuan_opini.id','=','daftar_pengajuan.tujuan_opini')
            ->where('maker',Session::get('name'))
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }else if ($q == 'Id'){
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->where($request->input('kriteria'), '=', $request->tekskriteria)
            ->where('maker',Session::get('name'))
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }else {
          $listpengajuan = PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang")
            ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
            ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
            ->where($request->input('kriteria'), 'like', '%'.$request->tekskriteria.'%')
            ->where('maker',Session::get('name'))
            ->orderBy('tgl_masuk_pengajuan', 'desc')
            ->paginate(10);
        }

        // $columns = DB::getSchemaBuilder()->getColumnListing('daftar_pengajuan');
        // $editpeng = PengajuanOpini::simplePaginate(10);
        //dd($listpengajuan);
        return view('/menu/list_pengajuan_all_view', ['columns' => $columns, 'columns2' => $columns , 'listpengajuan' => $listpengajuan]);

        // dd($editpeng);

    }

    public function select($id){
      $data = PengajuanOpini::where('Id', '=', $id)->get();

      $badan_usaha = BadanUsaha::all();
      $cabang = cabang::all();
      $tujuan_pengajuan = tujuan_pengajuan::all();

      return view('menu/edit_pengajuan',['data' => $data , 'badan_usaha' => $badan_usaha , 'cabang' => $cabang , 'tujuan_pengajuan' => $tujuan_pengajuan]);
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
                                        'status' => $request->input('status'),
                                        'no_memo_pengajuan' => $request->nomemo,
                                        'tgl_masuk_pengajuan' => $request->tglmasuk,
                                        'jam_memo_diterima' => $request->jammasuk,
                                        'tgl_disposisi' => $request->tgldisposisi,
                                        'jam_disposisi' => $request->jamdisposisi,
                                        'tgl_lengkap' => $request->tgllengkap,
                                        'jam_lengkap' => $request->jamlengkap,
                                        'alasan_edit'=> $request->input("alasanedit"),
                                        'tgl_edit'=> $request->input("tanggaledit"),
                                        'jam_edit'=> $request->input("waktuedit"),
                                        'sla'=>$sla
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

      return redirect('/list_pengajuan')->with($notification);
    }
    // public function viewedit(){
    //   $badan_usaha = BadanUsaha::all();
    //   $cabang = cabang::all();
    //   $tujuan_pengajuan = tujuan_pengajuan::all();
    //   $data = PengajuanOpini::where('Id', '=', $id)->get();
    //
    //   dd($data);
    //
    //   return view('menu/edit_pengajuan',['data' => $data , 'badan_usaha' => $badan_usaha , 'cabang' => $cabang , 'tujuan_pengajuan' => $tujuan_pengajuan]);
    // }

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
