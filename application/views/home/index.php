<style>
    body,
    html {
        height: 100%;
    }

    .parallax {
        height: 70%;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<div class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="fdb-box">
            <h1>CAGAR BUDAYA</h1>
            <p>
                Sistem Informasi Cagar Budaya (CAGBUD) merupakan sistem informasi berbasis website yang ditujukan untuk mengenalkan dan melestarikan cagar budaya di kawasan jawa timur.
            </p>
        </div>
    </div>
</div>
<div class="parallax" style="background-image: url('<?= base_url('assets/bg/bg1.jpg') ?>');"></div>
<div class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="fdb-box">
            <div class="row">
                <div class="col text-center">
                    <h2>Situs Cagar Budaya</h2>
                </div>
            </div>
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
</div>
<div class="parallax" style="background-image: url('<?= base_url('assets/bg/bg2.jpg') ?>');"></div>