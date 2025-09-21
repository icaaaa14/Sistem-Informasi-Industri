<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Data Admin</title>
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
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Edit Data Admin</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url('data_admin/index'); ?>">Data Admin</a></li>
                <li class="active">Edit Data Admin</li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Detail Admin</h3>
                </div>
                <form action="<?php echo base_url('data_admin/update/' . $admin['email']); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($admin['nama']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo htmlspecialchars($admin['jabatan']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($admin['email']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo htmlspecialchars($admin['no_telp']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="sertifikat">Upload Sertifikat</label>
                            <input type="file" class="form-control" id="sertifikat" name="sertifikat">
                            <?php if (isset($error)) echo '<div class="error">'.htmlspecialchars($error).'</div>'; ?>
                            <?php if (!empty($admin['sertifikat'])): ?>
                                <input type="hidden" name="existing_upload" value="<?php echo htmlspecialchars($admin['sertifikat']); ?>"> 
                                <p>Current File: <a href="<?php echo base_url('sertifikat/' . htmlspecialchars($admin['sertifikat'])); ?>" target="_blank"><?php echo htmlspecialchars($admin['sertifikat']); ?></a></p>
                            <?php else: ?>
                                <input type="hidden" name="existing_upload" value="">
                                <p>No current file</p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="<?php echo base_url('data_admin'); ?>" class="btn btn-primary">Batal</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
