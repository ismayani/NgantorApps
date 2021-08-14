<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Olah Data Pegawai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item">Pegawai</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Olah Data Pegawai</h2>
            <p class="section-lead">Daftar Pegawai</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Pegawai</h4>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                            <a href="/Kepegawaian/create" class="btn btn-primary mb-3">Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Pegawai</th>
                                            <th>No Telepon</th>
                                            <th>ID Jabatan</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($Kepegawaian as $k) : ?>
                                            <tr>
                                                <th class="text-center"><?= $i++; ?></th>
                                                <td><?= $k['nama']; ?></td>
                                                <td><?= $k['telepon']; ?></td>
                                                <td><?= $k['id_jabatan']; ?></td>
                                                <td class="td-actions text-center">
                                                    <a href="/Kepegawaian/<?= $k['slug_nama']; ?>" class="btn btn-info btn-simple">
                                                        <i class="fas fa-user"></i>
                                                    </a>
                                                    <a href="/kepegawaian/edit/<?= $k['slug_nama']; ?>" class="btn btn-primary btn-simple">
                                                        <i class="fas fa-users-cog"></i>
                                                    </a>
                                                    <form action="/Kepegawaian/<?= $k['id_pegawai']; ?>" method="post" class="d-inline">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-simple" onclick="return confirm('Yakin ingin Menghapus Data?');">
                                                            <i class="fas fa-user-minus"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection(); ?>