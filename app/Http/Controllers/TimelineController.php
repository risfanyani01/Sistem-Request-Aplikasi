<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Timeline;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TimelineController extends Controller
{
    // public function showTimeline($id){
    //     $timeline = Timeline::select('timelines.*','pengajuan_id')
    //                 ->join('pengajuans','pengajuans.id','=','timelines.pengajuan_id')->get();
        
    //     return view('admin.pages.pengajuan.detail', compact('timeline'));
    // }

    public function addTimeline(Request $request, $pengajuan_id){
        
        // $pengajuan_id = Timeline::select('timelines.*','pengajuan_id')
        //                 ->join('pengajuans','pengajuans.id','=','timelines.pengajuan_id')->get();
        
        // $pengajuanId = Pengajuan::findOrFail($pengajuan_id);

        $timeline = new Timeline();
        $timeline->pengajuan_id = $request->pengajuan_id;
        $timeline->nama_proses = $request->nama_proses;
        $timeline->target_selesai = $request->target_selesai;
        $timeline->tanggal_selesai = '-';
        $timeline->save();

        return redirect()->back();

    }

    public function deleteTimeline($id){
        $timeline = Timeline::findOrFail($id);
        $timeline->delete();
        
        return redirect()->back();
    }

    public function prosesTimeline($id){

        try{
            Timeline::where('id', $id)->update([
                'status' => 'proses'
            ]);
            
            \Session::flash('proses', 'Timeline Diproses');
        }

        catch(\Exception $e){
            \Session::flash('gagal'.$e->getMessage());
        }

        return redirect()->back();
    }

    public function doneTimeline($id){

        $tanggalSelesai = Carbon::now()->isoFormat('dddd, D MMMM Y');

        try{
            Timeline::where('id', $id)->update([
                'status' => 'selesai',
                'tanggal_selesai' => $tanggalSelesai

            ]);
            
            \Session::flash('proses', 'Timeline Diproses');
        }

        catch(\Exception $e){
            \Session::flash('gagal'.$e->getMessage());
        }

        return redirect()->back();
    }
}
