<?=$this->extend('templates/index');?>

<?=$this->section('page-content');?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Divisi</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Nama Divisi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"
                        id="nama_divisi" name="nama_divisi" autofocus value="">
                    <div class="invalid-feedback">

                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary my-3">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?=$this->endSection();?>