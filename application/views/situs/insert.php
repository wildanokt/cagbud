<section class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-md-5">
                <form id="formulir" action="<?= base_url('input_proposal') ?>" method="post" enctype="multipart/form-data">
                    <div class="fdb-box fdb-touch mb-4">
                        <?= $this->session->flashdata('message') ?>
                        <div class="row text-center">
                            <div class="col">
                                <h2>Pengajuan Temuan Situs</h2>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="nama_situs">Nama Situs</label>
                                <input id="nama_situs" name="nama_situs" type="text" class="form-control" placeholder="Nama Situs" value="<?= set_value('nama_situs'); ?>">
                                <?= form_error('nama_situs', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="deskripsi">Deskripsi Situs</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi"><?= set_value('deskripsi') ?></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="jalan">Jalan</label>
                                <input id="jalan" name="jalan" type="text" class="form-control" placeholder="Jalan" value="<?= set_value('jalan'); ?>">
                                <?= form_error('jalan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="kecamatan">Kecamatan</label>
                                <input id="kecamatan" name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" value="<?= set_value('kecamatan'); ?>">
                                <?= form_error('kecamatan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="kota">Kota</label>
                                <input id="kota" name="kota" type="text" class="form-control" placeholder="Kota" value="<?= set_value('kota'); ?>">
                                <?= form_error('kota', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="provinsi">Provinsi</label>
                                <input id="provinsi" name="provinsi" type="text" class="form-control" placeholder="provinsi" value="<?= set_value('provinsi'); ?>">
                                <?= form_error('provinsi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="kondisi">Kondisi Situs</label>
                                <textarea id="kondisi" name="kondisi" class="form-control" placeholder="Kondisi"><?= set_value('kondisi') ?></textarea>
                                <?= form_error('kondisi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="foto_situs">Foto Situs</label>
                                <input id="foto_situs" name="foto_situs" type="file" class="btn btn-outline-primary btn-block">
                                <?= form_error('foto_situs', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4 text-center">
                            <div class="col">
                                <button class="btn btn-primary">Ajukan</button>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                    document.querySelector('#formulir').addEventListener('submit', function(e) {
                        var form = this;

                        e.preventDefault();
                        Swal.fire({
                            text: "Pastikan semua data terisi dengan benar",
                            type: 'Info',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya!'
                        }).then(function(result) {
                            if (result.value) {
                                Swal.fire({
                                    text: "Data pengajuan sedang diproses",
                                    icon: 'success'
                                }).then(function() {
                                    form.submit();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Proses dihentikan!',
                                    text: "Silakan perbarui data pengajuan",
                                    icon: 'cancel'
                                })
                            }
                        })
                    })
                </script>
            </div>
        </div>
    </div>
</section>