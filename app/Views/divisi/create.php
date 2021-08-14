<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Data Divisi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/divisi">Divisi</a></div>
                <div class="breadcrumb-item">Create Divisi</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Data Divisi</h2>
            <p class="section-lead">Create Divisi</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Divisi</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Divisi/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <label for="id_divisi" class="col-sm-3">ID Divisi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('id_divisi')) ?
                                                                                    'is-invalid' : ''; ?>" id="id_divisi" name="id_divisi" autofocus value="<?= old('id_divisi'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('id_divisi'); ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="nama_divisi" class="col-sm-3">Nama Divisi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_divisi')) ?
                                                                                    'is-invalid' : ''; ?>" id="nama_divisi" name="nama_divisi" autofocus value="<?= old('nama_divisi'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_divisi'); ?>
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