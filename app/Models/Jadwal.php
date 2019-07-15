<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $guarded = [];

    public function peminjaman()
    {
        return $this->hasMany('App\Models\Peminjaman', 'id_jadwal');
    }
}
