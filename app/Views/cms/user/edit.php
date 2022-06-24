<?= $this->extend('App\Views\layouts\cms') ?>

<?= $this->section('title') ?>
    Edit User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('cms/user') ?>" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="card-block">
            <?php $validation = \Config\Services::validation(); ?>

            <?php
                if(session()->has('message')) {
            ?>
                    <div class="alert alert-error alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('message') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php
                }
            ?>

            <form action="<?= site_url('cms/user/update/'. $user['id']) ?>" method="post">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="fullname" id="fullname" value="<?= $user['fullname']; ?>" placeholder="Nama Lengkap">
                        <?php if ($validation->getError('fullname')): ?>
                            <div class="form-txt-danger">
                                <?= $validation->getError('fullname') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                        <select name="gender" id="gender" class="form-control">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="1" <?php if($user['gender'] == '1') { echo 'selected'; } ?>>Laki-Laki</option>
                            <option value="0" <?php if($user['gender'] == '0') { echo 'selected'; } ?>>Perempuan</option>
                        </select>
                        <?php if ($validation->getError('gender')): ?>
                            <div class="form-txt-danger">
                                <?= $validation->getError('gender') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" id="username" value="<?= $user['username']; ?>" placeholder="Username">
                        <?php if ($validation->getError('username')): ?>
                            <div class="form-txt-danger">
                                <?= $validation->getError('username') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select name="isactive" id="isactive" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            <option value="1" <?php if($user['isactive'] == '1') { echo 'selected'; } ?>>Aktif</option>
                            <option value="0" <?php if($user['isactive'] == '0') { echo 'selected'; } ?>>Nonaktif</option>
                        </select>
                        <?php if ($validation->getError('isactive')): ?>
                            <div class="form-txt-danger">
                                <?= $validation->getError('isactive') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-9"></label>
                    <div class="col-sm-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>
