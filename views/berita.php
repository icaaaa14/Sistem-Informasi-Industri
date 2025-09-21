<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Berita</title>
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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .table thead tr {
            background-color: #5cb281;
        }
    </style>
</head>
<body>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Data Berita</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Berita</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Berita</h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo site_url('Berita/tambah'); ?>" class="btn btn-primary btn-sm">Tambah Berita</a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Nama Pemilik</th>
                                <th>Alamat Usaha</th>
                                <th>Uraian Skala Usaha</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($berita)): ?>
                            <?php foreach ($berita as $row): ?>
                                <tr>
                                    <td><?php echo $row['Nama_Perusahaan']; ?></td>
                                    <td><?php echo $row['Nama_User']; ?></td>
                                    <td><?php echo $row['Alamat_Usaha']; ?></td>
                                    <td><?php echo $row['Uraian_Skala_Usaha']; ?></td>
                                    <td>
                                        <?php if ($row['foto']): ?>
                                            <img src="<?php echo base_url('uploads/'.$row['foto']); ?>" alt="<?php echo $row['Nama_Perusahaan']; ?>" width="100">
                                        <?php else: ?>
                                            <span>No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('Berita/edit/'.$row['id']); ?>" class="btn btn-warning btn-sm btn-action">Edit</a>
                                        <a href="<?php echo site_url('Berita/hapus/'.$row['id']); ?>" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Are you sure you want to delete this item?');">Hapus</a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">Data tidak tersedia.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
</>
</html>
