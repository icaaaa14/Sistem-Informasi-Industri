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
    </style>
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";

        // Function to format number with thousands separator
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        $(document).ready(function() {
            $('form').on('submit', function(event) {
                let input = $('input[name="jumlah_investasi"]').val();
                let cleanedInput = input.replace(/\./g, ''); // Remove existing dots
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
          <h1>Tambah Berita</h1>
          <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url('berita'); ?>">Data Berita</a></li>
                <li class="active">Tambah Berita</li>
            </ol>
        </section>
        
        <section class="content">
          <div class="box box-primary">
            <div class="box-header with-border">
      
            <div class="box-body">
              <?php echo form_open_multipart('berita/tambah'); ?>
              <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan:</label>
                <input type="text" class="form-control" name="nama_perusahaan" value="<?php echo set_value('nama_perusahaan'); ?>">
                <?php echo form_error('nama_perusahaan'); ?>
              </div>
              <div class="form-group">
                <label for="nama_user">Nama User:</label>
                <input type="text" class="form-control" name="nama_user" value="<?php echo set_value('nama_user'); ?>">
                <?php echo form_error('nama_user'); ?>
              </div>
              <div class="form-group">
                <label for="alamat_usaha">Alamat Usaha:</label>
                <textarea class="form-control" name="alamat_usaha"><?php echo set_value('alamat_usaha'); ?></textarea>
                <?php echo form_error('alamat_usaha'); ?>
              </div>
              <div class="form-group">
                <label for="uraian_skala_usaha">Skala Usaha:</label>
                <textarea class="form-control" name="uraian_skala_usaha"><?php echo set_value('uraian_skala_usaha'); ?></textarea>
                <?php echo form_error('uraian_skala_usaha'); ?>
              </div>
              <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control" name="foto">
                <?php if (isset($error)) echo '<div class="error">'.$error.'</div>'; ?>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo site_url('berita'); ?>" class="btn btn-danger btn-batal">Batal</a>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </section>
      </div>

    </div>
  </body>
</html>
