<div class="page-header">
    <h1>Nilai Bobot Alternatif</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="rel_alternatif" />
            <div class="form-group">
                <input class="form-control" type="text" name="q" value="<?= input_get('q') ?>" placeholder="Pencarian..." />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Alternatif</th>
                    <?php
                    $rows = $db->get_results("SELECT nama_kriteria FROM tb_kriteria");
                    foreach ($rows as $row) {
                        echo "<th>$row->nama_kriteria</th>";
                    }
                    ?>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $q = esc_field(input_get('q'));
                $rows = $db->get_results("SELECT * FROM tb_alternatif 
                WHERE 
                    kode_alternatif LIKE '%$q%'
                    OR nama_alternatif LIKE '%$q%'
                    OR keterangan LIKE '%$q%'  
                ORDER BY kode_alternatif");
                $rel_alternatif = get_rel_alternatif();

                foreach ($rows as $row) : ?>
                    <tr class="nw">
                        <td><?= $row->kode_alternatif ?></td>
                        <td><?= $row->nama_alternatif; ?></td>
                        <?php foreach ($rel_alternatif[$row->kode_alternatif] as $k => $v) : ?>
                            <td><?= isset($SUBKRITERIA[$v]) ? $SUBKRITERIA[$v]->nama_subkriteria : '' ?></td>
                        <?php endforeach ?>
                        <td>
                            <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=<?= $row->kode_alternatif ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>