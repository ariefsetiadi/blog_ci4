<?= $this->extend('App\Views\layouts\cms') ?>

<?= $this->section('title') ?>
    Edit Kategori
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('cms/category') ?>" class="btn btn-secondary">Kembali</a>
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

            <form action="<?= base_url('cms/category/update/' . $category['id']) ?>" method="post">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Kategori</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="title" id="title" value="<?= $category['title']; ?>" placeholder="Nama Kategori">
                        <?php if ($validation->getError('title')): ?>
                            <div class="form-txt-danger">
                                <?= $validation->getError('title') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <textarea name="description" id="description" rows="5" class="form-control" placeholder="Deskripsi"><?= $category['description']; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select name="isactive" id="isactive" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            <option value="1" <?php if($category['isactive'] == '1') { echo 'selected'; } ?>>Aktif</option>
                            <option value="0" <?php if($category['isactive'] == '0') { echo 'selected'; } ?>>Nonaktif</option>
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
