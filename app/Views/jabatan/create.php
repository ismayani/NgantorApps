<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Data Jabatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/jabatan">Jabatan</a></div>
                <div class="breadcrumb-item">Create Jabatan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Data Jabatan</h2>
            <p class="section-lead">Create Jabatan</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Jabatan</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Jabatan/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <label for="id_jabatan" class="col-sm-3">ID Jabatan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('id_jabatan')) ?
                                                                                    'is-invalid' : ''; ?>" id="id_jabatan" name="id_jabatan" autofocus value="<?= old('id_jabatan'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('id_jabatan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="id_divisi" class="col-sm-3">Divisi</label>
                                    <div class="col-sm-8">
                                        <select id="id_divisi" name="id_divisi" class="custom-select border-transparent" data-style="btn btn-link">
                                            <option id="id_divisi" name="id_divisi" selected>Pilih Divisi..
                                                <?php
                                                $con = new mysqli("localhost", "root", "", "10119265_kepegawaian");
                                                $sql = mysqli_query($con, "SELECT id_divisi,nama_divisi FROM divisi") or die(mysqli_error($con));
                                                while ($data_jabatan = mysqli_fetch_array($sql)) {
                                                    echo '<option id="id_divisi" name="id_divisi" value="' . $data_jabatan['id_divisi'] . '">' . $data_jabatan['nama_divisi'] . '</option>';
                                                }
                                                ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="kriteria_jabatan" class="col-sm-3">Kriteria Jabatan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('kriteria_jabatan')) ?
                                                                                    'is-invalid' : ''; ?>" id="kriteria_jabatan" name="kriteria_jabatan" autofocus value="<?= old('kriteria_jabatan'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kriteria_jabatan'); ?>
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