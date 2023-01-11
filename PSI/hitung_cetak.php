<div style="text-align: center; min-height: 90px;">
    <img src="assets/images/logo.png" height="80" style="float: left;" />
    <b>LAPORAN RANGKING HASIL PERHITUNGAN</b><br />
    <b>COSAN Coffee</b><br />
    Jl. Seturan Raya No 6 Kledokan Caturtunggal Depok Sleman Yogyakarta..<br />
    Email: linktr.ee/co.san<br />
</div>
<hr />
<?php
$rel_alternatif = get_rel_alternatif();
foreach ($rel_alternatif as $key => $val) {
    foreach ($val as $k => $v) {
        $data[$key][$k] = $SUBKRITERIA[$v]->nilai;
    }
}
foreach ($KRITERIA as $key => $val) {
    $atribut[$key] = $val->atribut;
}

$psi = new PSI($data, $atribut);
//echo '<pre>' . print_r($psi, 1) . '</pre>';
?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Rank</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Total</th>
    </thead>
    <?php
    $rank = get_rank($psi->total);
    foreach ($rank as $key => $val) : ?>
        <tr>
            <td><?= $val ?></td>
            <td><?= $key ?></td>
            <td><?= $ALTERNATIF[$key] ?></td>
            <td><?= round($psi->total[$key], 4) ?></td>
        </tr>
    <?php endforeach ?>
</table>
<hr />
<p style="float: right; text-align: left;">
    Yogyakarta, <?= tgl_indo(date('Y-m-d')) ?><br />
    Manager<br />
    <br />
    <br />
    <br />
    <br />
    (_____________________)
</p>