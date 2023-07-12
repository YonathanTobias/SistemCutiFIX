
<?=$this->extend('templates/index');?>

<?=$this->section('page-content');?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Nama Divisi</h1>
<?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success" role="alert">
                     <?=session()->getFlashdata('pesan');?>
                </div>
            <?php endif?>
<a class="btn btn-primary" href="<?=base_url('/admin/tambahdivisi')?>">Tambah Data Divisi</a>
    <div class="row">
        <div class="col-lg-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Divisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    <?php foreach ($divisi as $div): ?>
                    <tr>
                    <th scope="row"><?=$i++;?></th>
                    <td><?=$div->nama_divisi;?></td>
                    <td>
                    <a href="<?=base_url('admin/editdivisi/' . $div->id_divisi);?>" class="btn btn-warning"> Edit</a>
                    <a href="<?=base_url('admin/hapusdivisi/' . $div->id_divisi);?>" class="btn btn-danger"> hapus</a>
                    </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?=$this->endSection();?>