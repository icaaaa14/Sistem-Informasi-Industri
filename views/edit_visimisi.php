<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Visi Misi</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <!-- FontAwesome -->
    <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" />
    <!-- AdminLTE -->
    <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" />

    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>

    <script type="text/javascript">
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</head>
<body class="hold-transition skin-custom sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Edit Visi Misi</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?php echo site_url('VisiMisi'); ?>">Visi Misi</a></li>
                    <li class="active">Edit Visi Misi</li>
                </ol>
            </section>

            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Edit Visi Misi</h3>
                    </div>
                    <div class="box-body">
                    <!-- Display success/error messages -->
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <h3>Gambar Saat Ini:</h3>
                            <?php if ($gambar_visi_misi && $gambar_visi_misi['gambar']): ?>
                                <img src="<?php echo base_url('uploads/' . $gambar_visi_misi['gambar']); ?>" alt="Visi Misi" class="img-responsive" style="max-width: 100%;">
                            <?php else: ?>
                                <p>Tidak ada gambar saat ini.</p>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <h3>Ganti Gambar:</h3>
                            <?php echo form_open_multipart('VisiMisi/upload_gambar'); ?>
                            
                            <div class="form-group">
                                <label for="gambar">Pilih Gambar Baru</label>
                                <input type="file" name="gambar" id="gambar" class="form-control" required onchange="previewImage(event)">
                            </div>

                            <div class="form-group">
                                <label for="preview">Preview Gambar:</label>
                                <img id="preview" src="#" alt="Preview Gambar" class="img-responsive" style="display: none; max-width: 100%;">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Gambar</button>
                            <?php if (isset($error)): ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
