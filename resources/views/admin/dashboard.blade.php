@extends('admin.layouts.main')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>

    <div class="container mb-4 rounded px-4">
      <div class="row bg-white py-5 text-center d-flex justify-content-center">
        <img class="mb-4" src="{{asset('assets/images/logo.png')}}" alt="logo" style="width:340px">
        <h5>Selamat Datang Di Sistem Pengajuan Pembangunan / Pengembangan Aplikasi</h5>
        <h2 class="font-weight-bold" style="color:#008fd3">PT INDONESIA ASAHAN ALUMUNIUM (Persero)</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-primary card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Data Pengajuan
            </h4>
            <h2 class="mb-5">{{$dataPengajuan}}</h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-dark card-img-holder text-white">
            <div class="card-body">
              <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Pengajuan Pending
              </h4>
              <h2 class="mb-5">{{$pengajuanPending}}</h2>
            </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-warning card-img-holder text-white">
            <div class="card-body">
              <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Pengajuan Diproses
              </h4>
              <h2 class="mb-5">{{$pengajuanDiproses}}</h2>
            </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
              <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Pengajuan Diterima
              </h4>
              <h2 class="mb-5">{{($pengajuanDiterima)}}</h2>
            </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
              <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Pengajuan Selesai
              </h4>
              <h2 class="mb-5">{{($pengajuanSelesai)}}</h2>
            </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Pengajuan Ditolak
            </h4>
            <h2 class="mb-5">{{($pengajuanDitolak)}}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection