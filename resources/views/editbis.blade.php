<!DOCTYPE html>
<html>
<head>
    <title>Edit Data BIS</title>
    {{-- Jika Anda punya CSS Bootstrap di template, mungkin perlu link di sini juga --}}
    {{-- <link rel="stylesheet" href="path/to/bootstrap.min.css"> --}}
</head>
<body>

    <h2>Edit Data Kartu Grafis (BIS)</h2>

    <a href="/bis"> Kembali</a>

    <br/>
    <br/>

    @foreach($bis as $item) {{-- Menggunakan $item karena Anda mengirim koleksi dari Controller --}}
    <form action="/bis/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="ID" value="{{ $item->ID }}"> <br/> {{-- Pastikan nama "ID" sesuai dengan kolom DB --}}
        Merk BIS <input type="text" required="required" name="merkBIS" value="{{ $item->merkBIS }}"> <br/>
        Harga <input type="number" required="required" name="hargaBIS" value="{{ $item->hargaBIS }}"> <br/>
        Tersedia <select required="required" name="tersedia">
            <option value="1" {{ $item->tersedia == 1 ? 'selected' : '' }}>Ya</option>
            <option value="0" {{ $item->tersedia == 0 ? 'selected' : '' }}>Tidak</option>
        </select> <br/>
        Berat (kg) <input type="text" required="required" name="berat" value="{{ $item->berat }}"> <br/>
        <input type="submit" value="Simpan Data">
    </form>
    @endforeach

</body>
</html>
