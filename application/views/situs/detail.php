<div class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-4">
                <a href="<?= base_url('situs') ?>" class="btn btn-primary">
                    < Kembali</a> </div> </div> <div class="row">
                        <div class="col-md-7 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="<?= base_url('assets/uploads/situs/' . $situs[0]['foto']) ?>" class="img-responsive" width="500px" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title"><?= $situs[0]['nama_situs'] ?></h2>
                                            <p class="card-text">kode situs : <b><?= $situs[0]['kode_situs'] ?></b></p>
                                            <p class="card-text">Deskripsi : <br><?= $situs[0]['kode_situs'] ?></p>
                                            <p class="card-text">Kondisi : <br><?= htmlspecialchars_decode($situs[0]['kondisi']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Komentar mengenai situs ini</h3>
                                            <hr>
                                            <?php if (count($komentar) == 0) { ?>
                                                <h4 class="card-text">Belum ada komentar mengenai situs ini</h4>
                                                <?php } else {
                                                    foreach ($komentar as $komen) { ?>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <img src="<?= base_url('assets/logo.png') ?>" width="100px" alt="">
                                                        </div>
                                                        <div class="col-8 py-2">
                                                            <h4><?= $komen['nama_lengkap'] ?></h4>
                                                            <p><?= $komen['komentar'] ?></p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Berikan komentar anda mengenai situs ini</h3>
                                            <div>
                                                <form action="<?= base_url('submit_komentar') ?>" method="post">
                                                    <textarea id="komentar" name="komentar" class="form-control mb-3" placeholder="Komentar"></textarea>
                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>