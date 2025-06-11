@extends('template')

@section('content')
    <h3>Data (BIS)</h3>

    {{-- Tombol Tambah BIS Baru (sekarang tidak dalam komentar) --}}
    <a href="/bis/tambah" class="btn btn-primary"> + Tambah Data BIS Baru</a>

    <p>Cari Data BIS :</p>
    <form action="/bis/cari" method="GET">
        <input type="text" class="form-control" name="cari" placeholder="Cari BIS berdasarkan merk atau ID..">
        <br/>
        <input type="submit" class="btn btn-info" value="CARI">
    </form>

    <br/>

    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Merk BIS</th>
            <th>Harga</th>
            <th>Tersedia</th>
            <th>Berat (kg)</th>
            <th>Opsi</th>
        </tr>
        @foreach($bis as $item)
        <tr>
            <td>{{ $item->ID }}</td>
            <td>{{ $item->merkBIS }}</td>
            <td>Rp {{ number_format($item->hargaBIS, 0, ',', '.') }}</td>
            <td>{{ $item->tersedia ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $item->berat }}</td>
            <td>
                {{-- Tombol edit/hapus (sekarang tidak dalam komentar) --}}
                <a href="/bis/edit/{{ $item->ID }}" class="btn btn-success">Edit</a>
                |
                <a href="/bis/hapus/{{ $item->ID }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
    <br/>
    {{-- Link pagination (sekarang tidak dalam komentar) --}}
    {{ $bis->links() }}
@endsection
