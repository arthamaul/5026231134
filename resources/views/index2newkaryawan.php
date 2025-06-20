@extends('template') {{-- Sesuaikan dengan nama template Anda --}}

@section('content')
    <h3>Data New Karyawan</h3>

    <br/>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Pangkat</th>
                <th>Gaji</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp {{-- Inisialisasi nomor urut --}}
            @foreach($newkaryawan as $k)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $k->NIP }}</td>
                <td>{{ strtoupper($k->NamaKaryawan) }}</td> {{-- Nama Karyawan huruf kapital semua --}}
                <td>{{ $k->Pangkat }}</td>
                <td>{{ strtolower($k->Gaji) }}</td> {{-- Gaji huruf kecil semua (hati-hati jika ini hanya angka) --}}
                <td>
                    {{-- Tombol "Hapus Data" di setiap record --}}
                    <a href="/newkaryawan/hapus/{{ $k->NIP }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus Data</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Tombol "Tambah Data" yang terletak di bawah tabel --}}
    <a href="/newkaryawan/tambah" class="btn btn-primary"> + Tambah Data</a>

@endsection
