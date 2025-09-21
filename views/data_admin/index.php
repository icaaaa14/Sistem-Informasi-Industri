<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins -->
    <link href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />

    <style>
        .btn-action {
            margin-right: 5px;
            display: inline-block;
            width: 80px;
            text-align: center;
            padding: 4px;
            font-size: 14px;
        }
        .btn-info, .btn-warning, .btn-danger {
            margin-right: 10px;
        }
        .table thead tr {
            background-color: #5cb281;
        }
        .table th {
            text-align: center;
        }
    </style>
    
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
</head>
<body>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Administrator</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Administrator</li>
            </ol>
        </section>

        <!-- Main Wrapper -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Data Administrator</h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo site_url('Data_admin/add'); ?>" class="btn btn-primary btn-sm">Tambah Data</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Email</th>
                                <th>No Telepon</th>
                                <th>Sertifikat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_admin as $item): ?>
                                    <tr>
                                        <td><?php echo $item['nama']; ?></td>
                                        <td><?php echo $item['jabatan']; ?></td>
                                        <td><?php echo $item['email']; ?></td>
                                        <td><?php echo $item['no_telp']; ?></td>
                                        <td>
                                            <?php if (!empty($item['sertifikat']) && file_exists(FCPATH . 'uploads/' . $item['sertifikat'])): ?>
                                                <img src="<?php echo base_url('uploads/'.$item['sertifikat']); ?>" alt="<?php echo $item['sertifikat']; ?>" width="100">
                                            <?php else: ?>
                                                <span>No Image</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('data_admin/view/'. $item['email']); ?>" class="btn btn-info btn-action" target="_blank">Lihat</a>
                                            <a href="<?php echo base_url('data_admin/edit/' . $item['email']); ?>" class="btn btn-warning btn-action">Edit</a>
                                            <a href="javascript:void(0);" 
                                               class="btn btn-danger btn-action btn-delete" 
                                               data-url="<?php echo base_url('data_admin/delete/' . $item['email']); ?>">
                                               Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus data ini?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="#" id="confirmDeleteButton" class="btn btn-primary">Hapus</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Script Modal -->
    <script type="text/javascript">
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            var deleteUrl = $(this).attr('data-url'); // Ambil URL dari atribut data-url
            $('#confirmDeleteButton').attr('href', deleteUrl); // Set URL ke tombol modal
            $('#deleteModal').modal('show'); // Tampilkan modal
        });
    </script>
</body>
</html>