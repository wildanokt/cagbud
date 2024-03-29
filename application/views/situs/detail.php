<div class="fdb-block full-screen" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-4">
                <a href="<?= base_url('situs') ?>" class="btn btn-primary">
                    < Kembali </a> </div> </div> <div class="row">
                        <div class="col-md-7 mb-3">
                            <div class="row my-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="<?= base_url('assets/uploads/situs/' . $situs['foto']) ?>" class="img-thumbnail" width="500px" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title"><?= $situs['nama_situs'] ?></h2>
                                            <p class="card-text">kode situs : <b><?= $situs['kode_situs'] ?></b></p>
                                            <p class="card-text">Deskripsi : <br><?= $situs['deskripsi'] ?></p>
                                            <p class="card-text">Kondisi : <br><?= htmlspecialchars_decode($situs['kondisi']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <div class="row my-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Laporkan kerusakan situs</h3>
                                            <a href="<?= base_url('lapor/' . $situs['id']) ?>" class="btn btn-primary">Laporkan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Bagikan situs ini dengan menyalin link berikut</h3>
                                            <input type="text" class="form-control" value="<?= base_url('situs/' . $situs['id']) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Berikan komentar anda mengenai situs ini</h3>
                                            <div>
                                                <form action="<?= base_url('input_komentar') ?>" method="post">
                                                    <input type="hidden" name="id_situs" value="<?= $situs['id'] ?>">
                                                    <textarea name="komentar" class="form-control mb-3" placeholder="Komentar"></textarea>
                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
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
                                                            <img src="<?= base_url('assets/uploads/profile/' . $komen['foto']) ?>" class="img-thumbnail" alt="">
                                                        </div>
                                                        <div class="col-6 py-2">
                                                            <h4><?= $komen['nama_lengkap'] ?></h4>
                                                            <p><?= $komen['komentar'] ?></p>
                                                        </div>
                                                        <?php if ($user['id'] == $komen['id_user'] && $status == 1) { ?>
                                                            <div class="col-2">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <a href="<?= base_url('edit_komentar/' . $komen['id']) ?>" class="badge badge-primary">edit</a>
                                                                    </div>
                                                                    <div class="col">
                                                                        <a href="<?= base_url('delete_komentar/' . $komen['id_situs'] . '/' . $komen['id']) ?>" class="badge badge-danger">x</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($this->session->userdata('pyokopyoko') != null && $user['id'] == null) { ?>
                                                            <div class="col-2">
                                                                <a href="<?= base_url('delete_komentar/' . $komen['id_situs'] . '/' . $komen['id']) ?>" class="badge badge-danger">x</a>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <hr>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>