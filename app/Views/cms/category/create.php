<?= $this->extend('App\Views\layouts\cms') ?>

<?= $this->section('title') ?>
    Tambah Kategori
<?= $this->endSection() ?>

<?= $this->section('header') ?>
    Tambah Kategori
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('cms/category') ?>" class="btn btn-secondary">Kembali</a>
        </div>

        <?php $validation = \Config\Services::validation(); ?>

        <form action="<?= base_url('cms/category/save') ?>" method="post" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="title">Nama Kategori</label>
                            <input type="text" class="form-control <?php if($validation->getError('title')){ echo 'is-invalid'; } ?>" name="title" id="title" value="<?= old('title'); ?>" placeholder="Nama Kategori">
                            <?php if ($validation->getError('title')): ?>
                                <span class="error invalid-feedback">
                                    <?= $validation->getError('title') ?>
                                </span>                                
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label id="isactive">Status</label>
                            <select name="isactive" id="isactive" class="form-control <?php if($validation->getError('isactive')){ echo 'is-invalid'; } ?>">
                                <option value="">-- Pilih Status --</option>
                                <option value="1" <?php if(old('isactive') == '1') { echo 'selected'; } ?>>Aktif</option>
                                <option value="0" <?php if(old('isactive') == '0') { echo 'selected'; } ?>>Nonaktif</option>
                            </select>
                            <?php if ($validation->getError('isactive')): ?>
                                <spab class="error invalid-feedback">
                                    <?= $validation->getError('isactive') ?>
                                </spab>                                
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="Deskripsi"><?= old('description'); ?></textarea>
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
