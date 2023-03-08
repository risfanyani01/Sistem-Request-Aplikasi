<?php

namespace App\Http\Controllers;

use App\Models\Seksi;
use App\Models\Kategori;
use App\Models\Pengajuan;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Session\Session;

class PengajuanController extends Controller
{
    public function index(){
        $datas = Pengajuan::where('keterangan', 'pending')->latest()->get();
        return view('admin.pages.pengajuan.index', compact('datas'));
    }

    public function create(){
        $kategori = Kategori::all();
        $seksi = Seksi::all();
        $departemen = Departemen::all();
        return view('admin.pages.pengajuan.create', compact('kategori', 'seksi', 'departemen'));
    }

    public function store(Request $request){ 
             
        Validator::make($request->all(), [
        'kategori_id' => 'required',
        'nama_aplikasi' => 'required',
        'penjelasan' => 'required',
        'seksi_id' => 'required',
        'departemen_id' => 'required',
        'gambar' => 'required',
        'gambar' => 'mimes:pdf|max:5000',
        ], [
            'gambar.max' => 'Ukuran File Maksimal 5 MB',
            'gambar.mimes' => 'Tipe File Harus Pdf',
            '*.required' => 'Field Harus Di Isi'
        ])->validate();

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/gambar', $image->hashName());

        $tanggalPengajuan = Carbon::now()->isoFormat('dddd, D MMMM Y');
        
        $data = new Pengajuan();
        $data->kategori_id = $request->kategori_id;
        $data->nama_aplikasi = $request->nama_aplikasi;
        $data->penjelasan = $request->penjelasan;
        $data->seksi_id = $request->seksi_id;
        $data->departemen_id = $request->departemen_id;
        $data->gambar = $image->hashName();
        $data->tanggal_pengajuan = $tanggalPengajuan;
        $data->save();

        if($data){
            return redirect()->route('pengajuan.index');
        }
    }

    public function show($id){
        $data = Pengajuan::findOrFail($id);        
        return view('admin.pages.pengajuan.detail', compact('data'));
    }

    public function edit($id){
        $kategori = Kategori::all();
        $seksi = Seksi::all();
        $departemen = Departemen::all();
        $data = Pengajuan::findOrFail($id);
        return view('admin.pages.pengajuan.edit', compact('kategori','data','seksi', 'departemen'));
    }

    public function update(Request $request, $id){
         
        $this->validate($request, [
            'gambar'     => 'mimes:pdf',
        ]);

        $data = Pengajuan::findOrFail($id);

        if ($request->hasFile('gambar')) {

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/gambar', $image->hashName());

            //delete old image
            Storage::delete('public/gambar/'.$post->gambar);

            //update post with new image

            $data->kategori_id = $request->kategori_id;
            $data->seksi_id = $request->seksi_id;
            $data->nama_aplikasi = $request->nama_aplikasi;
            $data->penjelasan = $request->penjelasan;
            $data->gambar = $image->hashName();
            $data->save();

            if($data){
                return redirect()->route('pengajuan.index');
            }
        }else{
            $data->kategori_id = $request->kategori_id;
            $data->seksi_id = $request->seksi_id;
            $data->nama_aplikasi = $request->nama_aplikasi;
            $data->penjelasan = $request->penjelasan;
            $data->save();
        }
        if($data){
            return redirect()->route('pengajuan.index');
        }
    }

    public function delete($id){
        $data = Pengajuan::findOrFail($id);
        //delete image
        Storage::delete('public/gambar/'. $data->gambar);
        $data->delete();

        return redirect()->route('pengajuan.index');
    }

    public function pengajuan_diterima(){
        $data = Pengajuan::where('keterangan', 'diterima')->get();
        return view('admin.pages.pengajuan.pengajuan-disetujui.index', compact('data'));
    }

    public function pengajuan_ditolak(){
        $data = Pengajuan::where('keterangan', 'ditolak')->get();
        return view('admin.pages.pengajuan.pengajuan-tidak-disetujui.index', compact('data'));
    }

    public function pengajuan_selesai(){
        $data = Pengajuan::where('keterangan', 'selesai')->get();
        return view('admin.pages.pengajuan.pengajuan-selesai.index', compact('data'));
    }

    public function pengajuan_proses(){
        $data = Pengajuan::where('keterangan', 'proses')->get();
        return view('admin.pages.pengajuan.pengajuan-proses.index', compact('data'));
    }

    public function approve($id){
        try{
            Pengajuan::where('id', $id)->update([
                'keterangan' => 'diterima'
            ]);
            
            \Session::flash('diterima', 'Pengajuan Diterima');
        }

        catch(\Exception $e){
            \Session::flash('gagal'.$e->getMessage());
        }

        return redirect()->route('pengajuan.index');
    }

    public function cancel($id){
        try{
            Pengajuan::where('id', $id)->update([
                'keterangan' => 'ditolak'
            ]);
            
            \Session::flash('ditolak', 'Pengajuan Ditolak');
        }

        catch(\Exception $e){
            \Session::flash('gagal'.$e->getMessage());
        }

        return redirect()->route('pengajuan.index');
    }

    public function proses($id){
        try{
            Pengajuan::where('id', $id)->update([
                'keterangan' => 'proses'
            ]);
            
            \Session::flash('proses', 'Pengajuan Diproses');
        }

        catch(\Exception $e){
            \Session::flash('gagal'.$e->getMessage());
        }

        return redirect()->route('pengajuan.diterima');
    }

    public function done($id){
        try{
            Pengajuan::where('id', $id)->update([
                'keterangan' => 'selesai'
            ]);
            
            \Session::flash('selesai', 'Pengajuan Selesai');
        }

        catch(\Exception $e){
            \Session::flash('gagal'.$e->getMessage());
        }

        return redirect()->route('pengajuan.diterima');
    }
       
}
