@extends('admin.layouts.main')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-check"></i>
            </span> Data Pengajuan Yang Sedang Diproses Oleh TIM Developer
          </h3>
      </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body py-4">
                                @if (Auth::user()->role == 'user')
                                <div class="mb-4">
                                    <a class="btn btn-sm btn-primary" href="{{route('pengajuan.index')}}">Kembali</a>
                                </div>
                                @elseif(Auth::user()->role == 'sit')
                                <div class="mb-4">
                                    <a class="btn btn-sm btn-primary" href="{{route('pengajuan.diterima')}}">Kembail</a>
                                </div>
                                @endif
                                <table id="pengajuan" class="table table-bordered table-striped table-hover">
                                    <thead style="font-size: 14px;">
                                        <tr>
                                            <th>No</th>                                          
                                            <th>Nama Aplikasi</th>
                                            <th>Jenis Permintaan</th>
                                            <th class="text-center">Pemohon</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size:14px;">
                                         @php $no=1 @endphp
                                       @forelse ($data as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td class="text-wrap">{{$item->nama_aplikasi}}</td>
                                                <td class="text-wrap">{{$item->kategori->nama_jenis}}</td>
                                                <td class="text-center">{{$item->seksi->nama_seksi}}</td>
                                                @if ($item->keterangan == 'proses')
                                                    <td class="text-center"><span class="bg-warning rounded-5 px-2 py-1 text-light"><strong>{{$item->keterangan}}</strong></span></td>
                                                @endif   
                                                <td class="text-center">
                                                @if (Auth::user()->role == 'sit')
                                                    <a href="{{route('pengajuan.detail',$item->id)}}" class="btn btn-sm btn-info"><i class="mdi mdi-eye"></i></a>
                                                    <a href="{{route('pengajuan.done',$item->id)}}" class="btn btn-sm btn-success"><i class="mdi mdi-check"></i></a>
                                                @else
                                                    <a href="{{route('pengajuan.detail',$item->id)}}" class="btn btn-sm btn-info"><i class="mdi mdi-eye"></i></a></td>                                   
                                                @endif
                                                </tr>
                                       @empty
                                           <tr>
                                            <td colspan="6" class="text-center">
                                                Data Tidak Ada
                                            </td>
                                           </tr>
                                       @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection