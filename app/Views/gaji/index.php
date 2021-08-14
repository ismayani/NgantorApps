<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Olah Data Gaji</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item">Gaji</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Olah Data Gaji</h2>
            <p class="section-lead">Daftar Gaji</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Gaji</h4>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                            <a href="/Gaji/create" class="btn btn-primary mb-3">Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>ID Gaji</th>
                                            <th>ID Pegawai</th>
                                            <th>ID Tunjangan</th>
                                            <th>Gaji Pokok</th>
                                            <th>Tunjangan</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($Gaji as $g) : ?>
                                            <tr>
                                                <th class="text-center"><?= $i++; ?></th>
                                                <td><?= $g['id_gaji']; ?></td>
                                                <td><?= $g['id_pegawai']; ?></td>
                                                <td><?= $g['id_tunjangan']; ?></td>
                                                <td><?= $g['gaji_pokok']; ?></td>
                                                <td><?= $g['tunjangan']; ?></td>
                                                <td class="td-actions text-center">
                                                    <a href="/gaji/edit/<?= $g['id_gaji']; ?>" class="btn btn-primary btn-simple">
                                                        <i class="fas fa-users-cog"></i>
                                                    </a>
                                                    <form action="/Gaji/<?= $g['id_gaji']; ?>" method="post" class="d-inline">
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