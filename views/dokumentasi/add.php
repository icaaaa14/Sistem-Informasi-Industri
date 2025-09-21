<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

</head>
<body class="hold-transition skin-custom sidebar-mini">
    <!-- Content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Tambah Dokumentasi</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url('dokumentasi'); ?>">Dokumentasi</a></li>
                <li class="active">Tambah Dokumentasi</li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Upload Foto/Video</h3>
                </div>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

                <?php echo form_open_multipart('Dokumentasi/add', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
                <div class="box-body">
                    <div class="form-group" action="<?= site_url('Dokumentasi/handle_upload'); ?>" method="post" enctype="multipart/form-data">
                        <label for="filename" class="col-sm-2 control-label">Foto/Video:</label>
                        <div class="col-sm-10">
                        <input type="file" name="filename" id="filename" value="<?= isset($_SESSION['uploaded_file']['name']) ? $_SESSION['uploaded_file']['name'] : '' ?>" />

                            <!-- Menampilkan pesan error jika ada -->
                            <?php if (isset($error)) { ?>
                                <div class="error" style="color: red; margin-top: 5px;">
                                    <?php echo $error; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo site_url('dokumentasi'); ?>" class="btn btn-danger">Batal</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </section>
    </div>
</body>
</html>
