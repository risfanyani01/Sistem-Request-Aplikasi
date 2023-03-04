<?php

namespace App\Http\Controllers;

use App\Models\Seksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SeksiController extends Controller
{
    public function index(){
        $datas = Seksi::all();
        return view('admin.pages.seksi.index', compact('datas'));
    }

    public function create(){
        return view('admin.pages.seksi.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_seksi' => 'required',
        ]);

        $data = new Seksi();
        $data->nama_seksi = $request->nama_seksi;
        $data->save();

        if($data){
            return redirect()->route('seksi.index');
        }
    }

    public function edit($id){
        $data = Seksi::findOrFail($id);
        return view('admin.pages.seksi.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nama_seksi' => 'required',
        ]);

        $data = Seksi::findOrFail($id);
        $data->nama_seksi = $request->nama_seksi;
        $data->save();

        if($data){
            return redirect()->route('seksi.index');
        }
        
    }

    public function delete($id){
        $data = Seksi::findOrFail($id);
        $data->delete();

        return redirect()->route('seksi.index');
    }
}
