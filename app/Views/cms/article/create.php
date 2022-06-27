<?= $this->extend('App\Views\layouts\cms') ?>

<?= $this->section('title') ?>
    Tambah Artikel
<?= $this->endSection() ?>

<?= $this->section('header') ?>
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

        <?php $validation = \Config\Services::validation(); ?>

        <form action="<?= base_url('cms/article/save') ?>" method="post" class="form-horizontal">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Judul Artikel</label>
                    <input type="text" name="title" id="title" class="form-control <?php if($validation->getError('title')){ echo 'is-invalid'; } ?>" value="<?= old('title'); ?>" placeholder="Judul Artikel">
                    <?php if ($validation->getError('title')): ?>
                        <span class="error invalid-feedback">
                            <?= $validation->getError('title') ?>
                        </span>                                
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="category_id">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control <?php if($validation->getError('category_id')){ echo 'is-invalid'; } ?>">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach($categories as $row) { ?>
                                    <option value="<?= $row['id'] ?>" <?php if(old('category_id') == $row['id']) { echo 'selected'; } ?>><?= $row['title'] ?></option>
                                <?php } ?>
                            </select>
                            <?php if ($validation->getError('category_id')): ?>
                                <span class="error invalid-feedback">
                                    <?= $validation->getError('category_id') ?>
                                </span>                                
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="img">Thumbnail</label>
                            <div class="input-group <?php if($validation->getError('img')){ echo 'is-invalid'; } ?>">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img" id="img">
                                    <label class="custom-file-label" for="img">Pilih Thumbnail</label>
                                </div>
                            </div>
                            <?php if ($validation->getError('img')): ?>
                                <span class="error invalid-feedback">
                                    <?= $validation->getError('img') ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea name="content" id="content" rows="5" class="form-control <?php if($validation->getError('content')){ echo 'is-invalid'; } ?>" placeholder="Konten"><?= old('content'); ?></textarea>
                    <?php if ($validation->getError('content')): ?>
                        <span class="error invalid-feedback">
                            <?= $validation->getError('content') ?>
                        </span>                                
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
        <!-- bs-custom-file-input -->
        <script src="<?= base_url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>

    <!-- Summernote CDN JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#content').summernote({
                height: '300px'
            });
        });

        $(function () {
            bsCustomFileInput.init();
        });
    </script>
<?= $this->endSection() ?>
