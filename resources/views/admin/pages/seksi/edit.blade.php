@extends('admin.layouts.main')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">

      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-pencil"></i>
        </span>Ubah Seksi
      </h3>

    </div>

<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <form class="row g-3" action="{{route('seksi.update', $data->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="col-12">
            <label for="nama_seksi" class="form-label">Nama Seksi</label>
            <input type="text" name="nama_seksi" class="form-control @error('nama_seksi') is-invalid @enderror" value="{{$data->nama_seksi}}">
          </div>
          
          @error('nama_seksi')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          
          <div class="text-left">
            <button type="submit" class="btn btn-md btn-primary">Submit</button>
            <a href="{{route('seksi.index')}}" type="reset" class="btn btn-md btn-secondary">Cancel</a>
          </div>
        </form>

      </div>
    </div>

  </div>
  </div>
  </div>
  </div>
@endsection