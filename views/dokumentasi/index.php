<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dokumentasi</title>
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

    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .table th.id-column, .table td.id-column {
            width: 5%; /* Ukuran kolom ID diperkecil */
            text-align: center; /* Pusatkan teks */
            font-size: 1em; /* Ukuran font standar */
            padding: 5px; /* Tambahkan sedikit padding */
        }

        .table th.aksi-column, .table td.aksi-column {
            width: 30%; /* Perkecil ukuran kolom Aksi */
            text-align: center; /* Posisikan konten di tengah */
        }
        .table thead tr {
            background-color: #5cb281;
        }
        .table th, .table td {
            text-align: center; /* Pusatkan konten secara horizontal */
            vertical-align: middle; /* Pusatkan konten secara vertikal */
        }
        .table td img, .table td video {
            max-width: 300px; /* Perbesar ukuran maksimum gambar/video */
            max-height: 200px; /* Tetapkan tinggi maksimum untuk menjaga proporsi */
            display: block; /* Membuat elemen blok */
            margin: 0 auto; /* Pusatkan secara horizontal */
            border: 1px solid #ccc; /* Tambahkan border untuk tampilan lebih rapi */
            border-radius: 5px; /* Tambahkan border radius untuk sudut melengkung */
        }
    </style>
</head>
<body class="hold-transition skin-custom sidebar-mini">
         <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Dokumentasi</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Tabel Dokumentasi</li>
                </ol>
            </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Dokumentasi</h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo site_url('Dokumentasi/add'); ?>" class="btn btn-primary btn-sm">Tambah Data</a>
                    </div>
                </div>
                <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="id-column">ID</th>
                                <th>Foto/Video</th>
                                <th class="aksi-column">Aksi</th>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php foreach ($dokumentasi as $item): ?>
                            <tr>
                                <td class="id-column"><?php echo $item['id']; ?></td>
                                <td>
                                    <?php if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $item['filename'])): ?>
                                        <img src="<?php echo base_url('uploads/' . $item['filename']); ?>" alt="Dokumentasi">
                                    <?php elseif (preg_match('/\.(mp4|webm|ogg)$/i', $item['filename'])): ?>
                                        <video controls>
                                            <source src="<?php echo base_url('uploads/' . $item['filename']); ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    <?php else: ?>
                                        File tidak dikenal
                                    <?php endif; ?>
                                </td>
                                <td class="aksi-column">
                                    <a href="<?php echo base_url('uploads/' . $item['filename']); ?>" class="btn btn-info" target="_blank">Lihat</a>
                                    <a href="javascript:void(0);" 
                                        class="btn btn-danger btn-action btn-delete" 
                                        data-url="<?php echo base_url('Dokumentasi/delete/' . $item['id']); ?>">
                                        Hapus
                                    </a>  
                                    <?php if ($item['status'] == 1): ?>
                                        <a href="<?php echo base_url('dokumentasi/publish/' . $item['id']); ?>" class="btn btn-success">Publish</a>
                                    <?php else: ?>
                                        <a href="<?php echo base_url('dokumentasi/publish/' . $item['id']); ?>" class="btn btn-warning">Unpublish</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                    <button type="button" id="confirmDeleteButton" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk Proses Hapus -->
    <script type="text/javascript">
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            var deleteUrl = $(this).data('url'); 
            if (deleteUrl) {
                $('#confirmDeleteButton').data('url', deleteUrl); 
                $('#deleteModal').modal('show'); 
            } else {
                alert('URL untuk penghapusan tidak ditemukan!');
            }
        });

        $('#confirmDeleteButton').on('click', function(e) {
            e.preventDefault();
            var deleteUrl = $(this).data('url'); 
            if (deleteUrl) {
                $.ajax({
                    url: deleteUrl,
                    type: 'POST',
                    success: function(response) {
                        $('#deleteModal').modal('hide'); 
                        location.reload(); 
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + error);
                    }
                });
            } else {
                alert('URL untuk penghapusan tidak valid!');
            }
        });
    </script>
</body>
</html>
