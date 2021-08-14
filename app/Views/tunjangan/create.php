<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Data Tunjangan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/tunjangan">Tunjangan</a></div>
                <div class="breadcrumb-item">Create Tunjangan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Data Tunjangan</h2>
            <p class="section-lead">Create Tunjangan</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Tunjangan</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Tunjangan/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <label for="id_tunjangan" class="col-sm-3">ID Tunjangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('id_tunjangan')) ?
                                                                                    'is-invalid' : ''; ?>" id="id_tunjangan" name="id_tunjangan" autofocus value="<?= old('id_tunjangan'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('id_tunjangan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="id_pegawai" class="col-sm-3">Nama Pegawai</label>
                                    <div class="col-sm-8">
                                        <select id="id_pegawai" name="id_pegawai" class="custom-select border-transparent" data-style="btn btn-link">
                                            <option id="id_pegawai" name="id_pegawai" selected>Pilih Nama Pegawai..
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
                                    <label for="jenis_tunjangan" class="col-sm-3">Jenis Tunjangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('jenis_tunjangan')) ?
                                                                                    'is-invalid' : ''; ?>" id="jenis_tunjangan" name="jenis_tunjangan" autofocus value="<?= old('jenis_tunjangan'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_tunjangan'); ?>
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