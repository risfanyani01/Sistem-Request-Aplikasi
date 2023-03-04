<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index(){
        $dataPengajuan = Pengajuan::count();
        $pengajuanDiterima = Pengajuan::where('keterangan', 'diterima')->count();
        $pengajuanPending = Pengajuan::where('keterangan', 'pending')->count();
        $pengajuanDiproses = Pengajuan::where('keterangan', 'proses')->count();
        $pengajuanSelesai = Pengajuan::where('keterangan', 'selesai')->count();
        $pengajuanDitolak = Pengajuan::where('keterangan', 'ditolak')->count();
        return view('admin.dashboard', compact('dataPengajuan','pengajuanDiterima','pengajuanPending','pengajuanDitolak','pengajuanDiproses', 'pengajuanSelesai'));
    }
}
