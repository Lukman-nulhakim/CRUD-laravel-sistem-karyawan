<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $guarded = [];

    public function telepon(){
        return  $this->hasOne(Telepon::class, 'karyawan_id','id');
    }

    public function bagian(){
        return $this->belongsTo(bagian::class, 'bagian_id', 'id');
    }

    public function hobi(){
        return $this->belongsToMany(Hobi::class, 'hobi_karyawans', 'karyawan_id','hobi_id')->withTimestamps();
    }
}
