@extends('template')

@section('content')
    <h3>Tambah Data Karyawan Baru</h3>

    <a href="/karyawan" class="btn btn-secondary"> Kembali</a>

    <br/>
    <br/>

    <form action="/karyawan/store" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="kodepegawai" class="col-sm-2 col-form-label">Kode Pegawai</label>
            <div class="col-sm-10">
                <input type="text" name="kodepegawai" class="form-control @error('kodepegawai') is-invalid @enderror" required="required" maxlength="5" value="{{ old('kodepegawai') }}">
                @error('kodepegawai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" name="namalengkap" class="form-control @error('namalengkap') is-invalid @enderror" required="required" maxlength="50" value="{{ old('namalengkap') }}">
                @error('namalengkap')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
            <div class="col-sm-10">
                <input type="text" name="divisi" class="form-control @error('divisi') is-invalid @enderror" required="required" maxlength="5" value="{{ old('divisi') }}">
                @error('divisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="departemen" class="col-sm-2 col-form-label">Departemen</label>
            <div class="col-sm-10">
                <input type="text" name="departemen" class="form-control @error('departemen') is-invalid @enderror" required="required" maxlength="10" value="{{ old('departemen') }}"> @error('departemen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <input type="submit" class="btn btn-success" value="SIMPAN">
            </div>
        </div>
    </form>
@endsection
