
<?=$this->extend('templates/index');?>

<?=$this->section('page-content');?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Edit Data Pegawai</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
                <?php if (session()->getFlashdata('pesan_gagal')): ?>
                <div class="alert alert-success" role="alert">
                     <?=session()->getFlashdata('pesan_gagal');?>
                </div>
            <?php endif?>
                <input type="hidden" id="id" name="id" value="<?=$divisi['id_divisi']?>" />
                <div class="form-group row">
                    <label for="nama_divisi" class="col-sm-2 col-form-label">Nama Divisi:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"
                        id="nama_divisi" name="nama_divisi" autofocus value="<?=$divisi['nama_divisi']?>">
                    <div class="invalid-feedback">
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary my-3">Edit Data Divisi</button>
                    </div>
                </div>
                <small><a href="<?=base_url('/admin/divisilist')?>">&laquo; back to Divisi list</a></small>
        </div>
    </div>
</div>
<?=$this->endSection();?>