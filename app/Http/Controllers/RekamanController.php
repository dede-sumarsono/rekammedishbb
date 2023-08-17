<?php

namespace App\Http\Controllers;

use App\Http\Resources\RekamanResource;
use App\Models\Rekaman;
use Illuminate\Http\Request;

class RekamanController extends Controller
{
    function buatrekaman(Request $request) {

        $validate = $request->validate([
            'pasien_id'=> 'required|exists:pasiens,id',
            'nomor' => 'required',
            'jenis_pelayanan' => 'required',
            'poli' => 'required',
        ]);

        //$rekaman = Rekaman::create($request->all());

        $buat = Rekaman::create($request->all());

        //return response()->json($buat->loadMissing(['dataPasien']));
        return new RekamanResource($buat->loadMissing(['dataPasien:id,name,jenis_kelamin']));

        
    }


    function updaterekaman(Request $request, $id) {
        $validate = $request->validate([
            'diagnosa'=> 'required',
            'terapi' => 'required',
            'keterangan' => 'required',
        ]);


        $rekaman = Rekaman::findOrFail($id);
        $rekaman->update($request->all());

        return new RekamanResource($rekaman->loadMissing(['dataPasien:id,name,jenis_kelamin']));


    }

    function hapusrekaman($id) {
        $rekaman = Rekaman::findOrFail($id);
        $rekaman->delete();
        
    }
}
