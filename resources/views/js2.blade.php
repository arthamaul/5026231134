<html>
<head>
<title>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function formvalidation()
    {
        var nrp = document.getElementById("nrp").value ;
        var nama = document.getElementById("nama").value ;
        if (nrp.length == 0)
            {
                Swal.fire({
                    title: "Pesan kesalahan",
                    text: "NRP harus diisi",
                    icon: "error"
                    });
                document.getElementById("nrp").focus();
                return false ;
            }
        if (nama.length == 0)
            {
                Swal.fire({
                    title: "Pesan kesalahan",
                    text: "Nama harus diisi",
                    icon: "error"
                    });
                document.getElementById("nama").focus();
                return false ;
            }
        if (/[0-9]/.test(nama))
            {
                Swal.fire({
                    title: "Pesan kesalahan",
                    text: "Nama tidak boleh mengandung angka",
                    icon: "error"
                    });
                document.getElementById("nama").focus();
                return false;
            }
    }
</script>
</head>
<body>
<div class="container">
<h3>Form Pendaftaran ISE</h3>
<form id="frmpendaftaran" action="https://google.co.id" method="get" onsubmit="return formvalidation();">
NRP : <input type="text" id="nrp" class="form-control" placeholder="Silahkan isi 10 digit NRP, Hanya angka, Tidak boleh kosong" name="nrp">
<br>
Nama : <input type="text" id="nama" class="form-control" placeholder="Silahkan isi Nama, Minimal 1 digit, Tidak boleh kosong" name="nama">
<br>
<input type="submit" class="btn btn-primary" value="Daftar">
</form>
</div>
</body>
</html>
