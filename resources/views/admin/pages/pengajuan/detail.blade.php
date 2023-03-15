@extends('admin.layouts.main')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-clipboard"></i>
        </span> Detail Pengajuan
      </h3>
    </div>

    <div class="container">

    <section class="section profile">
      <div class="row">

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              
              <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview"><h4><strong>Detail Pengajuan</strong></h4></button>
                  </li>
                  
                  {{-- <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#proses-pengerjaan"><h4><strong>Proses Pengerjaan</strong></h4></button>
                </li>    --}}
                    
              </ul>
              <div class="tab-content pt-2">

                {{-- Detail Pengajuan --}}
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <div class="card p-4">
                        <div class="d-flex">
                          <h2 class="card-title">Tanggal Pengajuan :</h2>
                          <p class="">&nbsp;{{$data->tanggal_pengajuan}}</p>
                        </div>

                        <div class="d-flex">
                          <h2 class="card-title">Nama Aplikasi :</h2>
                          <p class="">&nbsp;{{$data->nama_aplikasi}}</p>
                        </div>

                        <div class="d-flex">
                          <h2 class="card-title">Jenis Permintaan :</h2>
                          <p>&nbsp;{{$data->kategori->nama_jenis}}</p>
                        </div>

                        <div class="d-flex">
                          <h2 class="card-title">Penjelasan Pengajuan :</h2>
                          <p class="text-justify">&nbsp;{!!$data->penjelasan!!}</p>
                        </div>

                        <div class="d-flex">
                          <h2 class="card-title">Pemohon :</h2>
                          <p>&nbsp;{{$data->seksi->nama_seksi}}</p>
                        </div>
                        
                        <div class="d-flex"> 
                          <h2 class="card-title align-self-center">Blue Print Aplikasi : &nbsp;</h2>
                          <a href="{{asset('storage/gambar/'.$data->gambar)}}" alt="gambar / blueprint" class="btn btn-sm btn-info" style="height:30px;">
                            Lihat Data
                          </a>
                        </div>

                    </div>
                </div>
              
                
              @if ($data->keterangan == 'proses')
                <div class="d-flex justify-content-between mt-4">
                  <h4 class="ps-4 text-uppercase align-self-center fw-bold">Proses Pengerjaan oleh TIM <span class="text-primary">Developer</span></h4>
                  @if (Auth::user()->role == 'sit')
                  <button type="button" class="btn btn-primary text-uppercase" data-bs-toggle="modal" data-bs-target="#modal-add"><i class="mdi mdi-plus"></i>Tambah Timeline</button>
                  @endif                  
                </div>
              @elseif($data->keterangan == 'selesai')
              <div class="d-flex justify-content-between mt-4">
                <h4 class="ps-4 text-uppercase align-self-center fw-bold">Proses Pengerjaan oleh TIM <span class="text-primary">Developer</span></h4>
              </div>
              @endif
                
              @if (!$dataTimeline->isEmpty())
               <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="fw-bold"> Proses </th>
                            <th class="fw-bold"> Perkiraan Selesai </th>
                            <th class="fw-bold"> Status </th>
                            <th class="fw-bold"> Tanggal Selesai </th>
                            @if (Auth::user()->role == 'sit')
                              <th class="fw-bold"> Aksi </th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dataTimeline as $item)
                          <tr>
                              <td> {{$item->nama_proses}} </td>
                              <td> {{$item->target_selesai}} </td>
                              <td>
                                @if ($item->status == 'pending')
                                  <label class="badge badge-gradient-warning">{{$item->status}}</label>
                                @elseif ($item->status == 'proses')
                                  <label class="badge badge-gradient-info">{{$item->status}}</label>
                                @else
                                  <label class="badge badge-gradient-success">{{$item->status}}</label>
                                @endif
                              </td>
                              <td> {{$item->tanggal_selesai}} </td>
                              @if (Auth::user()->role == 'sit')
                                <td>
                                  <form action="{{route('timeline.delete', $item->id)}}" method="post">
                                    @if ($item->status == 'pending')
                                    <a href="{{route('timeline.proses', $item->id)}}" class="btn btn-sm btn-warning"><i class="mdi mdi-check"></i></a>
                                    @elseif ($item->status == 'proses')
                                      <a href="{{route('timeline.selesai', $item->id)}}" class="btn btn-sm btn-success"><i class="mdi mdi-check"></i></a>
                                    @endif

                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin menghapus')"><i class="mdi mdi-delete"></i></button>
                                  </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                @endif

                @if (!$dataTimeline->isEmpty())
                  @if ($data->keterangan == 'proses')
                  <div class="mt-4 d-flex justify-content-end ms-4">
                    <a href="{{route('pengajuan.success', $data->id)}}" class="btn btn-success"><i class="mdi mdi-check"></i>Aplikasi Selesai</a>
                  </div>
                  @endif
                @endif

              {{-- Modal Tambah Timeline --}}
              <div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xs">
                <form name="frm_add" id="frm_add" action="{{route('timeline.create', $data->id)}}" class="form-horizontal" method="POST">
                @csrf
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <div class="modal-body">

                      <div><input type="text" name="pengajuan_id" placeholder="pengajuan id" class="form-control" value="{{$data->id}}" hidden></div>
  
                      <div class="form-group"><label class="ps-1">Nama Proses</label>
                      <div><input type="text" name="nama_proses" placeholder="nama proses" class="form-control"></div>

                      <div class="form-group"><label class="mt-2 ps-1">Target Selesai</label>
                      <div><input type="date" name="target_selesai" class="form-control"></div>

                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </form>
                </div>
                </div>
                  
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

</div>
</div>
</div>
</div>
</div>

@endsection