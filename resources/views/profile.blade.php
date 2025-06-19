<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Aset BPKPD</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }


        header {
            background-color: rgb(0, 55, 128);
            /* Warna header */
            color: white;
        }

        .calendar {
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            margin-bottom: 20px;
            /* Tambahkan margin bawah untuk spasi */
        }

        .calendar h3 {
            text-align: center;
            color: rgb(0, 30, 128);
            /* Warna heading kalender  */
        }

        .ad-banner {
            text-align: center;
            margin: 20px 0;
        }

        footer {
            background-color: #333;
            color: white;
        }
    </style>
</head>

<body>

    <header class="text-center py-4">
        <img src="{{ asset('/image/header.png') }}" alt="Header Image" class="img-fluid">
        {{-- <h1>Sistem Informasi Koperasi Syariah (SIKOPSYAH) Bhakti Husada</h1> --}}
        <div class="mt-3">
            <a href="{{ route('welcome') }}" class="btn btn-light mx-2">Home</a>
            <a href="{{ route('profile') }}" class="btn btn-light mx-2">Profile</a>
            <a href="{{ route('login') }}" class="btn btn-light mx-2">Login</a>
            <a href="{{ route('anggotas.anggotas.createajukan') }}" class="btn btn-light mx-2">Pendaftaran</a>
        </div>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2>Profil KSPPS Bhakti Husada</h2>
                @foreach ($profilesObjects as $profiles)
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-title">Nama: {{ $profiles->nama }}</p>
                            <p class="card-title">Jenis: {{ $profiles->jenis }}</p>
                            <p class="card-title">Tanggal Berdiri: {{ $profiles->tanggal_berdiri }}</p>
                            <p class="card-title">Status: {{ $profiles->status }}</p>
                            <p class="card-title">Jumlah Anggota: {{ $profiles->jumlah_anggota }}</p>
                            <p class="card-title">Nama Ketua: {{ $profiles->nama_ketua }}</p>
                            <p class="card-title">Npwp: {{ $profiles->npwp }}</p>
                            <p class="card-title">{{ $profiles->deskripsi }}</p>
                        </div>
                    </div>
                @endforeach
                <h2>Profil Pengurus KSPPS Bhakti Husada</h2>
                <div class="card mb-3">
                    @foreach ($penguruses as $pengurus)
                        <div class="card-body">
                            <dd>
                                <div class="thumbnail">
                                    <a href="{{ asset('fotopengurus/' . $pengurus->foto) }}" data-toggle="lightbox"
                                        class="col-sm-2">
                                        <img src="{{ asset('fotopengurus/' . $pengurus->foto) }}" width="14%"
                                            height="14%" class="img-fluid img-thumbnail">
                                    </a>
                                </div>
                            </dd>
                            <p class="card-title">Nama: {{ $pengurus->nama }}</p>
                            <p class="card-title">Jabatan: @if ($pengurus->jabatan == 1)
                                    Ketua
                                @else
                                    @if ($pengurus->jabatan == 2)
                                        Sekretaris
                                    @else
                                        @if ($pengurus->jabatan == 3)
                                            Bendahara
                                        @else
                                            Anggota
                                        @endif
                                    @endif
                                @endif
                            </p>
                            {{-- <table class="table" id=example3>
                            <tr>
                                <td>
                                    <dd>
                                    <div class="thumbnail">
                                        <a href="{{ asset('fotopengurus/' . $pengurus->foto) }}" data-toggle="lightbox">
                                            <img src="{{ asset('fotopengurus/' . $pengurus->foto) }}" width="14%" height="14%"
                                                class="img-fluid img-thumbnail">
                                        </a>
                                    </div>
                                    </dd>
                                </td>
                                <td class="col-sm-8">
                                    <p class="card-title">Nama: {{ $pengurus->nama }}</p>
                                    <p class="card-title">Jabatan: {{ $pengurus->jabatan }}</p>
                                </td>
                    </table> --}}
                        </div>
                    @endforeach
                </div>
                <h2>Profil Pengawas KSPPS Bhakti Husada</h2>
                <div class="card mb-3">
                    @foreach ($pengawases as $pengawas)
                        <div class="card-body">
                            <dd>
                                <div class="thumbnail">
                                    <a href="{{ asset('fotopengurus/' . $pengawas->foto) }}" data-toggle="lightbox"
                                        class="col-sm-2">
                                        <img src="{{ asset('fotopengurus/' . $pengawas->foto) }}" width="14%"
                                            height="14%" class="img-fluid img-thumbnail">
                                    </a>
                                </div>
                            </dd>
                            <p class="card-title">Nama: {{ $pengawas->nama }}</p>
                            <p class="card-title">Jabatan: @if ($pengawas->jabatan == 1)
                                    Ketua
                                @else
                                    @if ($pengawas->jabatan == 2)
                                        Sekretaris
                                    @else
                                        @if ($pengawas->jabatan == 3)
                                            Bendahara
                                        @else
                                            Anggota
                                        @endif
                                    @endif
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- <div class="col-md-4"> --}}
            <!-- Sidebar with Calendar Widget -->
            {{-- <div class="calendar">
                    <h3>Kalender</h3>
                    <iframe src="https://calendar.google.com/calendar/embed?src=en.indonesian%23holiday%40group.v.calendar.google.com&ctz=Asia%2FJakarta"
                            width="100%" height="300" frameborder="0" scrolling="no"></iframe>
                </div> --}}


            {{-- <div class="ad-banner">
                    <img src="https://via.placeholder.com/300x150.png?text=Iklan" alt="Ad Banner" class="img-fluid">
                </div> --}}
            {{-- </div> --}}
        </div>
    </div>


    <footer class="text-center py-3">
        <p>&copy; 2024 KSPPS Bhakti Husada</p>
        <p>Alamat: Jl. Jend. Sudirman No. 1 Payakumbuh Sumatera Barat, Indonesia</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
