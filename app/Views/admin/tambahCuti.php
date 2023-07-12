<?=$this->extend('templates/index');?>

<?=$this->section('page-content');?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Cuti Pegawai</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
                <?php if (session()->getFlashdata('pesan_gagal')): ?>
                <div class="alert alert-danger" role="alert">
                     <?=session()->getFlashdata('pesan_gagal');?>
                     <?= session()->stop() ?>
                </div>
            <?php endif?>
                <input type="hidden" name="id_pegawai" value="<?=$data_pegawai['id']?>" />
                <div class="form-group row">
                    <label for="tanggal_cuti" class="col-sm-2 col-form-label">Tanggal Cuti</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_cuti" name="tanggal_cuti" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alasan_cuti" class="col-sm-2 col-form-label">Alasan Cuti</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="alasan_cuti" name="alasan_cuti" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary my-3">Tambah Data</button>
                    </div>
                </div>
                <small><a href="<?=base_url('admin/detailpegawai/' . $data_pegawai['id'])?>">&laquo; back to Pegawai list</a></small>
        </div>
    </div>
</div>
<?=$this->endSection();?>