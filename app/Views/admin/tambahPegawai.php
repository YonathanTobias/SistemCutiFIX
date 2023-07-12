<?=$this->extend('templates/index');?>

<?=$this->section('page-content');?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Pegawai</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"
                        id="nip" name="nip" autofocus value="">
                    <div class="invalid-feedback">

                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Divisi</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="divisi">
                        <?php foreach ($divisi as $div): ?>
                        <option value="<?=$div->id_divisi?>"><?=$div->nama_divisi?></option>
                        <?php endforeach;?>
                    </select>
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