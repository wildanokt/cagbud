<div class="fdb-block full-screen" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col">
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <a href="<?= base_url('mimin') ?>" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="list-group">
                    <?php foreach ($all_laporan as $item) { ?>
                        <li class="list-group-item">
                            <?= $item['nama_situs'] ?>
                            <a href="<?= base_url('hapus_laporan/' . $item['id']) ?>" class="float-right badge badge-danger mx-2">Hapus</a>
                            <a href="<?= base_url('laporan/' . $item['id']) ?>" class="float-right badge badge-success mx-2">lihat</a>
                        </li>
                    <?php } ?>
                    <?php if (count($all_laporan) == 0) { ?>
                        <div class="list-group-item">
                            <h2>Data laporan kosong</h2>
                        </div>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>