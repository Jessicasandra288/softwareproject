<div class="page-header">
    <h2>Perhitungan</h2>
</div>
<?php
$c = $db->get_results("SELECT * FROM tb_rel_alternatif WHERE kode_subkriteria NOT IN (SELECT kode_subkriteria FROM tb_subkriteria)");
if (!$ALTERNATIF || !$KRITERIA) :
    echo "Tampaknya anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 3 kriteria.";
elseif ($c) :
    echo "Tampaknya anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Nilai Alternatif</strong>.";
else :
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
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Hasil Analisa</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <?php foreach ($KRITERIA as $key => $val) : ?>
                            <th><?= $val->nama_kriteria ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <?php foreach ($rel_alternatif as $key => $value) : ?>
                    <tr>
                        <td><?= $key ?></td>
                        <td><?= $ALTERNATIF[$key] ?></td>
                        <?php foreach ($value as $k => $v) : ?>
                            <td><?= $SUBKRITERIA[$v]->nama_subkriteria ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Nilai Alternatif (x<sub>ij</sub>)</h3>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Kode</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
            </thead>
            <?php
            $no = 1;
            foreach ($rel_alternatif as $key => $value) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($value as $k => $v) : ?>
                        <td><?= $SUBKRITERIA[$v]->nilai ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
            <tfoot>
                <tr>
                    <td>Min</td>
                    <?php foreach ($psi->minmax as $key => $val) : ?>
                        <td><code><?= $val['min'] ?></code></td>
                    <?php endforeach ?>
                </tr>
                <tr>
                    <td>Max</td>
                    <?php foreach ($psi->minmax as $key => $val) : ?>
                        <td><code><?= $val['max'] ?></code></td>
                    <?php endforeach ?>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Normalisasi (N<sub>ij</sub>)</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <?php foreach ($KRITERIA as $key => $val) : ?>
                            <th><?= $key ?> (<code><?= $val->atribut ?></code>)</th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <?php foreach ($psi->normal as $key => $val) : ?>
                    <tr>
                        <td><?= $key ?></td>
                        <?php foreach ($val as $k => $v) : ?>
                            <td><?= round($v, 4) ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <td>Mean (N)</td>
                    <?php foreach ($psi->mean as $key => $val) : ?>
                        <td><code><?= round($val, 4) ?></code></td>
                    <?php endforeach ?>
                </tr>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Variasi Preferensi</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <?php foreach ($KRITERIA as $key => $val) : ?>
                            <th><?= $key ?> (<code><?= $val->atribut ?></code>)</th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <?php foreach ($psi->phi as $key => $val) : ?>
                    <tr>
                        <td><?= $key ?></td>
                        <?php foreach ($val as $k => $v) : ?>
                            <td><?= round($v, 4) ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
                <tfoot>
                    <tr>
                        <td>Total (&Phi;)</td>
                        <?php foreach ($psi->phi_total as $key => $val) : ?>
                            <td><code><?= round($val, 4) ?></code></td>
                        <?php endforeach ?>
                    </tr>
                    <tr>
                        <td>Penyimpangan (&Omega;)</td>
                        <?php foreach ($psi->penyimpangan as $key => $val) : ?>
                            <td><code><?= round($val, 4) ?></code></td>
                        <?php endforeach ?>
                    </tr>
                    <tr>
                        <td>Kriteria Bobot (&omega;)</td>
                        <?php foreach ($psi->bobot as $key => $val) : ?>
                            <td><code><?= round($val, 4) ?></code></td>
                        <?php endforeach ?>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">PSI (&theta;<sub>i</sub>)</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <?php foreach ($KRITERIA as $key => $val) : ?>
                            <th><?= $key ?> (<code><?= $val->atribut ?></code>)</th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <?php foreach ($psi->terbobot as $key => $val) : ?>
                    <tr>
                        <td><?= $key ?></td>
                        <?php foreach ($val as $k => $v) : ?>
                            <td><?= round($v, 4) ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Perangkingan</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Total (&theta;<sub>i</sub>)</th>
                </thead>
                <?php
                $rank = get_rank($psi->total);
                // echo '<pre>' . print_r($psi->total, 1) . '</pre>';
                foreach ($rank as $key => $val) : ?>
                    <tr>
                        <td><?= $val ?></td>
                        <td><?= $key ?></td>
                        <td><?= $ALTERNATIF[$key] ?></td>
                        <td><?= round($psi->total[$key], 4) ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
        <div class="panel-body">
            <a class="btn btn-default" target="_blank" href="cetak.php?m=hitung"><span class="glyphicon glyphicon-print"></span> Cetak</a>
        </div>
    </div>
<?php endif ?>