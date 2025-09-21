<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
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
        .error {
            color: red;
            font-weight: normal;
        }
        .btn-batal {
            margin-left: 10px;
            background-color: #d9534f;
            border-color: #d9534f;
        }
        .btn-batal:hover {
            background-color: #c9302c;
            border-color: #c12e2a;
        }
        form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group textarea {
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
        }
        .form-group input[type="submit"] {
            background-color: #5bc0de;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #31b0d5;
        }
    </style>
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";

        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        $(document).ready(function() {
            $('form').on('submit', function(event) {
                let input = $('input[name="jumlah_investasi"]').val();
                let cleanedInput = input.replace(/\./g, '');
                if (!$.isNumeric(cleanedInput)) {
                    event.preventDefault();
                    alert('Jumlah Investasi harus berupa angka.');
                } else {
                    $('input[name="jumlah_investasi"]').val(formatNumber(cleanedInput));
                }
            });
        });
    </script>
</head>
<body class="hold-transition skin-custom sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
            <h1>Edit Berita</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?php echo site_url('berita'); ?>">Data Berita</a></li>
                    <li class="active">Edit Berita</li>
                </ol>
            </section>
            
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Edit Berita</h3>
                    </div>
                    <div class="box-body">
                    <?php echo form_open_multipart('berita/update'); ?>
                    <input type="hidden" name="id" value="<?php echo $berita['id']; ?>" />
                    <input type="hidden" name="foto_existing" value="<?php echo $berita['foto']; ?>" />

                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" value="<?php echo set_value('nama_perusahaan', $berita['Nama_Perusahaan']); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="nama_user">Nama User</label>
                        <input type="text" name="nama_user" value="<?php echo set_value('nama_user', $berita['Nama_User']); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="alamat_usaha">Uraian Skala Usaha</label>
                        <textarea name="alamat_usaha"><?php echo set_value('alamat_usaha', $berita['Alamat_Usaha']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="uraian_skala_usaha">Uraian Skala Usaha</label>
                        <textarea name="uraian_skala_usaha"><?php echo set_value('uraian_skala_usaha', $berita['Uraian_Skala_Usaha']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" />
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                        <a href="<?php echo site_url('berita'); ?>" class="btn btn-danger btn-batal">Batal</a>
                    </div>
                    <?php echo form_close(); ?>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
