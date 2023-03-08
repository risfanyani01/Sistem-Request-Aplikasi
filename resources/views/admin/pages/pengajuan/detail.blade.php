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

                
                {{-- Proses Pengerjaan
                <div class="tab-pane fade show active profile-overview" id="proses-pengerjaan">
                  
                  @if($data->keterangan == 'proses' || $data->keterangan == 'selesai')
                  <div class="ps-4">
                    <hr>
                    <h4 class="text-center text-uppercase">Proses Pengerjaan oleh TIM <span class="text-primary font-weigh-bold">Developer</span></h4>
                    <hr>
                  </div>
                  
                 <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th> <strong> Aktivitas </strong></th>
                              <th> <strong> Status </strong></th>
                              <th> <strong> Tanggal Selesai </strong></th>
                              <th> <strong> Aksi </strong></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td> Fund is not recieved </td>
                              <td>
                                <label class="badge badge-gradient-success">DONE</label>
                              </td>
                              <td> Dec 5, 2017 </td>
                              <td>Selesai</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                @else
                <div>
                  <h4></h4>
                </div>
              </div>
              @endif --}}
               
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