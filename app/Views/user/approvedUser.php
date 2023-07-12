<?=$this->extend('templates/index');?>

<?=$this->section('page-content');?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Cuti List</h1>
<?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success" role="alert">
                     <?=session()->getFlashdata('pesan');?>
                </div>
            <?php endif?>
    <div class="row">
        <div class="col-lg-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Nama Divisi</th>
                    <th scope="col">Tanggal Cuti</th>
                    <th scope="col">Status Hrd</th>
                    <th scope="col">Status Ketua</th>
                    <th scope="col">Validasi</th>
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
                    <td><?=$peg->tanggal_cuti;?></td>
                    <td><span class="badge badge-<?=($peg->validasi_hrd == 'yes') ? 'success' : 'danger';?>"><?=$peg->validasi_hrd?></span></td>
                    <td><span class="badge badge-<?=($peg->validasi_ketua == 'yes') ? 'success' : 'danger';?>"><?=$peg->validasi_ketua;?></td>
                    <?php if ($peg->validasi_ketua == 'no'): ?>
                    <td><a href="<?=base_url('user/userapproved/' . $peg->id_cuti);?>" class="btn btn-success">Setujui </a></td>
                    <?php endif?>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?=$this->endSection();?>