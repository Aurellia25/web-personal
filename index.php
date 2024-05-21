<?php
include 'konektor.php';
$data = mysqli_query($konektor, "select * from profil");
if (mysqli_num_rows($data) > 0) {
    while ($d = mysqli_fetch_array($data)) {
        $idprofil = $d['idprofil'];
        $namakomunitas = $d['namakomunitas'];
        $alamat = $d['alamat'];
        $telepon = $d['telepon'];
        $email = $d['email'];
        $visi = $d['visi'];
        $misi = $d['misi'];
        $tujuan = $d['tujuan'];
        $deskripsi = $d['deskripsi'];
        $hasil = '1';
    }
} else {
    $hasil = '0';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>

<body>

    <div class="p-5 bg-primary text-white text-center">
        <h1>EXO-L Kupang</h1>
        <p>엑소엘</p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Exo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Buku Tamu</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myModalIBT">Input
                                Buku Tamu</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#myModalDBT">Display
                                Buku Tamu</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- The Modal -->
    <div class="modal" id="myModalIBT">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Input Data Buku Tamu</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="insertbt.php">
                        <div class="input-group mb-2">
                            <span class="input-group-text">Tanggal</span>
                            <input required type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Nama</span>
                            <input required type="text" name="nama" class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Email</span>
                            <input required type="email" name="email" class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Komentar</span>
                            <input required type="text" name="komentar" class="form-control">
                        </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" value="Simpan" class=" btn btn-success"></form>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModalDBT">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Data Buku Tamu</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th><small>No</small></th>
                                    <th><small>Tanggal</small></th>
                                    <th><small>Nama</small></th>
                                    <th><small>Komentar</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($konektor, "select * from bukutamu order by tanggal desc");
                                while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td><small><?php echo $no++; ?></small></td>
                                        <td><small><?php echo $d['tanggal']; ?></small></td>
                                        <td><small><?php echo $d['nama']; ?></small></td>
                                        <td><small><?php echo $d['komentar']; ?></small></td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
                <h2>About EXO</h2>
                <div>
                    <center><img src="images/logo.jpg" width="100%"></center>
                </div>
                <p><?php echo $deskripsi; ?></p>
                <h3 class="mt-4">Menu Pilihan</h3>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                                Visi
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                            <div class="card-body">
                                <?php echo $visi; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                                Misi
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <?php echo $misi; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                                Tujuan
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <?php echo $tujuan; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">

                <?php
                $data = mysqli_query($konektor, "select * from kegiatan order by tanggal desc");
                while ($d = mysqli_fetch_array($data)) { ?>
                    <h2><?php echo $d['judul']; ?></h2>
                    <h5><?php echo $d['tanggal']; ?></h5>
                    <div><img src="album/<?php echo $d['idkegiatan']; ?>.jpeg" width="100"></div>
                    <p><?php echo $d['lokasi']; ?></p>
                    <p><?php echo $d['deskripsi']; ?></p>
                    <hr>
                <?php } ?>




            </div>
        </div>
    </div>

    <div class=" mt-5 p-4 bg-dark text-white text-center">
        <p><small><?php echo $alamat; ?></small></p>
    </div>

</body>

</html>