<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    protected $guarded =[];

    public function karyawan(){
        return $this->belongsToMany(Karyawan::class, 'hobi_karyawans','hobi_id','karyawan_id')->withTimestamps();
    }
}
