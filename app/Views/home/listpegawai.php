<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WPU</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
        <div class="container">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Pegawai List</h1>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukan Nama Pegawai" name="keyword">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
        </div>

            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Divisi</th>
                            <th scope="col">Sisa Cuti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;?>
                            <?php foreach ($pegawai as $peg): ?>
                            <tr>
                            <th scope="row"><?=$i++;?></th>
                            <td><?=$peg->nip;?></td>
                            <td><?=$peg->nama;?></td>
                            <td><?=$peg->nama_divisi;?></td>
                            <td><?=$peg->cuti?></td>
                            <td>
                                <!-- <a href="<?=base_url('admin/detailpegawai/' . $peg->pegawaiid);?>" class="btn btn-info"> Details</a> -->
                            </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a class="btn btn-primary" href="<?=base_url('')?>" role="button">login</a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>/js/sb-admin-2.min.js"></script>

</body>

</html>


