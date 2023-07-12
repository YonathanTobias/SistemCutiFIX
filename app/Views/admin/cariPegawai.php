<?=$this->extend('templates/index');?>

<?=$this->section('page-content');?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Cari Pegawai</h1>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan Nama Pegawai" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit"  >Button</button>
                </div>
            </div>
         </div>
</div>
<?=$this->endSection();?>