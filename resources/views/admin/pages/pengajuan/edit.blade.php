@extends('admin.layouts.main')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-pencil"></i>
        </span>Ubah Data Pengajuan
      </h3>
    </div>

<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <form class="row g-3" action="{{route('pengajuan.update', $data->id)}}" method="POST">
          @csrf
          @method('PUT')
        
                  <div class="col-12">
                    <label for="seksi_id" class="form-label">Pemohon</label>
                    <select class="form-select @error('seksi_id') is-invalid @enderror" name="seksi_id" class="form-control">
                        <option selected value="{{$data->seksi_id}}">{{$data->seksi->nama_seksi}}</option>
                        @foreach ($seksi as $item)
                                <option value="{{ $item->seksi_id }}">{{ $item->nama_seksi }}</option>
                        @endforeach
                    </select>
        
                    @error('seksi_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

          <div class="col-12">
            <label for="kategori_id" class="form-label">Jenis Permintaan</label>
            <select class="form-select form-control @error('kategori_id') is-invalid @enderror" name="kategori_id">
                <option value="{{$data->kategori_id}}">{{$data->kategori->nama_jenis}}</option>
                @foreach ($kategori as $item)
                  <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
                @endforeach
             </select>
            
            @error('kategori_id')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="col-12">
            <label for="nama_aplikasi" class="form-label">Nama Aplikasi</label>
            <input type="text" name="nama_aplikasi" class="form-control @error('nama_aplikasi') is-invalid @enderror" value="{{$data->nama_aplikasi}}">
            
            @error('nama_aplikasi')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <label for="penjelasan" class="form-label">Penjelasan</label>
            <textarea name="penjelasan" rows="10" class="form-control">{{$data->penjelasan}}</textarea>
            
            @error('penjelasan')
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