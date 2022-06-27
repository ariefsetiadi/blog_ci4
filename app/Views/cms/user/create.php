<?= $this->extend('App\Views\layouts\cms') ?>

<?= $this->section('title') ?>
    Tambah User
<?= $this->endSection() ?>

<?= $this->section('header') ?>
    Tambah User
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card card-default">
        <div class="card-header">
            <a href="<?= base_url('cms/user') ?>" class="btn btn-secondary">Kembali</a>
        </div>

        <?php $validation = \Config\Services::validation(); ?>

        <form action="<?= base_url('cms/user/save') ?>" method="post" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text" class="form-control <?php if($validation->getError('fullname')){ echo 'is-invalid'; } ?>" name="fullname" id="fullname" value="<?= old('fullname'); ?>" placeholder="Nama Lengkap">
                            <?php if ($validation->getError('fullname')): ?>
                                <span class="error invalid-feedback">
                                    <?= $validation->getError('fullname') ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control <?php if($validation->getError('gender')){ echo 'is-invalid'; } ?>">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="1" <?php if(old('gender') == '1') { echo 'selected'; } ?>>Laki-Laki</option>
                                <option value="0" <?php if(old('gender') == '0') { echo 'selected'; } ?>>Perempuan</option>
                            </select>
                            <?php if ($validation->getError('gender')): ?>
                                <span class="error invalid-feedback">
                                    <?= $validation->getError('gender') ?>
                                </span>                                
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control <?php if($validation->getError('username')){ echo 'is-invalid'; } ?>" name="username" id="username" value="<?= old('username'); ?>" placeholder="Username">
                            <?php if ($validation->getError('username')): ?>
                                <span class="error invalid-feedback">
                                    <?= $validation->getError('username') ?>
                                </span>                                
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="isactive">Status</label>
                            <select name="isactive" id="isactive" class="form-control <?php if($validation->getError('isactive')){ echo 'is-invalid'; } ?>">
                                <option value="">-- Pilih Status --</option>
                                <option value="1" <?php if(old('isactive') == '1') { echo 'selected'; } ?>>Aktif</option>
                                <option value="0" <?php if(old('isactive') == '0') { echo 'selected'; } ?>>Nonaktif</option>
                            </select>
                            <?php if ($validation->getError('isactive')): ?>
                                <span class="error invalid-feedback">
                                    <?= $validation->getError('isactive') ?>
                                </span>                                
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>
