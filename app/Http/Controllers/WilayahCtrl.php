<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class WilayahCtrl extends Controller
{
	public function index()
	{
		$kecamatan = Kecamatan::pluck('nama','id');
		return view('wilayah.index', compact('kecamatan'));
	}
    public function store(Request $req)
    {
    	$kelurahan = Kelurahan::where('kec_id_fk', $req->get('id'))
            ->pluck('nama', 'id');
        return response()->json($kelurahan);
    }
}
