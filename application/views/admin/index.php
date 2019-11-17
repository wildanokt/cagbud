<section class="fdb-block">
    <div class="container">
        <a href="<?= base_url('logouta') ?>" class="btn btn-outline-danger">Log Out</a>
        <hr>
        <h1>Hi admin <?= $admin['nama_lengkap']; ?></h1>
        <hr>
        <div class="row">
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Manage Situs</h3>
                        <p class="card-text">Berisi daftar situs </p>
                        <a href="<?= base_url('a_manage') ?>" class="btn btn-outline-primary">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Manage Laporan Situs</h3>
                        <p class="card-text">Berisi daftar laporan</p>
                        <a href="<?= base_url('laporan') ?>" class="btn btn-outline-primary">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>