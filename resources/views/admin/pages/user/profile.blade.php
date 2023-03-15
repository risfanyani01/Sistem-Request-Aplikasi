@extends('admin.layouts.main')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-account"></i>
        </span> My Profile
      </h3>
    </div>

    <div class="container">

    <section class="section profile">
      <div class="row">

        <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="card border-0 shadow rounded">
                      <div class="card-body">
                        <div class="text-center mb-4">
                          <img class="mb-4" src="{{asset('assets/images/logo.png')}}" alt="logo" style="width:240px">
                          <h3 class="text-uppercase">Halaman Profil <span style="color:#008fd3">{{Auth::user()->name}}</span></h3>
                        </div>
                          <table class="table table-responsive table-bordered table-striped" style="font-size: 14px">
                          <thead>
                              <tr>
                                  <th scope="col">Name Code</th>
                                  <th class="text-center" scope="col">Nama</th>
                                  <th class="text-center" scope="col">Role</th>

                                  </tr>
                              </thead>
                              <tbody>
                                
                                  <tr>
                                      <td>{{$data->namecode}}</td>
                                      <td class="text-center">{{$data->name}}</td>
                                      @if ($data->role == 'user')
                                          <td class="bg-primary text-white text-center text-uppercase">{{$data->role}}</td>
                                      @elseif ($data->role == 'manager')
                                          <td class="bg-info text-white text-center text-uppercase">{{$data->role}}</td>
                                     @else
                                          <td class="bg-warning text-white text-center text-uppercase">{{$data->role}}</td>
                                      @endif
                                      {{-- <td class="text-center">
                                          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('user.delete',$item->id)}}" method="POST">
                                              </a>
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-sm btn-danger">
                                                  <i class="mdi mdi-delete"></i>
                                              </button>
                                          </form>
                                      </td> --}}
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>

        {{-- <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">

              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview text-center" id="profile-overview">
                  <h2 class="card-title">Name Code</h2>
                  <p class="">{{$data->namecode}}</p>

                  <h2 class="card-title text-wrap">Nama Legkap</h2>
                  <p class="">{{$data->name}}</p>

                  <h2 class="card-title text-wrap">Jenis Kelamain</h2>
                  <p class="">{{$data->name}}</p>

                  <h2 class="card-title text-wrap">Alamat Asal</h2>
                  <p class="">{{$data->name}}</p>

                  <h2 class="card-title text-wrap">Nomor Telepon</h2>
                  <p class="">{{$data->name}}</p>

                  <h2 class="card-title text-wrap">Role</h2>
                  <p>{{$data->role}}</p>

                </div>
               
              </div>

            </div>
          </div>

        </div> --}}
      </div>
    </section>

</div>
</div>
</div>
</div>
</div>

@endsection