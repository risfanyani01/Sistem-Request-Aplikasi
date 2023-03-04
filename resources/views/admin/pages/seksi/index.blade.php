@extends('admin.layouts.main')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-bookmark"></i>
            </span> Nama Seksi
          </h3>
      </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                                <div class="mb-4">
                                    <a href="{{route('seksi.create')}}" class="btn btn-md btn-primary rounded-1">Tambah Seksi</a>
                                </div>
                                <table class="table table-responsive table-bordered table-striped" style="font-size: 14px">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th width="80%" scope="col">Nama Seksi</th>
                                        <th class="text-center" scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @php
                                            $no = 1; 
                                        @endphp
                                        @forelse ($datas as $data)
                                        <tr>
                                            <td class="text-center">{{$no++}}</td>
                                            <td>{{$data->nama_seksi}}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('seksi.delete',$data->id)}}" method="POST">
                                                    <a href="{{route('seksi.edit',$data->id)}}" class="btn btn-sm btn-success">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                         <td colspan="3" class="text-center">
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