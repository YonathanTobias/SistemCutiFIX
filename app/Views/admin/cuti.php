<?=$this->extend('templates/index');?>

<?=$this->section('page-content');?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Cuti List</h1>
<a class="btn btn-primary" href="<?=base_url('/admin/exportcsv')?>">Ekspor CSV</a>
    <div class="row">
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
                    <!-- <th scope="col">Aksi</th> -->
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
                    <?php if ($peg->validasi_hrd == 'no'): ?>
                    <td><a href="<?=base_url('admin/approvedhrd/' . $peg->id_cuti)?>" class="btn btn-success " >Setujui</a></td>
                    <?php else: ?>
                    <td>-</td>
                    <?php endif?>
                    <td><a href="<?=base_url('admin/hapuscuti/' . $peg->id_cuti)?>" class="btn btn-danger"> hapus</a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

<?=$this->endSection();?>