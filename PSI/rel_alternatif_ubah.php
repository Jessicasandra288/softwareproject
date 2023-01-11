<?php
function get_subkriteria_option($kode_kriteria, $selected = 0)
{
    global $SUBKRITERIA;
    $a = '';
    foreach ($SUBKRITERIA as $key => $val) {
        if ($val->kode_kriteria == $kode_kriteria) {
            if ($val->kode_subkriteria == $selected)
                $a .= "<option value='$val->kode_subkriteria' selected>$val->nama_subkriteria</option>";
            else
                $a .= "<option value='$val->kode_subkriteria'>$val->nama_subkriteria</option>";
        }
    }
    return $a;
}
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah nilai bobot &raquo; <small><?= $row->nama_alternatif ?></small></h1>
</div>
<div class="row">
    <div class="col-sm-4">
        <form method="post" action="aksi.php?act=rel_alternatif_ubah&ID=<?= $row->kode_alternatif ?>">
            <?php
            $rows = $db->get_results("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria, ra.kode_subkriteria FROM tb_rel_alternatif ra INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria  WHERE kode_alternatif='$_GET[ID]' ORDER BY kode_kriteria");
            foreach ($rows as $row) : ?>
                <div class="form-group">
                    <label><?= $row->nama_kriteria ?></label>
                    <select class="form-control" name="kode_subkriteria[<?= $row->ID ?>]"><?= get_subkriteria_option($row->kode_kriteria, $row->kode_subkriteria) ?></select>
                </div>
            <?php endforeach ?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=rel_alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>