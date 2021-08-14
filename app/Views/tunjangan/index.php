<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Olah Data Tunjangan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item">Tunjangan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Olah Data Tunjangan</h2>
            <p class="section-lead">Daftar Tunjangan</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Tunjangan</h4>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                            <a href="/Tunjangan/create" class="btn btn-primary mb-3">Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>ID Tunjangan</th>
                                            <th>ID Pegawai</th>
                                            <th>Jenis Tunjangan</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($Tunjangan as $t) : ?>
                                            <tr>
                                                <th class="text-center"><?= $i++; ?></th>
                                                <td><?= $t['id_tunjangan']; ?></td>
                                                <td><?= $t['id_pegawai']; ?></td>
                                                <td><?= $t['jenis_tunjangan']; ?></td>
                                                <td class="td-actions text-center">
                                                    <a href="/tunjangan/edit/<?= $t['id_tunjangan']; ?>" class="btn btn-primary btn-simple">
                                                        <i class="fas fa-users-cog"></i>
                                                    </a>
                                                    <form action="/Tunjangan/<?= $t['id_tunjangan']; ?>" method="post" class="d-inline">
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