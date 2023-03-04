@extends('admin.layouts.main')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-bookmark"></i>
            </span> Data Pengajuan
          </h3>
      </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                                @if (Auth::user()->role == 'user')
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{route('pengajuan.create')}}" class="btn btn-md btn-primary" >Tambah Data</a>
                                        <div>
                                            <a href="{{route('pengajuan.selesai')}}" class="btn btn-sm btn-info" >Selesai</a>
                                            <a href="{{route('pengajuan.diterima')}}" class="btn btn-sm btn-success" >Diterima</a>
                                            <a href="{{route('pengajuan.proses')}}" class="btn btn-sm btn-warning" >Diproses</a>
                                            <a href="{{route('pengajuan.ditolak')}}" class="btn btn-sm btn-danger" >Ditolak</a>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="mb-4">
                                    <div>
                                        <a href="{{route('pengajuan.selesai')}}" class="btn btn-sm btn-info" >Selesai</a>
                                    </div>
                                </div>
                                @endif
                                <table id="pengajuan" class="table table-bordered table-striped table-hover">
                                    <thead style="font-size: 14px;">
                                        <tr>
                                            <th class="text-center">No</th>                                          
                                            <th>Nama Aplikasi</th>
                                            <th>Jenis Permintaan</th>
                                            <th class="text-center">Pemohon</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size:14px;">
                                         @php $no=1 @endphp
                                        @forelse ($datas as $data)
                                        <tr>
                                            <td class="text-center">{{$no++}}</td>
                                            <td class="text-wrap">{{$data->nama_aplikasi}}</td>
                                            <td class="text-wrap">{{$data->kategori->nama_jenis}}</td>                                       
                                            <td class="text-center">{{$data->seksi->nama_seksi}}</td>
                                            @if ($data->keterangan == 'pending')
                                                <td class="text-center"><span class="bg-warning rounded-5 px-2 py-1"><strong>{{$data->keterangan}}</strong></span></td>
                                            @endif

                                            @if (Auth::user()->role == 'user')
                                            <td class="text-center">
                                                <form action="{{route('pengajuan.delete',$data->id)}}" method="post">
                                                    <a href="{{route('pengajuan.detail',$data->id)}}" class="btn btn-sm btn-info"><i class="mdi mdi-eye"></i></a>
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{route('pengajuan.edit',$data->id)}}" class="btn btn-sm btn-warning fa fa-edit"><i class="mdi mdi-pencil"></i></a>
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin menghapus')"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </td>

                                            @elseif(Auth::user()->role == 'manager')
                                            <td class="text-center">
                                                <a href="{{route('pengajuan.detail',$data->id)}}" class="btn btn-sm btn-info"><i class="mdi mdi-eye"></i></a>
                                                <a href="{{route('pengajuan.approve',$data->id)}}" class="btn btn-sm btn-success"><i class="mdi mdi-check"></i></a>
                                                <a href="{{route('pengajuan.cancel',$data->id)}}" class="btn btn-sm btn-danger"><i class="mdi mdi-cancel"></i></a>
                                            </td>                                           
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