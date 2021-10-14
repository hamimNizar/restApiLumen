<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MahasiswaController extends Controller
{
    //
    public function index(){
        $dataall = Mahasiswa::all();

        $response = [
            'desc' => 'Data seluruh mahasiswa',
            'status' => 'success',
            'data' => $dataall
        ];

        return response()->json($response, 200);
    }

    public function search(Request $request){
        $idmhs = $request->input('id');

        $datasearch = Mahasiswa::find($idmhs);

        if (!$datasearch) {
            $response = [
                'desc' => 'data not found',
                'status' => 'failed',
            ];
        
            return response()->json($response, 404);
        }

        $response = [
            'desc' => 'Check data mahasiswa dengan id '.$idmhs,
            'status' => 'success',
            'data' => $datasearch
        ];

        return response()->json($response, 200);
        // return (new Response($response,201))->header('Content-Type','application/json');
    }

    public function create(Request $request){
        $this->validate($request, [
                "nim" => "required",
                "nama" => "required",               
                "jurusan" => "required",               
                "ipk" => "required",               
            ]);

        $datacreate = $request->all();

        $createdata = Mahasiswa::create($datacreate);
            $response = [
                'Desc' => 'Data berhasil ditambahkan',
                'Data' => $createdata
            ];
    
            return response()->json($response, 201);
    }

    public function update(Request $request, $idmhs){
        $dataupdate = Mahasiswa::find($idmhs);

        if($dataupdate){
            $dataupdate->update($request->all());

            $response = [
                'Desc' => 'Data berhasil diupdate',
                'Data' => $dataupdate
            ];

            return response()->json($response, 200);
        }

        $response = [
                'desc' => 'data not found',
                'status' => 'failed',
            ];
        
        return response()->json($response, 404);
    }

    public function delete($idmhs){
        $datadel = Mahasiswa::find($idmhs);

        if($datadel){
            $datadel->delete();
            $response = [
                'desc' => 'data deleted successfully',
                'status' => 'success',
            ];
        
            return response()->json($response, 200);
        }

        $response = [
                'desc' => 'data not found',
                'status' => 'failed',
            ];
        
            return response()->json($response, 404);
        }
}
