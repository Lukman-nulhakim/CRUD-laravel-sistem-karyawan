<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    protected  $guarded = [];

    public function karyawan()
    {
        // param1 model tujuan, param2 forenkey, param3 primary key local
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id');
    }
}
