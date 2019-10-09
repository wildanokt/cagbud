<section class="fdb-block full-screen" style="background-image: url(<?= base_url('assets/imgs/hero/blue.svg') ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-xl-5 text-center">
                <div class="fdb-box wow animated fadeInDown">
                    <div class="row">
                        <div class="col">
                            <h1>Lupa password?</h1>
                        </div>
                    </div>
                    <?= $this->session->flashdata('message') ?>
                    <form class="user" method="post" action="<?= base_url('forgot') ?>">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control form-control-user" id="email" placeholder="Masukkan email anda..." value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Atur Ulang
                        </button>
                    </form>

                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('register'); ?>">Buat akun baru!</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>