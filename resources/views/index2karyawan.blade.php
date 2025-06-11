@extends('template') {{-- Sesuaikan dengan nama template Anda --}}

@section('content')
    <h3>Data Karyawan</h3>

    <br/>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pegawai</th>
                <th>Nama Lengkap</th>
                <th>Divisi</th>
                <th>Departemen</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp {{-- Inisialisasi nomor urut --}}
            @foreach($karyawan as $k)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $k->kodepegawai }}</td>
                <td>{{ strtoupper($k->namalengkap) }}</td> {{-- Nama Lengkap huruf kapital semua --}}
                <td>{{ $k->divisi }}</td>
                <td>{{ strtolower($k->departemen) }}</td> {{-- Departemen huruf kecil semua (hati-hati jika ini hanya angka) --}}
                <td>
                    {{-- Tombol "Hapus Data" di setiap record --}}
                    <a href="/karyawan/hapus/{{ $k->kodepegawai }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus Data</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Tombol "Tambah Data" yang terletak di bawah tabel --}}
    <a href="/karyawan/tambah" class="btn btn-primary"> + Tambah Data</a>

@endsection
