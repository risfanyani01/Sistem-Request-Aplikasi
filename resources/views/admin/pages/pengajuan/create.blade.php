@extends('admin.layouts.main')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-plus"></i>
        </span> Tambah Data Pengajuan
      </h3>
    </div>

<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <form class="row g-3" action="{{route('pengajuan.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="col-12">
            <label for="departemen_id" class="form-label"><strong>Departemen</strong></label>
            <select class="form-select form-control @error('departemen_id') is-invalid @enderror" name="departemen_id">
              <option disabled selected>Departemen</option>
              @foreach ($departemen as $item)
              <option value="{{ $item->id }}">{{ $item->nama_departemen }}</option>
              @endforeach
            </select>
            
            @error('departemen_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="col-12">
            <label for="seksi_id" class="form-label"><strong>Seksi</strong></label>
            <select class="form-select form-control @error('seksi_id') is-invalid @enderror" name="seksi_id">
                <option disabled selected>Seksi</option>
                @foreach ($seksi as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_seksi }}</option>
                @endforeach
            </select>

            @error('seksi_id')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="col-12">
            <label for="kategori_id" class="form-label"><strong>Jenis Permintaan</strong></label>
            <select class="form-select form-control" name="kategori_id">
                <option disabled selected>Pilih Jenis Permintaan</option>
                  @foreach ($kategori as $item)
                  <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
                @endforeach
             </select>
            
            @error('kategori_id')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="col-12">
            <label for="nama_aplikasi" class="form-label"><strong>Nama Aplikasi</strong></label>
            <input type="text" name="nama_aplikasi" placeholder="Nama aplikasi yang diajukan" class="form-control @error('nama_aplikasi') is-invalid @enderror">
            
            @error('nama_aplikasi')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <label for="penjelasan" class="form-label"><strong>Penjelasan</strong></label>
            <textarea name="penjelasan" rows="10" class="form-control"></textarea>
            
            @error('penjelasan')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <label for="gambar" class="form-label"><strong>Blueprint</strong></label>
            <input type="file" class="form-control" name="gambar" accept=".pdf">
            
            @error('gambar')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="text-left">
            <button type="submit" class="btn btn-md btn-primary">Submit</button>
            <a href="{{route('pengajuan.index')}}" class="btn btn-md btn-secondary">Cancel</a>
          </div>
        </form>

      </div>
    </div>

  </div>
  </div>
  </div>
  </div>

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'penjelasan' );
</script>
@endsection