<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bagian extends Model
{
   protected $guarded = [];

   public function karyawan(){
      return $this->hasMany(Karyawan::class, 'bagian_id', 'id');
   }
}
