<?= $this->extend('App\Views\layouts\cms') ?>

<?= $this->section('title') ?>
    Data Kategori
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <!-- DataTable CDN CSS -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <style>
        .dataTables_filter {
            display: flex;
            justify-content: end;
        }

        .dataTables_paginate {
            display: flex;
            justify-content: end;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('cms/category/add') ?>" class="btn btn-sm btn-outline-primary">TAMBAH</a>
        </div>

        <div class="card-block">
            <?php
                if(session()->has('success')) {
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php
                }
            ?>

            <table id="data" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation -->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="confirmModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center my-3">
                        <img src="<?= base_url('assets/images/confirm.svg') ?>">
                        <h5 class="my-3" style="color: #1f1f1f">Anda Yakin Ingin Menghapus Kategori Ini?</h5>
                        <button type="button" class="btn btn-secondary mr-1" id="btnNo" data-dismiss="modal">Batal</button>
                        <a href="javascript:void(0)" role="button" class="btn btn-danger ml-1" id="btnYes">Ya, Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <!-- DataTable CDN JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#data').DataTable({
                processing: true,
                serverSide: true,
                order: [],
                ajax: "<?= site_url('cms/category/loadData') ?>",
                columns: [
                    {data: 'no', orderable: false, searchable: false},
                    {data: 'title'},
                    {data: 'description'},
                    {data: 'isactive', searchable: false},
                    {data: 'action', orderable: false, searchable: false}
                ],
                columnDefs: [
                    {targets: 0, class: 'text-center'},
                    {targets: 3, class: 'text-center', width: '10%'},
                    {targets: 4, class: 'text-center', width: '20%'},
                ]
            });
        });

        function confirmDelete(el) {
            $("#btnYes").attr("href", el.dataset.href);
            $("#confirmModal").modal('show');
        }
    </script>
<?= $this->endSection() ?>
