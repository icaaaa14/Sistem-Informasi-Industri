<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Pastikan body mengambil seluruh tinggi viewport */
        }

        .about {
            display: flex;
            align-items: center; /* Vertikal tengah */
            justify-content: center; /* Horizontal tengah */
            flex-direction: row; /* Gambar dan teks berada dalam satu baris */
            text-align: center; /* Teks berada di tengah */
            margin-top: 100px; /* Spasi atas jika diperlukan */
            padding: 0 30px;
            flex-wrap: wrap; /* Biarkan elemen membungkus jika ukuran terlalu besar */
        }

        .about .image-container {
            display: flex;
            flex-direction: column; /* Atur gambar secara vertikal */
            margin-right: 30px;
        }

        .about .image-container img {
            width: 400px; /* Lebar gambar */
            height: auto; /* Sesuaikan tinggi gambar untuk menjaga rasio aspek */
            margin-bottom: 20px; /* Jarak antara gambar */
        }

        .text {
            max-width: 750px; /* Batasi lebar maksimal konten teks */
        }
        .text h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 28px; /* Ukuran teks sebelumnya 36px */
            color: #333;
        }
        .text h3 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 28px; /* Ukuran teks sebelumnya 36px */
            color: #333;
        }
        .text p {
            font-size: 16px; /* Ukuran teks sebelumnya 18px */
            color: #555;
            line-height: 1.6;
            margin-bottom: 30px;
            text-align: justify;
            max-width: 750px; /* Batasi lebar maksimal konten teks */
            margin-right: 0; 
        }
        .footer {
            background-color: #5cb281;
            padding: 40px;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-top: 20px;
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
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <img src="/disperdagin/assets/image/logo.png">
        </div>
            <a href="<?php echo site_url('home'); ?>">Home</a>
            <a href="<?php echo site_url('daftar'); ?>">Daftar Industri</a>
            <a href="<?php echo site_url('about'); ?>">About Us</a>
            <a class="login" href="<?php echo site_url('login'); ?>">Login</a>
    </div>
    
    <div class="about">
    <div class="image-container">
        <img src="/disperdagin/assets/image/disperin1.jpeg">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15839.627780750927!2d107.51681025240728!3d-7.020223787701605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68ec2cc97b4b3f%3A0xb5b56b4389defe3b!2sDisperindag%20Kabupaten%20Bandung!5e0!3m2!1sid!2sid!4v1730986448588!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="text">
        <h2>Dinas Perindustrian Dan Perdagangan (DISPERDAGIN)</h2>
        <p>
            Dinas Perindustrian dan Perdagangan (DISPERDAGIN) Kabupaten Bandung adalah lembaga pemerintah daerah 
            yang bertanggung jawab atas pengelolaan dan pengembangan sektor industri dan perdagangan di Kabupaten Bandung. 
            DISPERDAGIN memiliki peran penting dalam mendorong pertumbuhan ekonomi daerah melalui berbagai kebijakan dan program 
            yang mendukung pengembangan industri lokal, perdagangan, serta pelaku usaha mikro, kecil, dan menengah (UMKM).
            Selain itu, DISPERDAGIN juga bertanggung jawab dalam pengawasan produk dan kerja sama industri, memastikan kualitas produk yang beredar, 
            serta memfasilitasi kerja sama dengan berbagai pihak untuk meningkatkan daya saing dan kemandirian ekonomi Kabupaten Bandung.
        </p>
        <p>
            Dalam menjalankan tugasnya, DISPERDAGIN tidak hanya fokus pada pengembangan sektor industri dan 
            perdagangan, tetapi juga pada pemberdayaan sumber daya manusia, peningkatan daya saing produk lokal,
            dan penguatan jaringan kerja sama antara pemerintah, pelaku industri, dan masyarakat. beberapa program unggulan
            yang dijalankan oleh DISPERDAGIN antara lain pelatihan keterampilan untuk pelaku UMKM, pengembangan pasar digital
            bagi produk - produk lokal, serta pemberian fasilitasi dan dukungan akses pemodalan bagi usaha kecil dan menengah.
        </p>
    </div>
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
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
