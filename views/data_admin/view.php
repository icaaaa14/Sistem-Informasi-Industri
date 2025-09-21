<!DOCTYPE html>
<html>
<head>
    <title>Detail Admin</title>
    <link href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container">
        <h1>Detail Admin</h1>
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td><?php echo $admin['nama']; ?></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td><?php echo $admin['jabatan']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $admin['email']; ?></td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td><?php echo $admin['no_telp']; ?></td>
            </tr>
            <tr>
                <th>Sertifikat</th>
                <td>
                    <?php if (!empty($admin['sertifikat']) && file_exists(FCPATH . 'uploads/' . $admin['sertifikat'])): ?>
                        <img src="<?php echo base_url('uploads/'.$admin['sertifikat']); ?>" alt="<?php echo $admin['nama']; ?>" width="150">
                    <?php else: ?>
                        <span>No Image</span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo $admin['password']; ?></td>
            </tr>
        </table>
        <a href="<?php echo base_url('data_admin'); ?>" class="btn btn-primary">Kembali ke Daftar Admin</a>
    </div>
</body>
</html>
