<div class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col">
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="list-group">
                    <?php foreach ($all_situs as $item) {
                        if ($item['id_user'] == $user['id']) { ?>
                            <li class="list-group-item">
                                <?= $item['nama_situs'] ?>
                                <?php if ($item['is_verif'] == 0) { ?>
                                    <span class="mx-3 badge badge-danger">Belum Terverifikasi</span>
                                <?php } else { ?>
                                    <span class="mx-3 badge badge-success">Terverifikasi</span>
                                <?php } ?>
                                <a href="<?= base_url('hapus_situs/' . $item['id']) ?>" class="float-right badge badge-danger mx-2">Hapus</a>
                                <a href="<?= base_url('update_situs/' . $item['id']) ?>" class="float-right badge badge-primary mx-2">edit</a>
                                <a href="<?= base_url('situs/' . $item['id']) ?>" class="float-right badge badge-success mx-2">lihat</a>
                            </li>
                        <?php } else { ?>
                            <li class="list-group-item">Data situs tidak ditemukan</li>
                    <?php }
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</div>