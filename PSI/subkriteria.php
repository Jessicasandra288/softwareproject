<div class="page-header">
    <h1>Nilai Subkriteria</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="subkriteria" />
            <div class="form-group">
                <input class="form-control" type="text" name="q" value="<?= input_get('q') ?>" placeholder="Pencarian...">
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=subkriteria_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" target="_blank" href="cetak.php?<?= $_SERVER['QUERY_STRING'] ?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kriteria</th>
                    <th>Nama</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(input_get('q'));
            $rows = $db->get_results("SELECT *
                FROM tb_subkriteria c INNER JOIN tb_kriteria k ON k.kode_kriteria=c.kode_kriteria 
                WHERE k.nama_kriteria LIKE '%$q%' 
                ORDER BY k.kode_kriteria, nilai");
            $no = 1;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->nama_kriteria ?></td>
                    <td><?= $row->nama_subkriteria ?></td>
                    <td><?= $row->nilai ?></td>
                    <td>
                        <a class="btn btn-xs btn-warning" href="?m=subkriteria_ubah&ID=<?= $row->kode_subkriteria ?>&kode_kriteria=<?= $row->kode_kriteria ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=subkriteria_hapus&ID=<?= $row->kode_subkriteria ?>&kode_kriteria=<?= $row->kode_kriteria ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>