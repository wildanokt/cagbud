<section class="fdb-block full-screen" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="fdb-box wow animated fadeInUp">
            <?= $this->session->flashdata('message') ?>
            <div class="row align-items-center justify-content-center">
                <div class="col-10 col-md-4 m-auto">
                    <img class="img-thumbnail" src="<?= base_url('assets/uploads/profile/' . $user['foto']) ?>">
                </div>
                <div class="col-12 col-md-8 ml-auto mr-auto mt-4 mt-md-0">
                    <p class="h3"><strong>Name</strong></p>
                    <p><?= $user['nama_lengkap']; ?></p>
                    <p class="h3"><strong>Email</strong></p>
                    <p><?= $user['email']; ?></p>
                    <p class="h3"><strong>Nomor Telepon</strong></p>
                    <p><?= $user['nomor_telepon']; ?></p>
                    <a href="<?= base_url('edit_profile') ?>" class="btn btn-primary">Ubah Profile</a>
                </div>
            </div>
        </div>
        <div class="fdb-box wow animated fadeInUp my-4">
        </div>
    </div>
</section>