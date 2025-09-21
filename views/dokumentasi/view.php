<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $pageTitle; ?></title>
    <link href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container">
        <h1><?php echo $pageTitle; ?></h1>
        
        <div class="card">
            <div class="card-body">
                <h4>ID: <?php echo $dokumentasi['id']; ?></h4>
                <img src="<?php echo base_url('uploads/' . $dokumentasi['filename']); ?>" alt="Dokumentasi" style="width: 100%; height: auto;">
                <p>Foto/Video: <?php echo $dokumentasi['filename']; ?></p>
            </div>
        </div>

        <a href="<?php echo base_url('dokumentasi'); ?>" class="btn btn-secondary">Back to List</a>
    </div>
</body>
</html>
