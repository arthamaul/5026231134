@extends('template')

@section('content')
    <h3>Tambah Item ke Keranjang Belanja</h3>

    <a href="/keranjangbelanja" class="btn btn-secondary"> Kembali</a>

    <br/>
    <br/>

    <form action="/keranjangbelanja/store" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="KodeBarang" class="col-sm-3 col-form-label">Kode Barang</label>
            <div class="col-sm-9">
                <input type="number" name="KodeBarang" class="form-control @error('KodeBarang') is-invalid @enderror" required="required" value="{{ old('KodeBarang') }}">
                @error('KodeBarang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="Jumlah" class="col-sm-3 col-form-label">Jumlah</label>
            <div class="col-sm-9">
                <input type="number" name="Jumlah" class="form-control @error('Jumlah') is-invalid @enderror" required="required" value="{{ old('Jumlah') }}">
                @error('Jumlah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="Harga" class="col-sm-3 col-form-label">Harga per Item</label>
            <div class="col-sm-9">
                <input type="number" name="Harga" class="form-control @error('Harga') is-invalid @enderror" required="required" value="{{ old('Harga') }}">
                @error('Harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-9 offset-sm-3">
                <input type="submit" class="btn btn-primary" value="TAMBAHKAN">
            </div>
        </div>
    </form>
@endsection
