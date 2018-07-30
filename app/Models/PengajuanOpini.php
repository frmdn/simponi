<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanOpini extends Model
{
    protected $table = 'daftar_pengajuan';

    // protected $guarded = ['id'];
    public $timestamps = false;

    public function badanusaha(){
    	return $this->belongsTo(BadanUsaha::class,"badan_usaha");
    }
}
