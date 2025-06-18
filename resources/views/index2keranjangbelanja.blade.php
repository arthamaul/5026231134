@extends('template')

@section('content')
    <h3>Data Keranjang Belanja</h3>

    <br/>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Kode Pembelian</th>
                <th>Kode Barang</th>
                <th>Jumlah Pembelian</th>
                <th>Harga per item</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keranjangbelanja as $item)
            <tr>
                <td>{{ $item->ID }}</td>
                <td>{{ $item->KodeBarang }}</td>
                <td>{{ $item->Jumlah }}</td>
                <td>Rp {{ number_format($item->Harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->Jumlah * $item->Harga, 0, ',', '.') }}</td>
                <td>
                    <a href="/keranjangbelanja/hapus/{{ $item->ID }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin membatalkan item ini?')">Batal</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/keranjangbelanja/tambah" class="btn btn-primary"> + Beli</a>

@endsection
