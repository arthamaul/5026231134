@extends('template')

@section('content')
    <h3>Data New Karyawan</h3>
    <br/>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
            @php $no = 1; @endphp
            @foreach($newkaryawan as $k)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $k->NIP }}</td>
                    <td>{{ strtoupper($k->NamaKaryawan) }}</td>
                    <td>{{ $k->Pangkat }}</td>
                    <td>{{ number_format($k->Gaji, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ url('/eas/hapus/'.$k->NIP) }}" class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/eas/tambah') }}" class="btn btn-primary">+ Tambah Data</a>
@endsection
