<section class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-xl-5 text-center">
                <div class="fdb-box wow animated fadeInDown">
                    <div class="row">
                        <div class="col">
                            <h1>Buat Akun</h1>
                        </div>
                    </div>
                    <form class="user" method="post" action="<?= base_url('register') ?>">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control form-control-user" id="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="password1" type="password" class="form-control form-control-user" id="password1" placeholder="Kata Sandi">
                            </div>
                            <div class="col-sm-6">
                                <input name="password2" type="password" class="form-control form-control-user" id="password2" placeholder="Ketik Ulang Sandi">
                            </div>
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-outline-primary btn-user btn-block">
                            Daftar
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('login'); ?>">Sudah memiliki akun? Masuk!</a>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?= base_url(); ?>">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>