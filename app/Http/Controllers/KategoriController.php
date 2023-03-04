<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KategoriController extends Controller
{
    public function index(){
        $datas = Kategori::all();
        return view('admin.pages.kategori.index', compact('datas'));
    }

    public function create(){
        return view('admin.pages.kategori.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_jenis' => 'required',
        ]);

        $data = new Kategori();
        $data->nama_jenis = $request->nama_jenis;
        $data->save();

        if($data){
            return redirect()->route('kategori.index');
        }
    }

    public function edit($id){
        $data = Kategori::findOrFail($id);
        return view('admin.pages.kategori.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nama_jenis' => 'required',
        ]);

        $data = Kategori::findOrFail($id);
        $data->nama_jenis = $request->nama_jenis;
        $data->save();

        if($data){
            return redirect()->route('kategori.index');
        }
        
    }

    public function delete($id){
        $data = Kategori::findOrFail($id);
        $data->delete();

        return redirect()->route('kategori.index');
    }
}
