<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
	protected $table = 'peminjamans';
    protected $guarded = [];

    public function getJadwal()
    {
        return $this->belongsTo('App\Models\Jadwal', 'id_jadwal');
    }
}
