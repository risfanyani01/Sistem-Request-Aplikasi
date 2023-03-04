@extends('admin.layouts.main')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">

      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-plus"></i>
        </span>Tambah Akun
      </h3>

    </div>

<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <form class="row g-3" action="{{route('user.store')}}" method="POST">
          @csrf
          <div class="col-12">
            <label for="namecode" class="form-label">Name Code</label>
            <input type="text" name="namecode" class="form-control @error('namecode') is-invalid @enderror" placeholder="Name Code">
            
            @error('namecode')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
          </div>

          <div class="col-12">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap">
            
            @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
          </div>

          <div class="col-12">
            <label for="alamat_asal" class="form-label">Alamat Asal</label>
            <input type="text" name="alamat_asal" class="form-control @error('alamat_asal') is-invalid @enderror" placeholder="Alamat Asal">
            
            @error('alamat_asal')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
          </div>

          <div class="col-12">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>

            @php
                $jenisKelamin = ['Laki-laki', 'Perempuan'];
            @endphp

            <select name="jenis_kelamin" class="form-select form-control">
              @foreach ($jenisKelamin as $jk)
                <option value="{{$jk}}">{{$jk}}</option>    
              @endforeach
            </select>

            @error('jenis_kelamin')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
          </div>

          <div class="col-12">
            <label for="telp" class="form-label">Nomor Telepon</label>
            <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror" placeholder="Nomor Telepon">
            
            @error('telp')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
          </div>

          <div class="col-12">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            
            @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
          </div>

          <div class="col-12">
            <label for="role" class="form-label">Role</label>
            @php
                $role = ['user', 'manager', 'sit'];
            @endphp
            <select class="form-select form-control" name="role">
                <option disabled selected>Pilih Role</option>
                  @foreach ($role as $r)
                  <option value="{{ $r }}">{{ $r }}</option>
                @endforeach
             </select>
            
            @error('role')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          
          
          <div class="text-left">
            <button type="submit" class="btn btn-md btn-primary">Submit</button>
            <a href="{{route('seksi.index')}}" class="btn btn-md btn-secondary">Cancel</a>
          </div>
        </form>

      </div>
    </div>

  </div>
  </div>
  </div>
  </div>
@endsection