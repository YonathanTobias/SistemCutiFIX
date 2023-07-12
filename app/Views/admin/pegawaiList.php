<?=$this->extend('templates/index');?>

<?=$this->section('page-content');?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Pegawai List</h1>
<?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success" role="alert">
                     <?=session()->getFlashdata('pesan');?>
                </div>
            <?php endif?>
<a class="btn btn-primary" href="<?=base_url('/admin/tambahpegawai')?>">Tambah Data Pegawai</a>
    <div class="row">
        <div class="">
        <br>
        <!-- <form action="" method="POST">
        <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan Nama Pegawai" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit"  >Button</button>
                </div>
                </form> -->
            <table id="tabel-data" class="table table-striped table-bordered display">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Divisi</th>
                    <th scope="col">Sisa Cuti</th>
                    <th scope="col">Actions</th>
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
                        <a href="<?=base_url('admin/detailpegawai/' . $peg->pegawaiid);?>" class="btn btn-info"> Details</a>
                        <a href="<?=base_url('admin/editpegawai/' . $peg->pegawaiid);?>" class="btn btn-warning"> Edit</a>
                        <a href="<?=base_url('admin/hapuspegawai/' . $peg->pegawaiid);?>" class="btn btn-danger"> hapus</a>
                    </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="javascript">
$(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>
<?=$this->endSection();?>