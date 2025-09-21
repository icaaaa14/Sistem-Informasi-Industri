<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />
    
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
</head>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Tambah Data Admin</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url('data_admin/index'); ?>">Data Administrator</a></li>
                <li class="active">Tambah Data Administrator</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Masukkan Detail Admin</h3>
                </div>
                <form role="form" method="post" action="<?php echo base_url('data_admin/add'); ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo isset($admin['nama']) ? $admin['nama'] : ''; ?>" required>
                        </div>   
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo isset($admin['jabatan']) ? $admin['jabatan'] : ''; ?>" required>
                        </div> 
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($admin['email']) ? $admin['email'] : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo isset($admin['no_telp']) ? $admin['no_telp'] : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Upload Sertifikat</label>
                            <input type="file" class="form-control" name="sertifikat">
                            <?php if (isset($error)) echo '<div class="error">'.$error.'</div>'; ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($admin['password']) ? $admin['password'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo site_url('data_admin'); ?>" class="btn btn-danger btn-batal">Batal</a>
                    </div>
                </form>
            </div>
        </section>
    </div>

</div>
</body>
</html>
