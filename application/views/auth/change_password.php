<section class="fdb-block full-screen" style="background-image: url(<?= base_url('assets/imgs/hero/blue.svg') ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-xl-5 text-center">
                <div class="fdb-box wow animated fadeInDown">
                    <div class="row">
                        <div class="col">
                            <h2>Change password for</h2>
                            <h3 class="lead"><?= $this->session->userdata('reset_pass') ?></h3>
                        </div>
                    </div>
                    <?= $this->session->flashdata('message') ?>
                    <form class="user" method="post" action="<?= base_url('change') ?>">
                        <div class="form-group">
                            <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Enter new password...">
                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password2" class="form-control form-control-user" id="password2" placeholder="Re-type password...">
                            <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Change Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>