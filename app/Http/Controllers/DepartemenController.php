<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DepartemenController extends Controller
{
    public function index(){
        $datas = Departemen::all();
        return view('admin.pages.departemen.index', compact('datas'));
    }

    public function create(){
        return view('admin.pages.departemen.create');
    }

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

    public function edit($id){
        $data = Departemen::findOrFail($id);
        return view('admin.pages.departemen.edit', compact('data'));
    }

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

    public function delete($id){
        $data = Departemen::findOrFail($id);
        $data->delete();

        return redirect()->route('departemen.index');
    }
}
