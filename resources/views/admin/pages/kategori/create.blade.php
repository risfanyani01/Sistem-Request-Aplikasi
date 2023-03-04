@extends('admin.layouts.main')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">

      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-plus"></i>
        </span>Tambah Jenis Permintaan
      </h3>

    </div>

<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <form class="row g-3" action="{{route('kategori.store')}}" method="POST">
          @csrf
          <div class="col-12">
            <label for="nama_jenis" class="form-label">Jenis Permintaan</label>
            <input type="text" name="nama_jenis" class="form-control @error('nama_jenis') is-invalid @enderror" placeholder="Jenis Permintaan">
            
            @error('nama_jenis')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
          </div>
          
          
          <div class="text-left">
            <button type="submit" class="btn btn-md btn-primary">Submit</button>
            <a href="{{route('kategori.index')}}" class="btn btn-md btn-secondary">Cancel</a>
          </div>
        </form>

      </div>
    </div>

  </div>
  </div>
  </div>
  </div>
@endsection