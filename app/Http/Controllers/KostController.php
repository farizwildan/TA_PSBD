<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class kostController extends Controller
{
    public function create() {
        return view('kost.add');
        }
        public function store(Request $request) {
        $request->validate([
        
        'id_kost' => 'required',
        'nama_kost' => 'required',
        'tipe_kost' => 'required',
        'no_kamar' => 'required',
        'id_pemilik' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO kost(id_kost, nama_kost, tipe_kost, no_kamar, id_pemilik) VALUES
        (:id_kost, :nama_kost, :tipe_kost, :no_kamar, :id_pemilik)',
        [
        'id_kost' => $request->id_kost,
        'nama_kost' => $request->nama_kost,
        'tipe_kost' => $request->tipe_kost,
        'no_kamar' => $request->no_kamar,
        'id_pemilik' => $request->id_pemilik
        ]
        );
        return redirect()->route('kost.index')->with('success', 'Data kost berhasil disimpan');
        }
        public function index(Request $request) {
            if ($request->has('search')){
                $datas = DB::select('SELECT kost.id_kost, kost.nama_kost, kost.tipe_kost, pemilik.nama_pemilik, pemilik.alamat , mahasiswa.id_mahasiswa, mahasiswa.nama_mahasiswa
                FROM kost
                LEFT JOIN pemilik
                ON kost.id_kost=pemilik.id_kost
                LEFT JOIN mahasiswa
                ON kost.id_kost=mahasiswa.id_kost WHERE delete_in = 0 and kost.id_kost LIKE :search;',[
                'search'=>'%'.$request->search.'%']);

                $index2 = DB::select('SELECT kost.id_kost, kost.nama_kost, kost.tipe_kost, pemilik.nama_pemilik, pemilik.alamat , mahasiswa.id_mahasiswa, mahasiswa.nama_mahasiswa
                FROM kost
                LEFT JOIN pemilik
                ON kost.id_kost=pemilik.id_kost
                LEFT JOIN mahasiswa
                ON kost.id_kost=mahasiswa.id_kost WHERE delete_in = 1 and kost.id_kost LIKE :search;',[
                'search'=>'%'.$request->search.'%']);

                return view('kost.index')
                ->with('datas', $datas)
                ->with('index2', $index2);
            } else {
                $datas = DB::select('SELECT kost.id_kost, kost.nama_kost, kost.tipe_kost, pemilik.nama_pemilik, pemilik.alamat , mahasiswa.id_mahasiswa, mahasiswa.nama_mahasiswa
                FROM kost
                LEFT JOIN pemilik
                ON kost.id_kost=pemilik.id_kost
                LEFT JOIN mahasiswa
                ON kost.id_kost=mahasiswa.id_kost WHERE delete_in = 0');
            

                $index2 = DB::select('SELECT kost.id_kost, kost.nama_kost, kost.tipe_kost, pemilik.nama_pemilik, pemilik.alamat , mahasiswa.id_mahasiswa, mahasiswa.nama_mahasiswa
                FROM kost
                LEFT JOIN pemilik
                ON kost.id_kost=pemilik.id_kost
                LEFT JOIN mahasiswa
                ON kost.id_kost=mahasiswa.id_kost WHERE delete_in = 1');
                return view('kost.index')
                ->with('datas', $datas)
                ->with('index2', $index2);
                }
            
            
        }
        public function edit($id) {
            $data = DB::table('kost')->where('id_kost',
            $id)->first();
            return view('kost.edit')->with('data', $data);
            }
            public function update($id, Request $request) {
            $request->validate([
            'id_kost' => 'required',
            'nama_kost' => 'required',
            'tipe_kost' => 'required',
            'no_kamar' => 'required',
            'id_pemilik' => 'required'
            ]);
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE kost SET id_kost = :id_kost, nama_kost = :nama_kost, tipe_kost = tipe_kost, no_kamar = :no_kamar, id_pemilik = :id_pemilik WHERE id_kost = :id',
            [
            'id' => $id,
            'id_kost' => $request->id_kost,
            'nama_kost' => $request->nama_kost,
            'tipe_kost' => $request->tipe_kost,
            'no_kamar' => $request->no_kamar,
            'id_pemilik' => $request->id_pemilik
            ]
            );
            return redirect()->route('kost.index')->with('success', 'Data kost berhasil diubah');
            }
            public function delete($id) {
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
             DB::delete('DELETE FROM kost WHERE id_kost = :id_kost', ['id_kost' => $id]);
                return redirect()->route('kost.index')->with('success', 'Data kost berhasil dihapus');
            }
            public function soft($id)
            {
             DB::update('UPDATE kost SET delete_in = 1 WHERE id_kost = :id_kost', ['id_kost' => $id]);

            return redirect()->route('kost.index')->with('success', 'Data Barang berhasil dihapus');
            }
            public function restore($id)
            {
             DB::update('UPDATE kost SET delete_in = 0 WHERE id_kost = :id_kost', ['id_kost' => $id]);

             return redirect()->route('kost.index')->with('success', 'Data Barang berhasil dihapus');
            }
            
        
            
}
