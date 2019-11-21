<section class="fdb-block full-screen" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-md-5">
                <div class="fdb-box fdb-touch">
                    <?= $this->session->flashdata('message') ?>
                    <div class="row">
                        <div class="col text-center">
                            <h1>Edit Profile</h1>
                        </div>
                    </div>
                    <form action="<?= base_url('edit_profile') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col mt-4">
                                <label for="name">Nama Lengkap</label>
                                <input id="name" type="text" name="name" class="form-control" placeholder="name" value="<?= $user['nama_lengkap'] ?>">
                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control" placeholder="email" value="<?= $user['email'] ?>" readonly>
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="tel">Nomor Telepon</label>
                                <input id="tel" name="tel" type="text" class="form-control" placeholder="Nomor telepon" value="<?= $user['nomor_telepon'] ?>">
                                <?= form_error('tel', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="password">Sandi baru (biarkan kosong jika tidak ingin merubah)</label>
                                <input id="password" name="password1" type="password" class="form-control" placeholder="Sandi baru">
                                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="password2">Ulangi kata sandi baru</label>
                                <input id="password2" name="password2" type="password" class="form-control" placeholder="Ulang sandi">
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="image">Pilih foto profil baru</label>
                                <input type="file" class="btn btn-outline-primary" name="image" id="image">
                            </div>
                        </div>
                        <div class="row mt-4 text-center">
                            <div class="col">
                                <button name="submit" class="btn btn-primary" type="submit">Perbarui</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>