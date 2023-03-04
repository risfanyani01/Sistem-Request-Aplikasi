<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav mt pt-4">
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard')}}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    @if (Auth::user()->role == 'user')
    
    <li class="nav-item">
      <a class="nav-link" href="{{route('kategori.index')}}">
        <span class="menu-title">Jenis Permintaan</span>
        <i class="mdi mdi-bookmark menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('pengajuan.index')}}">
        <span class="menu-title">Pengajuan</span>
        <i class="mdi mdi-clipboard menu-icon"></i>
      </a>
    </li>
    @elseif(Auth::user()->role == 'sit')
    <li class="nav-item">
      <a class="nav-link" href="{{route('seksi.index')}}">
        <span class="menu-title">Seksi</span>
        <i class="mdi mdi-clipboard-account menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('departemen.index')}}">
        <span class="menu-title">Departemen</span>
        <i class="mdi mdi-account-group-outline menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('pengajuan.diterima')}}">
        <span class="menu-title">Pengajuan Masuk</span>
        <i class="mdi mdi-clipboard menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('user.index')}}">
        <span class="menu-title">Akun</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>

    @else
    <li class="nav-item">
      <a class="nav-link" href="{{route('pengajuan.index')}}">
        <span class="menu-title">Pengajuan Masuk</span>
        <i class="mdi mdi-clipboard menu-icon"></i>
      </a>
    </li>
    @endif
  </ul>
</nav>