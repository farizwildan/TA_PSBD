<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PemilikController extends Controller
{
    public function create() {
        return view('pemilik.add');
        }
        public function store(Request $request) {
        $request->validate([
        
        'id_kost' => 'required',
        'nama_pemilik' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'no_rekening' => 'required'
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pemilik(id_kost, nama_pemilik, alamat, no_hp, no_rekening) VALUES
        (:id_kost, :nama_pemilik, :alamat, :no_hp, :no_rekening)',
        [
        'id_kost' => $request->id_kost,
        'nama_pemilik' => $request->nama_pemilik,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'no_rekening' => $request->no_rekening,
        ]
        );
        return redirect()->route('pemilik.index')->with('success', 'Data pemilik berhasil disimpan');
        }
        public function index(Request $request) {
            if ($request->has('search')){
            $datas = DB::select('select * from pemilik WHERE nama_pemilik LIKE :search;',[
                'search'=>'%'.$request->search.'%']);
            return view('pemilik.index')
            
            ->with('datas', $datas);
        }else {
            $datas = DB::select('select * from pemilik');
            return view('pemilik.index')
        
        ->with('datas', $datas);
            }
        }
        public function edit($id) {
            $data = DB::table('pemilik')->where('id_kost',
            $id)->first();
            return view('pemilik.edit')->with('data', $data);
            }
            public function update($id, Request $request) {
            $request->validate([
                'id_kost' => 'required',
                'nama_pemilik' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'no_rekening' => 'required'
            ]);
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE pemilik SET id_kost = :id_kost, nama_pemilik = :nama_pemilik, alamat = :alamat, no_hp = :no_hp, no_rekening = :no_rekening WHERE id_kost = :id',
            [
            'id' => $id,
            'id_kost' => $request->id_kost,
            'nama_pemilik' => $request->nama_pemilik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_rekening' => $request->no_rekening,
            ]
            );
            return redirect()->route('pemilik.index')->with('success', 'Data pemilik berhasil diubah');
            }
            public function delete($id) {
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
             DB::delete('DELETE FROM pemilik WHERE id_kost = :id_kost', ['id_kost' => $id]);
                return redirect()->route('pemilik.index')->with('success', 'Data pemilik berhasil dihapus');
            }
}
