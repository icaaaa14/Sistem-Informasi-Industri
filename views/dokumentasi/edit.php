<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Dokumentasi</title>
    <!-- Include CSS and JS as needed -->
</head>
<body>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Edit Dokumentasi</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url('dokumentasi/index'); ?>">Data Dokumentasi</a></li>
                <li class="active">Edit Dokumentasi</li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Dokumentasi</h3>
                </div>
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <?php echo form_open_multipart('dokumentasi/update/' . $dokumentasi['id'], array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="id" class="col-sm-2 control-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" value="<?php echo set_value('id', $dokumentasi['id']); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="filename" class="col-sm-2 control-label">Foto/Video</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="filename" name="filename" accept="video/*,image/*">
                            <small class="form-text text-muted">Foto/Video saat ini:</small>
                            <div id="preview-container">
                                <?php if (isset($dokumentasi['filename'])): ?>
                                    <?php $file_ext = pathinfo($dokumentasi['filename'], PATHINFO_EXTENSION); ?>
                                    <?php if (in_array($file_ext, ['jpg', 'jpeg', 'png'])): ?>
                                        <img src="<?php echo base_url('uploads/' . $dokumentasi['filename']); ?>" alt="Dokumentasi" style="max-width: 100%; height: auto;">
                                    <?php elseif (in_array($file_ext, ['mp4', 'avi', 'mov'])): ?>
                                        <video width="320" height="240" controls>
                                            <source src="<?php echo base_url('uploads/' . $dokumentasi['filename']); ?>" type="video/<?php echo $file_ext; ?>">
                                            Your browser does not support the video tag.
                                        </video>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
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

    <script>
        document.getElementById('filename').addEventListener('change', function() {
            var file = this.files[0];
            var previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = ''; // Clear previous previews
            
            if (file) {
                var fileURL = URL.createObjectURL(file);
                var fileExt = file.name.split('.').pop().toLowerCase();
                
                if (['jpg', 'jpeg', 'png'].includes(fileExt)) {
                    var img = document.createElement('img');
                    img.src = fileURL;
                    img.style.maxWidth = '50%';
                    img.style.height = 'auto';
                    previewContainer.appendChild(img);
                } else if (['mp4', 'avi', 'mov'].includes(fileExt)) {
                    var video = document.createElement('video');
                    video.width = 500;
                    video.height = 400;
                    video.controls = true;
                    
                    var source = document.createElement('source');
                    source.src = fileURL;
                    source.type = 'video/' + fileExt;
                    
                    video.appendChild(source);
                    previewContainer.appendChild(video);
                }
            }
        });
    </script>
</body>
</html>
