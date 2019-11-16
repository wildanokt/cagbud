<div class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="list-group">
                    <?php foreach ($all_situs as $item) {
                        if ($item['id_user'] == $user['id']) { ?>
                            <li class="list-group-item">
                                <?= $item['nama_situs'] ?>
                                <a href="<?= base_url('hapus/' . $item['id']) ?>" class="float-right badge badge-danger mx-2">Hapus</a>
                                <a href="<?= base_url('hapus/' . $item['id']) ?>" class="float-right badge badge-primary mx-2">edit</a>
                                <a href="<?= base_url('hapus/' . $item['id']) ?>" class="float-right badge badge-success mx-2">lihat</a>
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