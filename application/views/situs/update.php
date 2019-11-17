<section class="fdb-block" style="background-image: url(<?= base_url('assets/imgs/hero/red.svg') ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-md-5">
                <form id="formulir" action="<?= base_url('update_situs/' . $situs['id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="fdb-box fdb-touch mb-4">
                        <?= $this->session->flashdata('message') ?>
                        <div class="row text-center">
                            <div class="col">
                                <h2>Update Situs</h2>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="nama_situs">Nama Situs</label>
                                <input id="nama_situs" name="nama_situs" type="text" class="form-control" placeholder="Nama Situs" value="<?= $situs['nama_situs'] ?>">
                                <?= form_error('nama_situs', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="deskripsi">Deskripsi Situs</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi"><?= $situs['deskripsi'] ?></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <?php if ($this->session->userdata('pyokopyoko') != null && $user['id'] == null) { ?>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="kode">Kode Situs</label>
                                    <input id="kode" name="kode" type="text" class="form-control" placeholder="kode" value="<?= $situs['kode_situs'] ?>">
                                    <?= form_error('kode', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="jalan">Jalan</label>
                                <input id="jalan" name="jalan" type="text" class="form-control" placeholder="Jalan" value="<?= $situs['jalan'] ?>">
                                <?= form_error('jalan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="kecamatan">Kecamatan</label>
                                <input id="kecamatan" name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" value="<?= $situs['kecamatan'] ?>">
                                <?= form_error('kecamatan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="kota">Kota</label>
                                <input id="kota" name="kota" type="text" class="form-control" placeholder="Kota" value="<?= $situs['kota'] ?>">
                                <?= form_error('kota', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="provinsi">Provinsi</label>
                                <input id="provinsi" name="provinsi" type="text" class="form-control" placeholder="provinsi" value="<?= $situs['provinsi'] ?>">
                                <?= form_error('provinsi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="kondisi">Kondisi Situs</label>
                                <textarea id="kondisi" name="kondisi" class="form-control" placeholder="Kondisi"><?= $situs['kondisi'] ?></textarea>
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
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>