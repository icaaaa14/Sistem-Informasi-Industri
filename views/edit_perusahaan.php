<?php
    $pageTitle = "Edit Data Industri"; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Data Perusahaan</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Tema style -->
    <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins -->
    <link href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />

    <style>
        .error {
            color: red;
            font-weight: normal;
        }
        .form-horizontal .form-group {
            margin-left: 0;
            margin-right: 0;
        }
        .form-group {
            margin-bottom: 1rem;
        }
    </style>
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-custom sidebar-mini">
    <!-- Konten Utama -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Edit Data Industri</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url('data_perusahaan'); ?>">Data Industri</a></li>
                <li class="active">Edit Data Industri</li>
            </ol>
        </section>

        <!-- Konten utama -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Edit Data Perusahaan</h3>
                </div>
                <?php if (isset($perusahaan)): ?>
                    <!-- Dalam form, pastikan ada enctype -->
                <form action="<?php echo site_url('Data_Perusahaan/update/' . htmlspecialchars($perusahaan->Id, ENT_QUOTES, 'UTF-8')); ?>" 
                    method="post" 
                    class="form-horizontal" 
                    enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nib">Nib</label>
                                        <input type="text" class="form-control" id="nib" name="nib" value="<?php echo htmlspecialchars($perusahaan->Id ?? '', ENT_QUOTES, 'UTF-8'); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_perusahaan">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?php echo htmlspecialchars($perusahaan->Nama_Perusahaan ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="uraian_status_penanaman_modal">Status Penanaman Modal</label>
                                        <input type="text" class="form-control" id="uraian_status_penanaman_modal" name="uraian_status_penanaman_modal" value="<?php echo htmlspecialchars($perusahaan->Uraian_Status_Penanaman_Modal ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="uraian_jenis_perusahaan">Jenis Perusahaan</label>
                                        <input type="text" class="form-control" id="uraian_jenis_perusahaan" name="uraian_jenis_perusahaan" value="<?php echo htmlspecialchars($perusahaan->Uraian_Jenis_Perusahaan ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="uraian_risiko_proyek">Klasifikasi Risiko</label>
                                        <input type="text" class="form-control" id="uraian_risiko_proyek" name="uraian_risiko_proyek" value="<?php echo htmlspecialchars($perusahaan->Uraian_Risiko_Proyek ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_proyek">Nama Proyek</label>
                                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="<?php echo htmlspecialchars($perusahaan->nama_proyek ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="uraian_skala_usaha">Skala Usaha</label>
                                        <input type="text" class="form-control" id="uraian_skala_usaha" name="uraian_skala_usaha" value="<?php echo htmlspecialchars($perusahaan->Uraian_Skala_Usaha ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <?php if(!empty($perusahaan->foto)): ?>
                                            <div class="mb-2">
                                                <img src="<?php echo base_url('uploads/'.$perusahaan->foto); ?>" 
                                                    alt="Foto Saat Ini" 
                                                    class="img-thumbnail" 
                                                    style="max-width: 200px;">
                                            </div>
                                        <?php endif; ?>
                                        <input type="file" class="form-control" id="foto" name="foto">
                                        <small class="text-muted">Format: JPG, JPEG, PNG, GIF (Max. 2MB)</small>
                                        <?php if($this->session->flashdata('error')): ?>
                                            <div class="text-danger"><?php echo $this->session->flashdata('error'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_usaha">Alamat Usaha</label>
                                        <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha" value="<?php echo htmlspecialchars($perusahaan->Alamat_Usaha ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan_usaha">Kecamatan Usaha</label>
                                        <input type="text" class="form-control" id="kecamatan_usaha" name="kecamatan_usaha" value="<?php echo htmlspecialchars($perusahaan->kecamatan_usaha ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="kelurahan_usaha">Kelurahan Usaha</label>
                                        <input type="text" class="form-control" id="kelurahan_usaha" name="kelurahan_usaha" value="<?php echo htmlspecialchars($perusahaan->kelurahan_usaha ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="kbli">KBLI</label>
                                        <input type="text" class="form-control" id="kbli" name="kbli" value="<?php echo htmlspecialchars($perusahaan->Kbli ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="judul_kbli">Judul KBLI</label>
                                        <input type="text" class="form-control" id="judul_kbli" name="judul_kbli" value="<?php echo htmlspecialchars($perusahaan->Judul_Kbli ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_user">Nama Pemilik</label>
                                        <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?php echo htmlspecialchars($perusahaan->Nama_User ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_identitas_user">Nomor Identitas</label>
                                        <input type="text" class="form-control" id="nomor_identitas_user" name="nomor_identitas_user" value="<?php echo htmlspecialchars($perusahaan->Nomor_Identitas_User ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($perusahaan->Email ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" value="<?php echo htmlspecialchars($perusahaan->Nomor_Telp ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_investasi">Jumlah Investasi</label>
                                        <input type="numeric" class="form-control" id="jumlah_investasi" name="jumlah_investasi" value="<?php echo htmlspecialchars($perusahaan->Jumlah_Investasi ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo site_url('data_perusahaan'); ?>" class="btn btn-default">Batal</a>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="alert alert-danger">Data perusahaan tidak ditemukan.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
