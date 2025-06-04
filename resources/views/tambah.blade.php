@extends('template')

@section('content')
	<h3>Data Pegawai</h3>

	<a href="/pegawai" class="btn btn-info"> Kembali</a>

	<br/>
	<br/>

	<form action="/pegawai/store" method="post">
		{{ csrf_field() }}
        <div class="row">
            <div class="col-3">
                Nama
            </div>
            <div class="col-8">
                <input type="text" required="required" name="nama" class="form-control">
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-3">
                Jabatan
            </div>
            <div class="col-8">
                <input type="text" required="required" name="jabatan" class="form-control">
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-3">
                Umur
            </div>
            <div class="col-8">
                <input type="number" required="required" name="umur" class="form-control">
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-3">
                Alamat
            </div>
            <div class="col-8">
                <textarea required="required" name="alamat" class="form-control"></textarea>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-3"></div>
            <div class="col-8">
                <input type="submit" value="Simpan Data" class="btn btn-success">
            </div>
        </div>

	</form>

@endsection
