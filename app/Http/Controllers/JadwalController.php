<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
    	return view('jadwal', ['jadwals' => Jadwal::all()]);
    }

    public function store(Request $request)
    {
    	Jadwal::create([
    		"waktu" => $request->waktu,
    	]);

        return redirect()->back();
    } 

    public function destroy($id)
    {
    	Jadwal::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function update(Request $request, $id)
    {
    	Jadwal::where('id', $id)->update([
    		'waktu' => $request->waktu,
    	]);
    	return redirect()->back();
    }
}
