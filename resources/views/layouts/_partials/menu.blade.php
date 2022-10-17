<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white-transparan shadow" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="{{asset('')}}img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link {{ request()->is('/')? 'active' : ''}}" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('produk')? 'active' : ''}}" href="/produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('jaringan')? 'active' : ''}}" href="/jaringan">Jaringan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('tentang-kami')? 'active' : ''}}" href="/tentang-kami" data-id="4">Tentang Kami</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('pengajuan/*')? 'active' : ''}}" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pengajuan
                    </a>
                    <ul class="dropdown-menu dropdown-custom" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item {{ request()->is('pengajuan/polis')? 'active' : ''}}" href="/pengajuan/polis">Prosedur Pengajuan Polis</a>
                        </li>
                        <li><a class="dropdown-item {{ request()->is('pengajuan/klaim')? 'active' : ''}}" href="/pengajuan/klaim">Prosedur Klaim</a></li>
                        <li><a class="dropdown-item {{ request()->is('pengajuan/pengaduan')? 'active' : ''}}" href="/pengajuan/pengaduan">Prosedur Pengajuan
                                Pengaduan</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('pembelian/*')? 'active' : ''}}" href="#" id="navbarDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pembelian
                    </a>
                    <ul class="dropdown-menu dropdown-custom" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item {{ request()->is('pembelian/polis-kendaraan')? 'active' : ''}}" href="/pembelian/polis-kendaraan">Polis Kendaraan</a></li>
                        <li><a class="dropdown-item {{ request()->is('pembelian/polis-kecelakaan-diri')? 'active' : ''}}" href="/pembelian/polis-kecelakaan-diri">Polis Kecelakaan Diri</a></li>
                        <li><a class="dropdown-item {{ request()->is('pembelian/polis-travel')? 'active' : ''}}" href="/pembelian/polis-travel">Polis Travel</a></li>
                        <li><a class="dropdown-item {{ request()->is('pembelian/polis-kebakaran')? 'active' : ''}}" href="/pembelian/polis-kebakaran">Polis Kebakaran</a></li>
                        <li><a class="dropdown-item {{ request()->is('pembelian/status')? 'active' : ''}}" href="/pembelian/status">Status Pembayaran</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-item"><a class="nav-link {{ request()->is('commingsoon')? 'active' : ''}}" href="/commingsoon">Pembelian</a></li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('klaim/*')? 'active' : ''}}" href="#" id="navbarDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Klaim
                    </a>
                    <ul class="dropdown-menu dropdown-custom" aria-labelledby="navbarDropdownMenuLink">
                        {{-- <li><a class="dropdown-item {{ request()->is('klaim/prosedur')? 'active' : ''}}" href="/klaim/prosedur">Prosedur Klaim</a></li> --}}
                        <li><a class="dropdown-item {{ request()->is('klaim/form/polis-kendaraan')? 'active' : ''}}" href="/klaim/form/polis-kendaraan"> Pengajuan Klaim Polis Kendaraan</a></li>
                        <li><a class="dropdown-item {{ request()->is('klaim/form/polis-kebakaran')? 'active' : ''}}" href="/klaim/form/polis-kebakaran"> Pengajuan Klaim Polis Kebakaran</a></li>
                        <li><a class="dropdown-item {{ request()->is('klaim/form/polis-kecelakaan-diri')? 'active' : ''}}" href="/klaim/form/polis-kecelakaan-diri"> Pengajuan Klaim Polis Kecelakaan Diri</a></li>
                        <li><a class="dropdown-item {{ request()->is('klaim/form/polis-travel')? 'active' : ''}}" href="/klaim/form/polis-travel"> Pengajuan Klaim Polis Travel</a></li>

                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link {{ request()->is('berita')? 'active' : ''}}" href="/berita">Berita</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('karir')? 'active' : ''}}" href="/karir">Karir</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('hubungi-kami')? 'active' : ''}}" href="/hubungi-kami">Hubungi Kami</a></li>
            </ul>
        </div>
    </div>
</nav>
