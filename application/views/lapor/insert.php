<section class="fdb-block full-screen" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-md-5">
                <form id="formulir" action="<?= base_url('lapor/' . $situs['id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="fdb-box fdb-touch mb-4">
                        <?= $this->session->flashdata('message') ?>
                        <div class="row text-center">
                            <div class="col">
                                <h2>Pelaporan Situs</h2>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="deskripsi">Deskripsi Laporan</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="foto">Bukti Lapor</label>
                                <input id="foto" name="foto" type="file" class="btn btn-outline-primary btn-block">
                                <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4 text-center">
                            <div class="col">
                                <button class="btn btn-primary">Lapor</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>