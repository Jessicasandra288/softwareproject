<?php
$row = $db->get_row("SELECT * FROM tb_subkriteria WHERE kode_subkriteria='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Subkriteria</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kriteria</label>
                <select class="form-control" name="kode_kriteria"><?= get_kriteria_option(set_value('kode_kriteria', $row->kode_kriteria)) ?></select>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input class="form-control" type="text" name="nama_subkriteria" value="<?= set_value('nama_subkriteria', $row->nama_subkriteria) ?>" />
            </div>
            <div class="form-group">
                <label>Nilai</label>
                <input class="form-control" type="text" name="nilai" value="<?= set_value('nilai', $row->nilai) ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=subkriteria"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>