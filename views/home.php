<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Disperdagin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
            background-color: #5cb281;
            overflow: hidden;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .navbar img {
            width: 80px;
            height: auto;
            position: absolute;
            left: 20px;
            bottom: 1px;
        }
        .navbar .menu {
            display: flex;
            align-items: center;
        }
        .navbar a {
            margin-left: 15px;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-family: Arial, sans-serif;
        }
        .navbar a:hover {
            background-color: #4a9b6e;
            color: white;
            border-radius: 15px;
        }
        .navbar .login {
            background-color: #4a9b6e;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 15px;
            cursor: pointer;
            text-decoration: none;
            position: absolute;
            right: 20px;
        }
        .navbar .login:hover {
            background-color: #6dbd86;
        }
        .header {
            padding: 350px;
            text-align: center;
            background: #f1f1f1;
            background-image: url('/disperdagin/assets/image/bg4.png');
            background-size: cover;
            background-position: center;
        }
        .header img {
            width: 100%;
            height: auto;
        }
        .content {
            padding: 20px;
            text-align: left;
        }
        .perusahaan-container {
            text-align: left; /* Agar kotak tetap diatur sesuai alur konten */
            padding: 20px; /* Ruang di sekitar grid */
        }

        .perusahaan {
            display: inline-block;
            flex: 0 0 auto;
            width: 325px; /* Lebar tetap untuk setiap kotak */
            height: 350px; /* Tinggi tetap untuk setiap kotak */
            padding: 15px;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.2);
            background-color: #5cb281;
            color: white;
            box-sizing: border-box;
            overflow: hidden;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            vertical-align: top; /* Agar kotak tidak menurun jika ada ruang */
        }

        .perusahaan-container, .dokumentasi-container {
            display: flex;
            justify-content: center; /* Menjaga item tetap berada di tengah */
            gap: 20px; /* Memberikan jarak antar item */
            flex-wrap: nowrap; /* Mencegah item berpindah baris */
            overflow-x: auto; /* Enable horizontal scrolling jika item terlalu banyak */
        }

        .perusahaan img {
            width: 100%;
            height: 150px; /* Tinggi gambar tetap */
            object-fit: cover;
            margin-bottom: 10px;
        }

        .perusahaan h3, .perusahaan p {
            margin: 5px 0;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .perusahaan:hover {
            transform: scale(1.03);
            box-shadow: 2px 4px 20px rgba(0, 0, 0, 0.3);
        }

        .perusahaan p {
            font-size: 0.9em;
            margin: 5px 0;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .perusahaan a {
            text-decoration: none; 
            color: black; 
        }
        .dokumentasi h2{
            font-size: 30px;
            padding: 20px;
            text-align: left;
        }
        .footer .images img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 10px;
        }
        .visi-misi {
            padding: 0;
            margin: 20px auto; /* Jarak atas dan bawah, dan tengah */
            display: flex; /* Menjadikan container flex */
            justify-content: center; /* Memposisikan konten secara horizontal di tengah */
            align-items: center; /* Memposisikan konten secara vertikal di tengah */
        }

        .visi-misi-image {
            width: 80%; /* Gambar memenuhi lebar container */
            height: auto; /* Sesuaikan tinggi gambar dengan lebar */
            display: block; /* Menghilangkan jarak bawah gambar */
            border-radius: 10px; /* Opsional: Radius sudut gambar */
        }
        .footer {
            background-color: #5cb281;
            padding: 40px;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        .footer .contact-item {
            text-align: center;
            margin: 10px 20px;
            font-weight: bold;
        }
        .footer .contact-item img {
            display: block;
            margin: 0 auto 10px;
            width: 30px;
            height: auto;
        }
        .footer .contact-item p, .footer .contact-item a {
            margin: 0;
            color: #333;
            text-decoration: none;
        }
        .footer .contact-item a {
            font-weight: bold;
        }
        .footer .contact-item a:hover {
            text-decoration: underline;
        }
        .dokumentasi-container {
            margin-left: 20px;
            margin-right: 20px;
            display: flex; /* Flexbox untuk menyusun item secara horizontal */
            justify-content: center;
            overflow-x: auto; /* Enable horizontal scrolling */
            white-space: nowrap; /* Mencegah line breaks */
            padding: 10px 0; /* Ruang atas dan bawah */
            gap: 10px; /* Jarak antar item */
            flex-wrap: nowrap;
            overflow-x: auto;
        }

        .dokumentasi-item {
            display: inline-block; /* Agar item bisa ditempatkan di samping satu sama lain */
            width: 300px; /* Lebar item, bisa disesuaikan dengan ukuran yang diinginkan */
            box-sizing: border-box;
            flex: 0 0 auto; /* Prevent items from shrinking */
        }

        .dokumentasi-item img, .dokumentasi-item video {
            width: 100%; /* Agar gambar dan video mengisi lebar container item */
            height: auto;
            cursor: pointer; /* Menunjukkan bahwa item bisa diklik */
        }
        .dokumentasi-item img:hover, .dokumentasi-item video:hover {
            transform: scale(1.1); /* Membesarkan gambar saat hover */
            z-index: 1; /* Pastikan gambar di atas item lain */
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.8);
        }
        .modal-content {
            margin: 15% auto;
            padding: 20px;
            width: 80%;
            max-width: 700px;
        }
        .modal-content img, .modal-content video {
            width: 100%;
            height: auto;
        }
        .close {
            color: #fff;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }


    </style>
</head>
<body>
    <div class="navbar">
    <div>
        <img src="/disperdagin/assets/image/logo.png" >
    </div>
        <a href="<?php echo site_url('home'); ?>">Home</a>
        <a href="<?php echo site_url('daftar'); ?>">Daftar Industri</a>
        <a href="<?php echo site_url('about'); ?>">About Us</a>
        <a class="login" href="<?php echo site_url('login'); ?>">Login</a>
    </div>
    <div class="header">
        <img url='/disperdagin/assets/image/bg3.png'>
    </div> 
    <div class="content">
        <h1>TOP 5 PERUSAHAAN INVESTASI TERTINGGI</h1>
        <div class="perusahaan-container">
            <?php foreach ($perusahaan as $p): ?>
                <div class="perusahaan">
                <?php if (!empty($p->foto) && file_exists('./uploads/' . $p->foto)): ?>
                    <img src="<?php echo base_url('uploads/' . $p->foto); ?>" alt="<?php echo htmlspecialchars($p->Nama_Perusahaan); ?>">
                <?php else: ?>
                    <img src='/disperdagin/assets/image/perusahaan.jpg' alt='Default Image'>
                <?php endif; ?>
                        <h3><?php echo htmlspecialchars($p->Nama_Perusahaan); ?></h3>
                        <p>Nama Pemilik: <?php echo htmlspecialchars($p->Nama_User); ?></p>
                        <p>Alamat: <?php echo htmlspecialchars($p->Alamat_Usaha); ?></p>
                        <p>Skala Usaha: <?php echo htmlspecialchars($p->Uraian_Skala_Usaha); ?></p>
                        <p>Jumlah Investasi: Rp <?php echo number_format($p->Jumlah_Investasi, 0, ',', '.'); ?></p> <!-- Menampilkan investasi dengan format Rupiah -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="dokumentasi">
    <h2>DOKUMENTASI</h2>
    <div class="dokumentasi-container">
        <?php foreach ($dokumentasi as $item): ?>
            <div class="dokumentasi-item">
                <?php if ($item['tipe'] == 'foto'): ?>
                    <img src="<?php echo base_url('uploads/' . $item['filename']); ?>" alt="Dokumentasi" onclick="openModal(this.src)">
                <?php elseif ($item['tipe'] == 'video'): ?>
                    <video controls>
                        <source src="<?php echo base_url('uploads/' . $item['filename']); ?>" type="video/mp4">
                        Browser Anda tidak mendukung tag video.
                    </video>
                <?php else: ?>
                    <p>Tipe tidak diketahui: <?php echo htmlspecialchars($item['filename']); ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <img id="modalImage" src="" alt="">
            <video id="modalVideo" src="" alt="" controls></video>
        </div>
    </div>

    </div>
    <div class="visi-misi">
        <?php if (!empty($visi_misi['gambar'])): ?> <!-- Pastikan untuk memeriksa apakah gambar ada -->
            <img src="<?php echo base_url('uploads/' . $visi_misi['gambar']); ?>" alt="Visi dan Misi" class="visi-misi-image">
        <?php else: ?>
            <span>Tidak Ada Gambar Visi Misi</span>
        <?php endif; ?>
    </div>


        <div class="footer">
            <div class="contact-item">
                <img src="/disperdagin/assets/image/telepon.png" alt="Phone">
                <p>022-5891691/1183</p>
            </div>
            <div class="contact-item">
                <img src="/disperdagin/assets/image/alamat.png" alt="Location">
                <p> Jl. Raya Soreang Km. 17 Soreang, </p>
                <p> Kab. Bandung, Jawa Barat, Indonesia</p>
            </div>
            <div class="contact-item">
                <img src="/disperdagin/assets/image/email.png" alt="Email">
                <p><a href="mailto:pdkiindagkabbdg@gmail.com">pdkiindagkabbdg@gmail.com</a></p>
            </div>
            <div class="contact-item">
                <img src="/disperdagin/assets/image/ig.png" alt="Instagram">
                <p><a href="https://www.instagram.com/disperdagin_kabbdg?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">disperdagin_kabbdg</a></p>
            </div>
            <div class="contact-item">
                <img src="/disperdagin/assets/image/fb.png" alt="Facebook">
                <p><a href="https://www.facebook.com/disperindagkabbdg/" target="_blank">Disperindag Kabbdg</a></p>
            </div>
            <div class="contact-item">
                <img src="/disperdagin/assets/image/tiktok.png" alt="Tiktok">
                <p><a href="https://www.tiktok.com/@disperdagin_kabbdg" target="_blank">disperdagin_kabbdg</a></p>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        function openModal(src) {
        const modal = document.getElementById("myModal");
        const modalImage = document.getElementById("modalImage");
        const modalVideo = document.getElementById("modalVideo");
        
        modal.style.display = "block";
        
        if (src.endsWith('.mp4')) {
            modalImage.style.display = "none";
            modalVideo.style.display = "block";
            modalVideo.src = src;
        } else {
            modalVideo.style.display = "none";
            modalImage.style.display = "block";
            modalImage.src = src;
        }
    }

    function closeModal() {
        const modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        const modal = document.getElementById("myModal");
        if (event.target == modal) {
            closeModal();
        }
    }

    </script>    
</body>
</html>
