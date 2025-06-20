@extends('template')

@section('content')
    <h3>Form Tambah Data Karyawan</h3>
    <br/>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada kesalahan dalam input data:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/eas/store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="NIP">NIP</label>
            <input type="text" class="form-control" id="NIP" name="NIP" value="{{ old('NIP') }}" placeholder="Masukkan NIP (5 digit)">
        </div>

        <div class="form-group">
            <label for="NamaKaryawan">Nama Karyawan</label>
            <input type="text" class="form-control" id="NamaKaryawan" name="NamaKaryawan" value="{{ old('NamaKaryawan') }}" placeholder="Masukkan Nama">
        </div>

        <div class="form-group">
            <label for="Pangkat">Pangkat</label>
            <input type="text" class="form-control" id="Pangkat" name="Pangkat" value="{{ old('Pangkat') }}" placeholder="Masukkan Pangkat">
        </div>

        <div class="form-group">
            <label for="Gaji">Gaji</label>
            <input type="number" class="form-control" id="Gaji" name="Gaji" value="{{ old('Gaji') }}" placeholder="Contoh: 25000000">
        </div>


        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ url('/eas') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
