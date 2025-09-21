<!DOCTYPE html>
<html>
<head>
    <title>Hapus Admin</title>
    <link href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container">
        <h1>Hapus Admin</h1>
        <p>Apakah Anda yakin ingin menghapus data admin dengan email <strong><?php echo $admin['email']; ?></strong>?</p>
        <form action="<?php echo base_url('data_admin/delete/' . $admin['email']); ?>" method="post">
            <button type="submit" class="btn btn-danger">Hapus</button>
            <a href="<?php echo base_url('data_admin'); ?>" class="btn btn-primary">Batal</a>
        </form>
    </div>
</body>
</html>
