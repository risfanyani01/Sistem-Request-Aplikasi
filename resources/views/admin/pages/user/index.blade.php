@extends('admin.layouts.main')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-bookmark"></i>
            </span> Akun
          </h3>
      </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="mb-4">
                                        <a href="{{route('user.create')}}" class="btn btn-md btn-primary rounded-1">Tambah Akun</a>
                                    </div>
                                    {{-- <div class="d-flex gap-3 align-self-center">
                                        <span class="py-2">KET :</span>
                                        <p class="bg-warning text-white px-4 py-2 rounded"> <span class="small">kuning sebagai</span> SIT</p>
                                        <p class="bg-info text-white px-4 py-2 rounded"> <span class="small">biru muda sebagai</span> MANAGER</p>
                                        <p class="bg-primary text-white px-4 py-2 rounded"> <span class="small">biru tua sebagai</span> USER</p>
                                    </div> --}}
                                </div>
                                <table class="table table-responsive table-bordered table-striped" style="font-size: 14px">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col">Name Code</th>
                                        <th class="text-center" scope="col">Nama</th>
                                        <th class="text-center" scope="col">Jenis Kelamin</th>
                                        <th class="text-center" scope="col">Alamat Asal</th>
                                        <th class="text-center" scope="col">Nomor Telepon</th>
                                        <th class="text-center" scope="col">Role</th>
                                        <th class="text-center" scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @php
                                            $no = 1; 
                                        @endphp
                                        @forelse ($data as $item)
                                        <tr>
                                            <td class="text-center">{{$no++}}</td>
                                            <td>{{$item->namecode}}</td>
                                            <td class="text-center">{{$item->name}}</td>
                                            <td class="text-center">{{$item->jenis_kelamin}}</td>
                                            <td class="text-center text-wrap">{{$item->alamat_asal}}</td>
                                            <td class="text-center">{{$item->telp}}</td>
                                            @if ($item->role == 'user')
                                                <td class="bg-primary text-white text-center text-uppercase">{{$item->role}}</td>
                                            @elseif ($item->role == 'manager')
                                                <td class="bg-info text-white text-center text-uppercase">{{$item->role}}</td>
                                           @else
                                                <td class="bg-warning text-white text-center text-uppercase">{{$item->role}}</td>
                                            @endif
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('user.delete',$item->id)}}" method="POST">
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