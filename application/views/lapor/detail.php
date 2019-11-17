<section class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container fdb-box">
        <div class="row mb-3">
            <div class="col">
                <a href="<?= base_url('laporan') ?>" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h2>Nama Situs : <u><?= $laporan['nama_situs'] ?></u></h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3>Deskripsi laporan :</h3>
                <p><?= $laporan['deskripsi'] ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3>Bukti Laporan :</h3>
                <img src="<?= base_url('assets/uploads/laporan/' . $laporan['foto']) ?>" class="img-thumbnail" alt="">
            </div>
        </div>
    </div>
</section>