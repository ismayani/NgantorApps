<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Data Gaji</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/gaji">Gaji</a></div>
                <div class="breadcrumb-item">Create Gaji</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Data Gaji</h2>
            <p class="section-lead">Create Gaji</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Gaji</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Gaji/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <label for="id_gaji" class="col-sm-3">ID Gaji</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('id_gaji')) ?
                                                                                    'is-invalid' : ''; ?>" id="id_gaji" name="id_gaji" autofocus value="<?= old('id_gaji'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('id_gaji'); ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="id_pegawai" class="col-sm-3">Nama Pegawai</label>
                                    <div class="col-sm-8">
                                        <select id="id_pegawai" name="id_pegawai" class="custom-select border-transparent" data-style="btn btn-link">
                                            <option id="id_pegawai" name="id_pegawai" selected>Pilih Pegawai..
                                                <?php
                                                $con = new mysqli("localhost", "root", "", "10119265_kepegawaian");
                                                $sql = mysqli_query($con, "SELECT id_pegawai,nama FROM pegawai") or die(mysqli_error($con));
                                                while ($data_jabatan = mysqli_fetch_array($sql)) {
                                                    echo '<option id="id_pegawai" name="id_pegawai" value="' . $data_jabatan['id_pegawai'] . '">' . $data_jabatan['nama'] . '</option>';
                                                }
                                                ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="id_tunjangan" class="col-sm-3">ID Tunjangan</label>
                                    <div class="col-sm-8">
                                        <select id="id_tunjangan" name="id_tunjangan" class="custom-select border-transparent" data-style="btn btn-link">
                                            <option id="id_tunjangan" name="id_tunjangan" selected>Pilih Tunjangan..
                                                <?php
                                                $con = new mysqli("localhost", "root", "", "10119265_kepegawaian");
                                                $sql = mysqli_query($con, "SELECT id_tunjangan FROM tunjangan") or die(mysqli_error($con));
                                                while ($data_jabatan = mysqli_fetch_array($sql)) {
                                                    echo '<option id="id_tunjangan" name="id_tunjangan" value="' . $data_jabatan['id_tunjangan'] . '">' . $data_jabatan['id_tunjangan'] . '</option>';
                                                }
                                                ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="gaji_pokok" class="col-sm-3">Gaji Pokok</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('gaji_pokok')) ?
                                                                                    'is-invalid' : ''; ?>" id="gaji_pokok" name="gaji_pokok" autofocus value="<?= old('gaji_pokok'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('gaji_pokok'); ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="tunjangan" class="col-sm-3">Tunjangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('tunjangan')) ?
                                                                                    'is-invalid' : ''; ?>" id="tunjangan" name="tunjangan" autofocus value="<?= old('tunjangan'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tunjangan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>