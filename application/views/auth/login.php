<section class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/blue.svg') ?>);">
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
                    <form class="user" method="post" action="<?= base_url('login') ?>">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
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
                        <a class="small" href="<?= base_url('forgot') ?>">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('register'); ?>">Create an Account!</a>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?= base_url(); ?>">Back to website</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>