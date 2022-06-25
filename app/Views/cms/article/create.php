<?= $this->extend('App\Views\layouts\cms') ?>

<?= $this->section('title') ?>
    Tambah Artikel
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <!-- Summernote CDN Css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('cms/article') ?>" class="btn btn-secondary">Kembali</a>
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

            <form action="<?= base_url('cms/article/save') ?>" method="post">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Kategori</label>
                    <div class="col-sm-9">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach($categories as $row) { ?>
                                <option value="<?= $row['id'] ?>" <?php if(old('category_id') == $row['id']) { echo 'selected'; } ?>><?= $row['title'] ?></option>
                            <?php } ?>
                        </select>
                        <?php if ($validation->getError('category_id')): ?>
                            <div class="form-txt-danger">
                                <?= $validation->getError('category_id') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Thumbnail</label>
                    <div class="col-sm-9">
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                        <?php if ($validation->getError('thumbnail')): ?>
                            <div class="form-txt-danger">
                                <?= $validation->getError('thumbnail') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" id="title" class="form-control" value="<?= old('title'); ?>" placeholder="Judul">
                        <?php if ($validation->getError('title')): ?>
                            <div class="form-txt-danger">
                                <?= $validation->getError('title') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Konten</label>
                    <div class="col-sm-9">
                        <textarea name="content" id="content" rows="5" class="form-control" placeholder="Konten"><?= old('content'); ?></textarea>
                        <?php if ($validation->getError('content')): ?>
                            <div class="form-txt-danger">
                                <?= $validation->getError('content') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-9"></label>
                    <div class="col-sm-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mr-1" value="0">Draft</button>
                        <button type="submit" class="btn btn-primary ml-1" value="1">Publish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <!-- Summernote CDN JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#content').summernote({
                height: '300px'
            });
        });
    </script>
<?= $this->endSection() ?>
