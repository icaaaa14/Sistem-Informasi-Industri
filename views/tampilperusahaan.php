<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($perusahaan->nama_perusahaan) ? $perusahaan->nama_perusahaan : 'Detail Perusahaan'; ?></title>
    <style>
        *, html {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #526046;
            overflow: hidden;
            height: 80px;
            display: flex;
            align-items: center; 
            justify-content: center;
        }
        .navbar img {
            position: relative;
            right: 724px;
            width: 80px; 
            height: auto;
        }
        .back {
            display: flex;
            align-items: left; 
            justify-content: left; 
            margin: 20px; 
            text-decoration: none; 
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .back img {
            width: 40px; 
            height: auto;
        }
        .container {
            padding: 20px;
            text-align: left;
            margin-left: 20px;
        }
        .perusahaan-detail {
            display: flex; /* Flexbox untuk menata gambar dan teks secara horizontal */
            align-items: flex-start; /* Menjaga teks di atas gambar */
            gap: 20px;
        }
        .perusahaan-detail img {
            width: 20%;
            height: auto;
        }
        .perusahaan-teks {
            flex: 1;         
        }
    </style>
</head>
<body>
<div class="navbar">
        <div>
            <img src="/disperdagin/assets/image/logo.png" >
        </div>
    </div>
    <a class="back" href="<?php echo site_url('daftar'); ?>">
        <img src="/disperdagin/assets/image/back.png">
    </a>
    <div class="container">
        <?php if (isset($perusahaan) && $perusahaan !== null): ?>
            <h1>Detail Perusahaan</h1>
            <div class="perusahaan-detail">
                <?php if (!empty($perusahaan->gambar)): ?>
                    <img src="<?php echo base_url('uploads/' . $perusahaan->gambar); ?>" alt="<?php echo htmlspecialchars($perusahaan->nama_perusahaan); ?>">
                <?php else: ?>
                    <img src='/disperdagin/assets/image/default.jpg' alt='Default Image'>
                <?php endif; ?>
                <div class="perusahaan-teks">
                    <h3><?php echo htmlspecialchars($perusahaan->nama_perusahaan); ?></h3>
                    <p>Alamat: <?php echo htmlspecialchars($perusahaan->alamat); ?></p>
                    <p><?php echo htmlspecialchars($perusahaan->deskripsi); ?></p>
                </div>
            </div>
        <?php else: ?>
            <p>Tidak ada data perusahaan yang dipilih.</p>
        <?php endif; ?>
    </div>
</body>
</html>
