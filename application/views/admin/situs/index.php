<div class="fdb-block full-screen" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row my-2">
            <div class="col">
                <a href="<?= base_url('mimin') ?>" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <ul class="list-group">
                    <?php foreach ($all_situs as $item) { ?>
                        <li class="list-group-item">
                            <?= $item['nama_situs'] ?>
                            <?php if ($item['is_verif'] == 0) { ?>
                                <span class="mx-3 mt-2 badge badge-danger">Belum Terverifikasi</span>
                            <?php } else { ?>
                                <span class="mx-3 mt-2 badge badge-success">Terverifikasi</span>
                            <?php } ?>
                            <a href="<?= base_url('verifikasi/' . $item['id']) ?>" class="btn btn-success float-right">verifikasi</a>
                            <a href="<?= base_url('hapus_situs/' . $item['id']) ?>" class="mt-2 float-right badge badge-danger mx-2">Hapus</a>
                            <a href="<?= base_url('update_situs/' . $item['id']) ?>" class="mt-2 float-right badge badge-primary mx-2">edit</a>
                            <a href="<?= base_url('situs/' . $item['id']) ?>" class="mt-2 float-right badge badge-success mx-2">lihat</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>