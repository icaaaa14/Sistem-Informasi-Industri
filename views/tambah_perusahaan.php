<!DOCTYPE html>
<html lang="en">
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: normal;
        }
    </style>
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
</head>
<body class="hold-transition skin-custom sidebar-mini">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Tambah Data Industri</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url('data_perusahaan'); ?>">Data Industri</a></li>
                <li class="active">Tambah Data Industri</li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Tambah Industri</h3>
                </div>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>


                <!-- Form Tambah Industri -->
                <form action="<?php echo site_url('Data_Perusahaan/simpan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nib">NIB</label>
                                    <input type="text" class="form-control" name="nib" id="nib" placeholder="Masukkan NIB Perusahaan" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_perusahaan">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Masukkan Nama Perusahaan">
                                </div>
                                <div class="form-group">
                                    <label for="uraian_status_penanaman_modal">Status Penanaman Modal</label>
                                    <input type="text" class="form-control" name="uraian_status_penanaman_modal" id="uraian_status_penanaman_modal" placeholder="Masukkan Uraian Status Penanaman Modal">
                                </div>
                                <div class="form-group">
                                    <label for="uraian_jenis_perusahaan">Jenis Perusahaan</label>
                                    <input type="text" class="form-control" name="uraian_jenis_perusahaan" id="uraian_jenis_perusahaan" placeholder="Masukkan Uraian Jenis Perusahaan">
                                </div>
                                <div class="form-group">
                                    <label for="uraian_risiko_proyek">Klasifikasi Risiko</label>
                                    <input type="text" class="form-control" name="uraian_risiko_proyek" id="uraian_risiko_proyek" placeholder="Masukkan Uraian Risiko Proyek">
                                </div>
                                <div class="form-group">
                                    <label for="nama_proyek">Nama Proyek</label>
                                    <input type="text" class="form-control" name="nama_proyek" id="nama_proyek" placeholder="Masukkan Nama Proyek">
                                </div>
                                <div class="form-group">
                                    <label for="uraian_skala_usaha">Uraian Skala Usaha</label>
                                    <input type="text" class="form-control" name="uraian_skala_usaha" id="uraian_skala_usaha" placeholder="Masukkan Uraian Skala Usaha">
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto:</label>
                                    <input type="file" class="form-control" name="foto">
                                    <?php if (isset($error)) echo '<div class="error">'.$error.'</div>'; ?>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_usaha">Alamat Usaha</label>
                                    <input type="text" class="form-control" name="alamat_usaha" id="alamat_usaha" placeholder="Masukkan Alamat Usaha">
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan_usaha">Kecamatan Usaha</label>
                                    <input type="text" class="form-control" name="kecamatan_usaha" id="kecamatan_usaha" placeholder="Masukkan Kecamatan Usaha">
                                </div>
                                <div class="form-group">
                                    <label for="kelurahan_usaha">Kelurahan Usaha</label>
                                    <input type="text" class="form-control" name="kelurahan_usaha" id="kelurahan_usaha" placeholder="Masukkan Kelurahan Usaha">
                                </div>
                                <div class="form-group">
                                    <label for="kbli">Kbli</label>
                                    <input type="text" class="form-control" name="kbli" id="kbli" placeholder="Masukkan Kbli">
                                </div>
                                <div class="form-group">
                                    <label for="judul_kbli">Judul Kbli</label>
                                    <input type="text" class="form-control" name="judul_kbli" id="judul_kbli" placeholder="Masukkan Judul Kbli">
                                </div>
                                <div class="form-group">
                                    <label for="nama_user">Nama Pemilik</label>
                                    <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Masukkan Nama User">
                                </div>
                                <div class="form-group">
                                    <label for="nomor_identitas_user">Nomor Identitas User</label>
                                    <input type="text" class="form-control" name="nomor_identitas_user" id="nomor_identitas_user" placeholder="Masukkan Nomor Identitas User">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telp">Nomor Telepon</label>
                                    <input type="tel" class="form-control" name="nomor_telp" id="nomor_telp" placeholder="Masukkan Nomor Telepon">
                                </div>
                                <div class="form-group">
                                    <label for="Jumlah_Investasi">Jumlah Investasi</label>
                                    <input type="tel" class="form-control" name="Jumlah_Investasi" id="Jumlah_Investasi" placeholder="Masukkan Nomor Jumlah Investasi">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo site_url('data_perusahaan'); ?>" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
