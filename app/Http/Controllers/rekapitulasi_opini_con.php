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

class rekapitulasi_opini_con extends Controller
{
	private $bulan;

  public function __construct()
  {
    $this->bulan = array(
      "01"=>"Januari",
      "02"=>"February",
      "03"=>"Maret",
      "04"=>"April",
      "05"=>"Mei",
      "06"=>"Juni",
      "07"=>"Juli",
      "08"=>"Agustus",
      "09"=>"September",
      "10"=>"Oktober",
      "11"=>"November",
      "12"=>"Desember"
    );

  }

  public function show(){
    return view('/menu/rekapitulasi_opini', ['month' => $this->bulan]);
  }

  public function search(Request $request){
    $month = $request->input("month");
    $year = $request->input("year");
    $data = array();
    if (Session::get('level') == 'admin') {
      if($request->input("by")=="maker"){

        $maker = PengajuanOpini::select("maker")
        ->groupBy("maker")
        ->orderBy('maker', 'asc')->get();

        foreach($maker as $val){
          $onprogress = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",'=',$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","ON PROGRESS")->count();
          $dikembalikan = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","dikembalikan")->count();
          $batal = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","Batal")->count();
          $selesai = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","Selesai")->count();
          $terpenuhi = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where('status',"Selesai")->where("sla","<=",2)->count();
          $terlewati = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where('status',"Selesai")->where("sla",">",2)->count();
          $data[] = array(
            "label"=>$val->maker,
            "onprogress"=>$onprogress,
            "dikembalikan"=>$dikembalikan,
            "batal"=>$batal,
            "selesai"=>$selesai,
            "terpenuhi"=>$terpenuhi,
            "terlewati"=>$terlewati
          );
        }
      }else{
        $cabang = cabang::orderBy('nama_lokasi')->get();
        foreach($cabang as $val){
          $onprogress = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",'=',$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","ON PROGRESS")->count();
          $dikembalikan = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","dikembalikan")->count();
          $batal = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","Batal")->count();
          $selesai = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","Selesai")->count();
          $terpenuhi = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where('status',"Selesai")->where("sla","<=",2)->count();
          $terlewati = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where('status',"Selesai")->where("sla",">",2)->count();
          $data[] = array(
            "label"=>$val->nama_lokasi,
            "onprogress"=>$onprogress,
            "dikembalikan"=>$dikembalikan,
            "batal"=>$batal,
            "selesai"=>$selesai,
            "terpenuhi"=>$terpenuhi,
            "terlewati"=>$terlewati
          );
        }
      }
    } else {
      if($request->input("by")=="maker"){

        $maker = PengajuanOpini::select("maker")->where('maker',Session::get('name'))
        ->groupBy("maker")
        ->orderBy('maker', 'asc')->get();

        foreach($maker as $val){
          $onprogress = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",'=',$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","ON PROGRESS")->count();
          $dikembalikan = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","dikembalikan")->count();
          $batal = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","Batal")->count();
          $selesai = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","Selesai")->count();
          $terpenuhi = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where('status',"Selesai")->where("sla","<=",2)->count();
          $terlewati = PengajuanOpini::where('maker',$val->maker)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where('status',"Selesai")->where("sla",">",2)->count();
          $data[] = array(
            "label"=>$val->maker,
            "onprogress"=>$onprogress,
            "dikembalikan"=>$dikembalikan,
            "batal"=>$batal,
            "selesai"=>$selesai,
            "terpenuhi"=>$terpenuhi,
            "terlewati"=>$terlewati
          );
        }
      }else{
        $cabang = cabang::select('cabang.*')->rightJoin('daftar_pengajuan','daftar_pengajuan.cabang','=','cabang.id')->where('daftar_pengajuan.maker',Session::get('name'))->get();
        foreach($cabang as $val){
          $onprogress = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",'=',$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","ON PROGRESS")->count();
          $dikembalikan = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","dikembalikan")->count();
          $batal = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","Batal")->count();
          $selesai = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where("status","Selesai")->count();
          $terpenuhi = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where('status',"Selesai")->where("sla","<=",2)->count();
          $terlewati = PengajuanOpini::where('cabang',$val->Id)->whereMonth("tgl_lengkap",$month)
          ->whereYear("tgl_lengkap",'=',$year)->where('status',"Selesai")->where("sla",">",2)->count();
          $data[] = array(
            "label"=>$val->nama_lokasi,
            "onprogress"=>$onprogress,
            "dikembalikan"=>$dikembalikan,
            "batal"=>$batal,
            "selesai"=>$selesai,
            "terpenuhi"=>$terpenuhi,
            "terlewati"=>$terlewati
          );
        }
      }
    }



    return view('/menu/rekapitulasi_opini', ['month' => $this->bulan,'rekap'=>$data]);
  }
}
