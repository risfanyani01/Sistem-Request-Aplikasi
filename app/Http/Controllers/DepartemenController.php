<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DepartemenController extends Controller
{
    // Menampilkan Data Departemen Dari Database
    public function index(){
        $datas = Departemen::all();
        return view('admin.pages.departemen.index', compact('datas'));
    }

    // Menampilkan Form Tambah Data Departemen
    public function create(){
        return view('admin.pages.departemen.create');
    }

    // Mebambahkan Data Departemen Kedalam Database
    public function store(Request $request){
        $validated = $request->validate([
            'nama_departemen' => 'required',
        ]);

        $data = new Departemen();
        $data->nama_departemen = $request->nama_departemen;
        $data->save();

        if($data){
            return redirect()->route('departemen.index');
        }
    }

    // Menampilkan Halaman Edit Sesuai Dengan ID
    public function edit($id){
        $data = Departemen::findOrFail($id);
        return view('admin.pages.departemen.edit', compact('data'));
    }

    // Melakukan Perubahan Data Pada Database
    public function update(Request $request, $id){
        $validated = $request->validate([
            'nama_departemen' => 'required',
        ]);

        $data = Departemen::findOrFail($id);
        $data->nama_departemen = $request->nama_departemen;
        $data->save();

        if($data){
            return redirect()->route('departemen.index');
        }
        
    }

    // Menghapus Data
    public function delete($id){
        $data = Departemen::findOrFail($id);
        $data->delete();

        return redirect()->route('departemen.index');
    }
}
