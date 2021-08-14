<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Data Pegawai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/kepegawaian">Pegawai</a></div>
                <div class="breadcrumb-item">Create Pegawai</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Data Pegawai</h2>
            <p class="section-lead">Create Pegawai</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Pegawai</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Kepegawaian/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <label for="id_pegawai" class="col-sm-3">ID Pegawai</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('id_pegawai')) ?
                                                                                    'is-invalid' : ''; ?>" id="id_pegawai" name="id_pegawai" autofocus value="<?= old('id_pegawai'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('id_pegawai'); ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3">Nama Pegawai</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ?
                                                                                    'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="TTL" class="col-sm-3">Tempat Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="TTL" name="TTL" value="<?= old('TTL'); ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="jenis_kelamin" class="col-sm-3">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                            <option selected>Jenis Kelamin..</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="telepon" class="col-sm-3">Nomor Telepon</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= old('telepon'); ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="id_jabatan" class="col-sm-3">Jabatan</label>
                                    <div class="col-sm-8">
                                        <select id="id_jabatan" name="id_jabatan" class="custom-select border-transparent" data-style="btn btn-link">
                                            <option id="id_jabatan" name="id_jabatan" selected>Pilih Jabatan..
                                                <?php
                                                $con = new mysqli("localhost", "root", "", "10119265_kepegawaian");
                                                $sql = mysqli_query($con, "SELECT id_jabatan,kriteria_jabatan FROM jabatan") or die(mysqli_error($con));
                                                while ($data_jabatan = mysqli_fetch_array($sql)) {
                                                    echo '<option id="id_jabatan" name="id_jabatan" value="' . $data_jabatan['id_jabatan'] . '">' . $data_jabatan['kriteria_jabatan'] . '</option>';
                                                }
                                                ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Alamat" class="col-sm-3">Alamat Pegawai</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control" id="Alamat" name="Alamat" value="<?= old('Alamat'); ?>"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3">Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="status" name="status">
                                            <option selected>Status..</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="jumlah_anak" class="col-sm-3">Jumlah Anak</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="jumlah_anak" name="jumlah_anak" value="<?= old('jumlah_anak'); ?>">
                                    </div>
                                </div>
                                <br>
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