<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Dokumentasi</title>
    <link href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container">
        <h1>Delete Dokumentasi</h1>
        <p>Are you sure you want to delete this entry?</p>
        
        <div class="card">
            <div class="card-body">
                <h4>ID: <?php echo $dokumentasi['id']; ?></h4>
                <img src="<?php echo base_url('uploads/' . $dokumentasi['filename']); ?>" alt="Dokumentasi" style="width: 100%; height: auto;">
                <p>Filename: <?php echo $dokumentasi['filename']; ?></p>
            </div>
        </div>

        <form method="post" action="<?php echo base_url('dokumentasi/delete/' . $dokumentasi['id']); ?>">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="<?php echo base_url('dokumentasi'); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
