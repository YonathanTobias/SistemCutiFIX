
<?=$this->extend('templates/index');?>

<?=$this->section('page-content');?>

<?php $jumlahcuti = count($data_pegawai)?>
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Detail Pegawai</h1>
<?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success" role="alert">
                     <?=session()->getFlashdata('pesan');?>
                </div>
            <?php endif?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <h4><?=$data_pegawai[0]->nip?></h4>
                                <li class="list-group-item"><?=$data_pegawai[0]->nama?></li>
                                <li class="list-group-item"><?=$data_pegawai[0]->nama_divisi?> </li>
                                <a class="btn btn-primary btn-space" href="<?=base_url('/admin/exportpegawai/' . $data_pegawai[0]->pegawaiid)?>">Ekspor Data Cuti Pegawai</a>
                                <?php if ($jumlahcuti < '12'): ?>
                                    <a class="btn btn-primary" href="<?=base_url('/admin/tambahcuti/' . $data_pegawai[0]->pegawaiid)?>">Ajukan Cuti</a>
                                <?php else: ?>
                                    <p>Kuota Cuti Sudah Habis</p>
                                <?php endif?>
                                    <small><a href="<?=base_url('/admin/pegawailist')?>">&laquo; back to user list</a></small>
                            </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
        <div class="col-lg-8">
            <?php if ($data_pegawai[0]->id_cuti == null): ?>
                    <h3 class="h3 mb-4 text-gray-800">Belum Pernah Cuti</h3>
                    <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal Cuti</th>
                    <th scope="col">Alasan Cuti</th>
                    <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <Tbody>
                    <tr>
                    <?php $i = 1;?>
                    <?php $sisa_cuti = 0?>
                    <?php foreach ($data_pegawai as $peg): ?>
                        <?php $sisa_cuti++?>
                        <td><?=$i++?></td>
                        <td><?=$peg->tanggal_cuti?></td>
                        <td><?=$peg->alasan_cuti?></td>
                        <td><a href="<?=base_url('admin/hapuscutidetail/' . $peg->id_cuti)?>" class="btn btn-danger"> hapus</a></td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif;?>
                </Tbody>
            </table>
        </div>
</div>
<style> .btn-space {
    margin-bottom: 10px;
}
</style>
<?=$this->endSection();?>