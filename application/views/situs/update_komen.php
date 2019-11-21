<section class="fdb-block full-screen" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-md-5">
                <div class="fdb-box fdb-touch">
                    <?= $this->session->flashdata('message') ?>
                    <div class="row">
                        <div class="col text-center">
                            <h1>Edit Komentar</h1>
                        </div>
                    </div>
                    <form action="<?= base_url('edit_komentar/' . $komen['id']) ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col mt-4">
                                <label for="komen">Komentar</label>
                                <textarea name="komen" id="komen" class="form-control"><?= $komen['komentar'] ?></textarea>
                                <?= form_error('komen', '<small class="text-danger">', '</small>'); ?>
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