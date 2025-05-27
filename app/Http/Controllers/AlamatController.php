<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Negara;
use App\Models\Provinsi;
use App\Models\Kota;

class AlamatController extends Controller
{
    public function alamat(){
        $tbl_negara = Negara::select('id', 'name', 'type')->get();
        $tbl_provinsi = Provinsi::select('id', 'name', 'negara_id')->get();
        $tbl_kota = Kota::select('id','provinsi_id', 'name',
            'kota_id_ro', 'provinsi_id_ro', 'postal_code',
            'type_ro', 'kota_nama_ro', 'provinsi_nama_ro'
        )->get();

        return response()->json([
            'negara' => $tbl_negara,
            'provinsi' => $tbl_provinsi,
            'kota' => $tbl_kota
        ]);
    }
}
