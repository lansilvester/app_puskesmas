<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="">
                <img src="https://2.bp.blogspot.com/-dD4nsBd1i9o/WJ25BAmpquI/AAAAAAAAAn8/aUUZJbRr4Yw8VuRJX2JlvX-u6Y_v5OmmwCLcB/s1600/Logo%2BPuskesmas%2BBaru.png" class="img-fluid" width="50px" alt="">
            </div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
    
        <!-- Heading -->
        <div class="sidebar-heading">
            sidebar
        </div>
    
        <!-- Nav Item - Pages Collapse Menu -->
        @if (Auth::user()->role == 'admin')     
        {{-- User --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengguna"
                aria-expanded="true" aria-controls="pengguna">
                <i class="fas fa-user-cog"></i>
                <span>Pengguna</span>
            </a>
            <div id="pengguna" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('users.create') }}">
                        <i class="fas fa-plus fa-sm"></i> Tambah User
                    </a>
                    
                    <a class="collapse-item" href="{{ route('users.index') }}">
                    <i class="fas fa-eye fa-sm"></i> 
                    Lihat Semua
                    </a>
                </div>
            </div>
        </li>

        {{-- Apotek --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#apotek"
                aria-expanded="true" aria-controls="apotek">
                <i class="fas fa-pills fa-cog"></i>
                <span>Apotek</span>
            </a>
            <div id="apotek" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="{{ route('apotek.create') }}">
                    <i class="fas fa-plus fa-sm"></i> Tambah Obat
                    </a>
                    <a class="collapse-item" href="{{ route('apotek.index') }}">
                    <i class="fas fa-eye fa-sm"></i> 
                    Lihat Semua
                    </a>
                </div>
            </div>
        </li>

        {{-- Poliklinik --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#poliklinik"
                aria-expanded="true" aria-controls="poliklinik">
                <i class="fas fa-hospital fa-cog"></i>
                <span>Poliklinik</span>
            </a>
            <div id="poliklinik" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('poliklinik.create') }}">
                        <i class="fas fa-plus fa-sm"></i> Tambah Poliklinik
                    </a> 
                    <a class="collapse-item" href="{{ route('poliklinik.index') }}">
                    <i class="fas fa-eye fa-sm"></i> 
                    Lihat Semua
                    </a>
                </div>
            </div>
        </li>

        {{-- Dokter --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dokter"
                aria-expanded="true" aria-controls="dokter">
                <i class="fas fa-user-alt fa-cog"></i>
                <span>Dokter</span>
            </a>
            <div id="dokter" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded"> 
                    <a class="collapse-item" href="{{ route('dokter.index') }}">
                    <i class="fas fa-eye fa-sm"></i> 
                    Lihat Semua
                    </a>
                </div>
            </div>
        </li>
        {{-- Pasien --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pasien"
                aria-expanded="true" aria-controls="pasien">
                <i class="fas fa-user-alt fa-cog"></i>
                <span>Pasien</span>
            </a>
            <div id="pasien" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if(Auth::user()->role == 'admin' ||Auth::user()->role == 'pegawai')
                    <a class="collapse-item" href="{{ route('pasien.create') }}">
                        <i class="fas fa-plus fa-sm"></i> Tambah Pasien
                    </a> 
                    @endif
                    <a class="collapse-item" href="{{ route('pasien.index') }}">
                    <i class="fas fa-eye fa-sm"></i> 
                    Lihat Semua
                    </a>
                </div>
            </div>
        </li>
        @endif
        @if(Auth::user()->role == 'pegawai')
        {{-- Poliklinik --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#poliklinik"
                aria-expanded="true" aria-controls="poliklinik">
                <i class="fas fa-hospital fa-cog"></i>
                <span>Poliklinik</span>
            </a>
            <div id="poliklinik" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('poliklinik.create') }}">
                        <i class="fas fa-plus fa-sm"></i> Tambah Poliklinik
                    </a> 
                    <a class="collapse-item" href="{{ route('poliklinik.index') }}">
                    <i class="fas fa-eye fa-sm"></i> 
                    Lihat Semua
                    </a>
                </div>
            </div>
        </li>
        
        {{-- Pasien --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pasien"
                aria-expanded="true" aria-controls="pasien">
                <i class="fas fa-user-alt fa-cog"></i>
                <span>Pasien</span>
            </a>
            <div id="pasien" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('pasien.create') }}">
                        <i class="fas fa-plus fa-sm"></i> Tambah Pasien
                    </a> 
                    <a class="collapse-item" href="{{ route('pasien.index') }}">
                    <i class="fas fa-eye fa-sm"></i> 
                    Lihat Semua
                    </a>
                </div>
            </div>
        </li>
        @endif

        @if(Auth::user()->role == 'dokter')
        {{-- Pasien --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pasien"
                aria-expanded="true" aria-controls="pasien">
                <i class="fas fa-user-alt fa-cog"></i>
                <span>Pasien</span>
            </a>
            <div id="pasien" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('pasien.index') }}">
                    <i class="fas fa-eye fa-sm"></i> 
                    Lihat Semua
                    </a>
                </div>
            </div>
        </li>
        @endif
        @if(Auth::user()->role == 'apoteker')

        {{-- Apotek --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#apotek"
                aria-expanded="true" aria-controls="apotek">
                <i class="fas fa-pills fa-cog"></i>
                <span>Apotek</span>
            </a>
            <div id="apotek" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="{{ route('apotek.create') }}">
                    <i class="fas fa-plus fa-sm"></i> Tambah Obat
                    </a>
                    <a class="collapse-item" href="{{ route('apotek.index') }}">
                    <i class="fas fa-eye fa-sm"></i> 
                    Lihat Semua
                    </a>
                </div>
            </div>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rekam_medis"
                aria-expanded="true" aria-controls="rekam_medis">
                <i class="fas fa-book"></i>
                <span>Rekam Medis</span>
            </a>
            <div id="rekam_medis" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dokter')
                    <a class="collapse-item" href="{{ route('rekam_medis.create') }}">
                        <i class="fas fa-plus fa-sm"></i> Tambah Rekam Medis
                    </a> 
                    @endif
                    <a class="collapse-item" href="{{ route('rekam_medis.index') }}">
                    <i class="fas fa-eye fa-sm"></i> 
                    Lihat Semua
                    </a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
</ul>           