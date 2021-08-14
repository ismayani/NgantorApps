<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Data Pegawai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/kepegawaian">Pegawai</a></div>
                <div class="breadcrumb-item">Detail Pegawai</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail Data Pegawai</h2>
            <p class="section-lead">Detail Pegawai</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Pegawai</h4>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div classs="col-md-4">
                                    <img style="height: 260px;weigh: auto" src="<?= base_url(); ?>/img/default.jpg" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <pre class="card-text">Nama Pegawai <span></span> : <?= $Kepegawaian['nama']; ?></pre>
                                        <pre class="card-text">TTL          <span></span> : <?= $Kepegawaian['TTL']; ?></pre>
                                        <pre class="card-text">Jenis Kelamin<span></span> : <?= $Kepegawaian['jenis_kelamin']; ?></pre>
                                        <pre class="card-text">No Telepon   <span></span> : <?= $Kepegawaian['telepon']; ?></pre>
                                        <pre class="card-text">Alamat       <span></span> : <?= $Kepegawaian['Alamat']; ?></pre>
                                        <pre class="card-text">Status       <span></span> : <?= $Kepegawaian['status']; ?></pre>
                                        <pre class="card-text">Jumlah Anak  <span></span> : <?= $Kepegawaian['jumlah_anak']; ?></pre>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <a href="/Kepegawaian" class="btn btn-danger mb-3">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>