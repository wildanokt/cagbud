<div class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row">
            <?php foreach ($all_situs as $situs) { ?>
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?= base_url('assets/uploads/situs/' . $situs['foto']) ?>" class="card-img" alt="">
                            <h3 class="card-title"><?= $situs['nama_situs'] ?></h3>
                            <a href="<?= base_url('situs/' . $situs['id']) ?>" class="btn btn-outline-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>