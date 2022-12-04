<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function create() {
        return view('mahasiswa.add');
        }
        public function store(Request $request) {
        $request->validate([
        
        'id_mahasiswa' => 'required',
        'nama_mahasiswa' => 'required',
        'id_kost' => 'required',
        'no_kamar' => 'required',
        'metode_pembayaran' => 'required',
        'ktm' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO mahasiswa(id_mahasiswa, nama_mahasiswa, id_kost, no_kamar, metode_pembayaran, ktm) VALUES
        (:id_mahasiswa, :nama_mahasiswa, :id_kost, :no_kamar, :metode_pembayaran, :ktm)',
        [
        'id_mahasiswa' => $request->id_mahasiswa,
        'nama_mahasiswa' => $request->nama_mahasiswa,
        'id_kost' => $request->id_kost,
        'no_kamar' => $request->no_kamar,
        'metode_pembayaran' => $request->metode_pembayaran,
        'ktm' => $request->ktm
        ]
        );
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil disimpan');
        }
        public function index(Request $request) {
            if ($request->has('search')){
            $datas = DB::select('select * from mahasiswa WHERE nama_mahasiswa LIKE :search;',[
            'search'=>'%'.$request->search.'%']);
            return view('mahasiswa.index')
            
            ->with('datas', $datas);
        }else {
            $datas = DB::select('select * from mahasiswa');
            return view('mahasiswa.index')
        
        ->with('datas', $datas);
            }
            
        }
        public function edit($id) {
            $data = DB::table('mahasiswa')->where('id_mahasiswa',
            $id)->first();
            return view('mahasiswa.edit')->with('data', $data);
            }
            public function update($id, Request $request) {
            $request->validate([
                'id_mahasiswa' => 'required',
                'nama_mahasiswa' => 'required',
                'id_kost' => 'required',
                'no_kamar' => 'required',
                'metode_pembayaran' => 'required',
                'ktm' => 'required'
            ]);
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE mahasiswa SET id_mahasiswa = :id_mahasiswa, nama_mahasiswa = :nama_mahasiswa, id_kost = :id_kost, no_kamar = :no_kamar, metode_pembayaran = :metode_pembayaran, ktm = :ktm WHERE id_mahasiswa = :id',
            [
            'id' => $id,
            'id_mahasiswa' => $request->id_mahasiswa,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'id_kost' => $request->id_kost,
            'no_kamar' => $request->no_kamar,
            'metode_pembayaran' => $request->metode_pembayaran,
            'ktm' => $request->ktm
            ]
            );
            return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diubah');
            }
            public function delete($id) {
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
             DB::delete('DELETE FROM mahasiswa WHERE id_mahasiswa = :id_mahasiswa', ['id_mahasiswa' => $id]);
                return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus');
            }
}
