<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BadanUsaha extends Model
{
  protected $table = 'badan_usaha';

  // protected $guarded = ['id'];
  public $timestamps = false;

  public function opini()
    {
        return $this->belongsTo(PengajuanOpini::class,'badan_usaha');
    }
}
