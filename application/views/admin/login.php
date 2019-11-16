<section class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/purple.svg') ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-xl-5 text-center">
                <div class="fdb-box wow animated fadeInDown">
                    <div class="row">
                        <div class="col">
                            <h1>Login</h1>
                        </div>
                    </div>
                    <?= $this->session->flashdata('message') ?>
                    <form class="user" method="post" action="<?= base_url('logina') ?>">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Masukkan username..." value="<?= set_value('username'); ?>">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?= base_url(); ?>">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>