<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Peminjaman;
use App\Models\Jadwal;

class PeminjamanController extends Controller
{
    public function index()
    {
    	return view('peminjaman', ['peminjamans' => Peminjaman::with('getJadwal')->get()]);
    }

    public function store(Request $request)
    {
    	Peminjaman::create([
    		'nim' => $request->nim,
    		'nama' => $request->nama,
    		'email' => $request->email,
    		'tanggal' => $request->tanggal,
    		'id_jadwal' => $request->jam,
    		'status' => 'Belum disetujui',
    		'keterangan' => $request->keterangan,
    	]);

        return redirect()->back();
    } 

    public function destroy($id)
    {
    	Peminjaman::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function update(Request $request, $id)
    {
    	Peminjaman::where('id', $id)->update([
    		'nim' => $request->nim,
    		'nama' => $request->nama,
    		'email' => $request->email,
    		'tanggal' => $request->tanggal,
    		'id_jadwal' => $request->id_jadwal,
    		'status' => $request->status,
    		'keterangan' => $request->keterangan,
    	]);
    	return redirect()->back();
    }

    public function acc($id)
    {
    	Peminjaman::where('id', $id)->update([
    		'status' => 'Disetujui',
    	]);
    	return redirect()->back();
    }

    public function cekwaktu($tanggal)
    {
        return Jadwal::whereDoesntHave('peminjaman', function (Builder $query) use ($tanggal) {
            $query->where('tanggal', $tanggal);
        })->get();
    }
}
